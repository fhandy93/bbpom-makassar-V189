<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Sikama;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class SikamaController extends Controller
{
    public function index(){
      $isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile"));
      if($isMob){ 
        $device = 'Mobile'; 
      }else{ 
        $device = 'Desktop'; 
      }
        return view('sikama.index',['device'=>$device]);
    }
    public function form(){
        $user =  Auth::user()->username; 
        $data = Profile :: where('username',$user)->first();
        return view('sikama.formizin',['data'=>$data]);
    }
    public function store(Request $request){
         $request->validate([
            "bidang"      => "required"
          ],[
            "bidang"      => "Harap memilih bidang terlebih dahulu"
          ]);
        $dt = Carbon::now();
        $sikama              = new Sikama ();
        $sikama->user_id     = Auth::user()->id;
        $sikama->bidang      = $request->bidang;
        
        $day = substr($request->tgl_terima, 0,2);
        $mont = substr($request->tgl_terima, 3,2);
        $year =  substr($request->tgl_terima, 6);
        $sikama->tgl_izin = $year.'/'.$mont.'/'.$day;
        
                
        $sikama->jam         = $request->jam1."-".$request->jam2;
        $sikama->keperluan   = $request->perlu;
        $sikama->pemberi     = "-";
        $sikama->status      = "1"; 
        $sikama->ket         = "-"; 
        $sikama->save();

        $pesan = "*Yth. Bapak/Ibu* 🙏, Pegawai BBPOM Makassar atas nama *".$request->nama.
        "* Mengajukan Izin untuk keluar dari kantor BBPOM Makassar pada 📆 tanggal *". $request->tgl_terima.
        "* 🕐 Jam *".$request->jam1."-".$request->jam2."* Dengan Keperluan *".$request->perlu."* Silakan Login ke aplikasi BALLA POKJA atau dengan mengklik link https://bbpom-makassar.com/rekapizin untuk Menkonfirmasi izin";
        
        switch ($request->bidang){
          case 17 :
            //Bidang Infokom(Pak lalo) 
            $number = '081243782726';
            break;
          case 21 :
            //Bidang Penindakan (Ibu Sriyani)
            $number = '081355733866';
            break;
          case 18 :
            //Bidang Inspeksi (Pak Rahman)
            $number = '081355497097';
            break;
          case 19 :
              //Bidang Sertifikasi(Ibu Ana)
              $number = '08164385805';
              break;
          case 20 :
            //Bidang Pengujian (Ibu Ina)
            $number = '0816234816';
            break;
          case 22 :
            //Bidang PPNPN (Pak Kama)
            $number = '081242033987';
            break;
          case 12 :
            //Bidang Khusus (Ibu Amirah)
            $number = '081355957120';
            break;
        }
         sendMessage($pesan,$number);
         
         return redirect()->route('siikma.daftar')->with('success', 'Permintaan Izin telah terkirim, Silakan menunggu Konfirmasi');
         
        // session () ->flash('success', 'Permintaan Izin telah terkirim, Silakan menunggu Konfirmasi');
        // return $this->daftar();
    }
    public function daftar(){
        $exp = Sikama :: where([['created_at', '<=', Carbon::yesterday()->setTime(23, 00, 00)->toDateTimeString()],['status', '=', '1']])->get();
        
        foreach($exp as $item){
        $izin  = Sikama::findOrFail($item->id);
        $izin -> status = 4;
        $izin ->save();
        }

        $id = Auth::user()->id;
        $data = Sikama :: where('user_id',$id)->orderBy('id', 'DESC')->get();
        $notconfirm = Sikama :: where('user_id',$id)->where('bidang', '!=', 12)->where('status', '=', 1)->first();
        return view ('sikama.daftar',['izin'=> $data,'confirm'=>$notconfirm]); 
        
    }
    public function edit(Request $request, $id){
      $dt = Carbon::now();
      $izin  = Sikama::findOrFail($id);
      $izin -> bidang = 12;
      $izin -> updated_at = $dt->toDateString();;
      $izin ->save();
      $pesan = "*Yth. Bapak/Ibu* 🙏, Pegawai BBPOM Makassar atas nama *".$request->nama.
      "* Mengajukan Izin untuk keluar dari kantor BBPOM Makassar pada 📆tanggal *". $request->tgl.
      "* 🕐Jam *".$request->jam."* Dengan Keperluan *".$request->perlu."* Namun *TIDAK DIKONFIRMASI* lebih dari 5 Menit oleh kepala bidangnya, Silakan Login ke aplikasi BALLA POKJA atau dengan mengklik link https://bbpom-makassar.com/rekapizin untuk Menkonfirmasi izin";
        
        //Kepala TU BBPOM (Ibu Amirah)
        $ktu = '081355957120';
        sendMessage($pesan,$ktu);
        
        return back()->with('success', 'Permintaan Izin telah terkirim kepada Kepala Bagian Tata Usaha pada Balai Besar POM di Makassar, Silakan menunggu Konfirmasi');
    }
    public function rekap(){
      $exp = Sikama :: where([['created_at', '<=', Carbon::yesterday()->setTime(23, 00, 00)->toDateTimeString()],['status', '=', '1']])->get();
      foreach($exp as $item){
      $izin  = Sikama::findOrFail($item->id);
      $izin -> status = 4;
      $izin ->save();
      }
      $id = Auth::user()->is_permission;
       if($id==1){
        $data = Sikama :: where('status','!=', 4)->latest()->get();
      }else{
        $data = Sikama :: where([['bidang','=',$id],['status','!=', 4]])->latest()->get();        
      }
      return view ('sikama.rekap',['izin'=> $data]);
    }
    public function konfir($id){
      $data = Sikama :: where('id',$id)->first();
      return view('sikama.konfir',['data'=>$data]);
    }
    public function konfirs(Request $request, $id){
      $izin  = Sikama::findOrFail($id);
      $izin -> status = $request->status;
      if(isset($request->ket)){
        $izin -> ket = $request->ket;
      }
      else{
        $izin -> ket = "-";
      }
      $izin -> pemberi = Auth::user()->name;
      $izin ->save();
      
      $user  = User::where('id',$request->user_id)->first();
      $phone = Profile::where('username',$user->username)->first();
      if ($request->status==2){
        $pesan = "*Yth. Bapak/Ibu*🙏 izin anda untuk keperluan *".$request->keperluan."* Telah ✅ *Disetujui* oleh atasan. Ket: *".$request->ket."*";
      }else{
        $pesan = "*Yth. Bapak/Ibu*🙏  izin anda untuk keperluan *".$request->keperluan."* Telah ❌ *Ditolak* oleh atasan, Dengan alasan: *".$request->ket."*";
      }
      // pemohon izin
      if(isset($phone->telpon)){
        sendMessage($pesan,$phone->telpon);  
      }
        
      
      if ($request->status==2){
        $pesansat = "*Yth. Bapak/Ibu*🙏 Izin telah diberikan oleh atasan kepada *".$user->name."* untuk keluar dari Wilayah kantor BBPOM Makassar pada jam *".$request->jam."*";
        
        // Satpam Aris
        $aris = '085146111986';
        sendMessage($pesansat,$aris);

       // Satpam Massere
       $massere = '08875626716';
       sendMessage($pesansat,$massere);

        // Satpam Ali
        $ali = '085341782918';
        sendMessage($pesansat,$ali);


        // Satpam Taufiq
        $taufiq = '085242021996';
        sendMessage($pesansat,$taufiq);
        
         // Satpam Syamsul
        $syamsul = '085398358668';
        sendMessage($pesansat,$syamsul);
        
         // Satpam muthalib
        $muthalib = '085696422963';
        sendMessage($pesansat,$muthalib);
        
    }
      return redirect()->route('siikma.index');
    //  return $this->index();
    }
    public function info(){
      return view('sikama.info');
    }
    public function cetak($id){
      $data = Sikama::where('id',$id)->first();
      $user  = User::where('id',$data->user_id)->first();
      $izin = Profile::where('username',$user->username)->first();
      $pdf = FacadePdf::loadView('sikama.cetak',['data'=>$data,'izin'=>$izin]) ->setOptions([
          'enable_remote' => true,
          'chroot'  => public_path('storage/post-image'),
          'defaultFont' => 'serif',
      ]);;

        return $pdf->setPaper('A4', 'portrait')->stream();
        
        // return view('sikama.cetak',['data'=>$data,'izin'=>$izin]);
    }
    public function cetakf(){
      $exp = Sikama :: where([['created_at', '<=', Carbon::yesterday()->setTime(23, 00, 00)->toDateTimeString()],['status', '=', '1']])->get();
      foreach($exp as $item){
      $izin  = Sikama::findOrFail($item->id);
      $izin -> status = 4;
      $izin ->save();
      }
      $data = Sikama :: latest()->get();
      return view ('sikama.rekap',['izin'=> $data]);
    }
     public function detail($id){
      $data  = SIKAMA :: findOrFail($id);
      return view ('sikama.detail',['data'=> $data]);
    }
    public function akhir(Request $req, $id){
      $lat          = $req->lat;
      $lon          = $req->lan;
      $lat1  = substr($lat, 1, 9);
      $lon1  = substr($lon, 0, (11));
      $lat2  = substr($lat, 1, 9);
      $lon2  = substr($lon, 0, (11));

      $dt = Carbon::now();
      $izin  = Sikama::findOrFail($id);
      $izin -> status = 5;
      $izin -> wktu_kembali = $dt;
      $izin -> lat = $req->lat ;
      $izin -> lon =  $req->lan;
      $izin ->save();
      
      if (($lat1 > 5.1656497) && ($lat2 < 5.1666802) && ($lon1 > 119.4105676) && ($lon2 < 119.4119490) ){
        session () ->flash('success', 'Data berhasil diinput');
        return $this->daftar();
      }else{
        session () ->flash('warning', 'Data berhasil diinput, Anda terdeteksi masih berada diluar wilayah kantor');
        return $this->daftar();
      }
    }
     public function acc(){
       $data  = SIKAMA :: where('status','=',1)->get();
      foreach($data as $item){
        $izin  = Sikama::findOrFail($item->id);
        $izin -> status = 2;
        $izin -> pemberi = Auth::user()->name;
        $izin -> ket = "-";
        $izin ->save();
        echo $user  = User::where('id',$item->user_id)->first();
        echo $phone = Profile::where('username',$user->username)->first();
      
        $pesan = "*Yth. Bapak/Ibu*🙏 izin anda untuk keperluan *Testing APP* Telah ✅ *Disetujui* oleh atasan. Ket: *-*";
      
        // pemohon izin
          sendMessage($pesan,$phone->telpon);
        }
    }
}
