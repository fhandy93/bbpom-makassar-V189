<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Siikmabid;
use App\Models\Sikama;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class SikamaController extends Controller
{
    public function index(){
     try{
            $id = Auth::user()->id;
            for($i=1;$i<=12;$i++){
                ${"data$i"} = Sikama :: where('user_id','=',$id)->whereMonth('created_at', '=', $i)->whereYear('created_at', '=', date('Y'))->get('id');
                ${"count$i"} = ${"data$i"}->count();
            }
            $bulan = Carbon::now()->month;
            $tahun = Carbon::now()->year;

            $totalByMont = DB::table('sikama')
                ->select(DB::raw("SEC_TO_TIME(SUM(TIME_TO_SEC(jumlah))) as total_izin"))
                ->where('status', 5)
                ->where('user_id','=',$id)
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->first();

            $byMonth = Sikama :: where('user_id','=',$id)->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->get()->count();
            $byYear = Sikama :: where('user_id','=',$id)->whereYear('created_at', $tahun)->get()->count();
            return view('siikma.index',compact('count1',
                                                'count2',
                                                'count3',
                                                'count4',
                                                'count5',
                                                'count6',
                                                'count7',
                                                'count8',
                                                'count9',
                                                'count10',
                                                'count11',
                                                'count12',
                                                'totalByMont',
                                                'byMonth',
                                                'byYear'
                                                ));
        }catch(\Throwable $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }     
    }
    public function form(){
        $user =  Auth::user()->username; 
        $data = Profile :: where('username',$user)->first();
        return view('sikama.formizin',['data'=>$data]);
    }
    public function store(Request $req){
        // $request->validate([
        //     "bidang"      => "required"
        //   ],[
        //     "bidang"      => "Harap memilih bidang terlebih dahulu"
        //   ]);
        // $dt = Carbon::now();
        // $sikama              = new Sikama ();
        // $sikama->user_id     = Auth::user()->id;
        // $sikama->bidang      = $request->bidang;
        
        // $day = substr($request->tgl_terima, 0,2);
        // $mont = substr($request->tgl_terima, 3,2);
        // $year =  substr($request->tgl_terima, 6);
        // $sikama->tgl_izin = $year.'/'.$mont.'/'.$day;
        
                
        // $sikama->jam         = $request->jam1."-".$request->jam2;
        // $sikama->keperluan   = $request->perlu;
        // $sikama->pemberi     = "-";
        // $sikama->status      = "1"; 
        // $sikama->ket         = "-"; 
        // $sikama->save();

        // $pesan = "*Yth. Bapak/Ibu* 🙏, Pegawai BBPOM Makassar atas nama *".$request->nama.
        // "* Mengajukan Izin untuk keluar dari kantor BBPOM Makassar pada 📆 tanggal *". $request->tgl_terima.
        // "* 🕐 Jam *".$request->jam1."-".$request->jam2."* Dengan Keperluan *".$request->perlu."* Silakan Login ke aplikasi BALLA POKJA atau dengan mengklik link https://bbpom-makassar.com/rekapizin untuk Menkonfirmasi izin";
        
        // switch ($request->bidang){
        //   case 17 :
        //     //Bidang Infokom(Pak lalo) 
        //     $number = '081243782726';
        //     break;
        //   case 21 :
        //     //Bidang Penindakan (Ibu Sriyani)
        //     $number = '081355733866';
        //     break;
        //   case 18 :
        //     //Bidang Inspeksi (Pak Rahman)
        //     $number = '081355497097';
        //     break;
        //   case 19 :
        //       //Bidang Sertifikasi(Ibu Ana)
        //       $number = '08164385805';
        //       break;
        //   case 20 :
        //     //Bidang Pengujian (Ibu Ina)
        //     $number = '0816234816';
        //     break;
        //   case 22 :
        //     //Bidang PPNPN (Pak Kama)
        //     $number = '081242033987';
        //     break;
        //   case 12 :
        //     //Bidang Khusus (Ibu Amirah)
        //     $number = '081355957120';
        //     break;
        // }
        //  sendMessage($pesan,$number);
         
        //  return redirect()->route('siikma.daftar')->with('success', 'Permintaan Izin telah terkirim, Silakan menunggu Konfirmasi');
         
        // session () ->flash('success', 'Permintaan Izin telah terkirim, Silakan menunggu Konfirmasi');
        // return $this->daftar();
        $req->validate([
            "bidang"        => "required",
            "tgl_terima"    => "required",
            "jam1"          => "required",
            "jam2"          => "required",
            "perlu"          => "required",
            "bidang"          => "required"

          ],[
            "bidang"      => "Harap memilih bidang terlebih dahulu",
            "tgl_terima"    => "Harap mengisi tanggal izin",
            "jam1"          => "Harap mengisi jam mulai izin",
            "jam2"          => "Harap mengisi jam berakhir izin",
            "perlu"          => "Harap mengisi kolom keperluan",
            "bidang"          => "harap memilih bidang terlebih dahulu",
          ]);
          
        try{
            $user = Auth::user();
            $userId = $user->id;

            // Format tanggal
            $tglIzin = Carbon::createFromFormat('d/m/Y', $req->tgl_terima)->format('Y-m-d');
            $jam1 = $req->jam1;
            $jam2 = $req->jam2;
            $perlu = $req->perlu;
            $bid = $req->bidang;

            // Cek duplikat izin dengan waktu yang sama persis
            $cekPersis = Sikama ::where('user_id', $userId)
                ->where('tgl_izin', $tglIzin)
                ->where('jam1', $jam1)
                ->where('jam2', $jam2)
                ->where('keperluan',$perlu)
                ->where('bidang',$bid)
                ->exists();

            if ($cekPersis) {
                return redirect()->route('siikma.status',['status'=>'success','jam1'=>$req->jam1,'jam2'=>$req->jam2]);
            }
            
            $sikama              = new Sikama ();
            $sikama->user_id     = Auth::user()->id;
            $sikama->bidang      = $req->bidang;
            $sikama->tgl_izin    = $tglIzin; // sudah dalam format 'Y-m-d'
            $sikama->jam1        = $req->jam1;
            $sikama->jam2        = $req->jam2;
            $sikama->keperluan   = $req->perlu;
            $sikama->status      = "1"; 
            $sikama->ket         = "-"; 
            $sts = $sikama->save();

           $pesan = "*Yth. Bapak/Ibu* 🙏, Pegawai BBPOM Makassar atas nama *".$req->nama.
           "* Mengajukan Izin untuk keluar dari kantor BBPOM Makassar pada 📆 tanggal *". $req->tgl_terima.
           "* 🕐 Jam *".$req->jam1."-".$req->jam2."* Dengan Keperluan *".$req->perlu."* Silakan Login ke aplikasi BALLA POKJA atau dengan mengklik link https://bbpom-makassar.com/rekapizin untuk Menkonfirmasi izin";
        
            $data = Siikmabid :: findOrFail($req->bidang);
            sendMessage($pesan,$data->wa);
            
            if($sts){
                 return redirect()->route('siikma.daftar')->with('success', 'Permintaan Izin telah terkirim, Silakan menunggu Konfirmasi');
            }else{
                return redirect()->route('siikma.status',['status'=>'erorr']);
            }
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        }  
    }
    public function daftar(){
      try{
        $exp = Sikama :: where([['created_at', '<=', Carbon::yesterday()->setTime(23, 00, 00)->toDateTimeString()],['status', '=', '1']])->get();
        
        foreach($exp as $item){
        $izin  = Sikama::findOrFail($item->id);
        $izin -> status = 4;
        $izin ->save();
        }
        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;
        $id = Auth::user()->id;
        $data = Sikama :: where('user_id',$id)->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->orderBy('id', 'DESC')->get();
        $notconfirm = Sikama :: where('user_id',$id)->where('bidang', '!=', 12)->where('status', '=', 1)->first();
        return view ('sikama.daftar',['izin'=> $data,'confirm'=>$notconfirm]); 
      }catch (\Throwable $e) {
          return back()->with('error',  $e->getMessage());
      }  
    }
    public function batal($id){
      try {
        $update = Sikama::findOrFail($id);

        if ($update->status != 1) {
            return redirect()->route('siikma.daftar')
                ->with('warning', 'Izin tidak dapat dibatalkan');
        }
        $now = \Carbon\Carbon::now()->format('H:i:s');
        $jam1 = \Carbon\Carbon::createFromFormat('H:i:s', $update->jam1)->format('H:i:s');
        if ($now > $jam1) {
            return redirect()->route('siikma.daftar')
                ->with('warning', 'Batas waktu pembatalan telah lewat');
        }
        $update->status = 6;
        $update->save();
        return redirect()->route('siikma.daftar')
            ->with('success', 'Izin berhasil dibatalkan');

      } catch (\Throwable $e) {
          return redirect()->route('sikama.index')->with('error', $e->getMessage());
      }
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
        
        //Kepala TU BBPOM 
        $ktu = '081242033987';
        sendMessage($pesan,$ktu);
         
        return back()->with('success', 'Permintaan Izin telah terkirim kepada Kepala Bagian Tata Usaha pada Balai Besar POM di Makassar, Silakan menunggu Konfirmasi');
    }
    public function rekap(){
      try{
        $batasWaktu = Carbon::yesterday()->setTime(23, 0, 0);
        Sikama::where('created_at', '<=', $batasWaktu)
          ->where('status', 1)
          ->update([
              'status' => 4
          ]);

          $id = Auth::user()->is_permission;
          $bulan = Carbon::now()->month;
          $tahun = Carbon::now()->year;
          if($id==1){
              $data = Sikama :: whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->where('status','!=',6)->orderBy('id', 'DESC')->get();
          }elseif($id==12){
              $data = Sikama::whereIn('bidang', [12, 16])->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->where('status','!=',6)->orderBy('id', 'desc')->get();      
          }else{
              $data = Sikama :: where('bidang','=',$id)->whereMonth('created_at', $bulan)->whereYear('created_at', $tahun)->where('status','!=',6)->orderBy('id', 'desc')->get(); 
          }
          return view ('sikama.rekap',['izin'=> $data]);
      }catch (\Throwable $e) {
          return redirect()->route('siikma.index')->with('error', $e->getMessage());
      }   

    }
    public function konfir($id){
      $data = Sikama :: where('id',$id)->first();
      return view('sikama.konfir',['data'=>$data]);
    }
    public function konfirs(Request $req, $id){
      try{
        $izin  = Sikama::findOrFail($id);
          if (in_array($izin->status, [2, 3])) {
           return redirect()->route('siikma.index')->with('success', 'Izin dikonfirmasi');
        }
        $izin -> status = $req->status;
        if(isset($request->ket)){
          $izin -> ket = $request->ket;
        }
        else{
          $izin -> ket = "-";
        }
        $izin -> pemberi = Auth::user()->name;
        $izin ->save();
        
        $user  = User::where('id',$req->user_id)->first();
        $phone = Profile::where('username',$user->username)->first();
        if ($req->status==2){
          $pesan = "*Yth. Bapak/Ibu*🙏 izin anda untuk keperluan *".$req->keperluan."* Telah ✅ *Disetujui* oleh atasan. Ket: *".$req->ket."*";
        }else{
          $pesan = "*Yth. Bapak/Ibu*🙏  izin anda untuk keperluan *".$req->keperluan."* Telah ❌ *Ditolak* oleh atasan, Dengan alasan: *".$req->ket."*";
        }
        // pemohon izin
        if(isset($phone->telpon)){
          sendMessage($pesan,$phone->telpon);  
        }
          
        
        if ($req->status==2){
          $pesansat = "*Yth. Bapak/Ibu*🙏 Izin telah diberikan oleh atasan kepada *".$user->name."* untuk keluar dari Wilayah kantor BBPOM Makassar pada jam *".$req->jam."*";
          
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
        return redirect()->route('siikma.index')->with('success', 'Izin dikonfirmasi');
      }catch (\Throwable $e) {
          return redirect()->route('siikma.index')->with('error', $e->getMessage());
      }   
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
      try{
            // Ambil lat/lon dari request atau default dummy jika tidak tersedia
            $lat = floatval($req->lat ?? '-5.1660');
            $lon = floatval($req->lon ?? '119.4110');
    
            // Validasi apakah di dalam area kantor
            $isInsideArea = (
                $lat >= -5.1666802 && $lat <= -5.1656497 &&
                $lon >= 119.4105676 && $lon <= 119.4119490
            );
    
            if (!$isInsideArea) {
                return redirect()->route('siikma.daftar')
                    ->with('unsuccess', 'Izin gagal diakhiri, Anda terdeteksi masih berada di luar wilayah kantor');
            }
    
            // Ambil data izin dan waktu saat ini
            $dt = Carbon::now();
            $izin = Sikama::findOrFail($id);
    
            $jamAwal  = Carbon::parse($izin->jam1);
            $jamAkhir = $dt;
    
            $totalMinutes = 0;
    
            if ($jamAkhir->gte($jamAwal)) {
                // Jika jam akhir lebih besar atau sama dengan jam awal, hitung selisih waktu
                $totalMinutes = $jamAwal->diffInMinutes($jamAkhir);
    
              // Tentukan waktu istirahat berdasarkan hari
                $dayOfWeek = $jamAwal->dayOfWeek;
                if ($dayOfWeek === 5) { // Jumat
                    $startBreak = $jamAwal->copy()->setTime(11, 45);
                    $endBreak   = $jamAwal->copy()->setTime(13, 15);
                } else { // Senin - Kamis
                    $startBreak = $jamAwal->copy()->setTime(12, 0);
                    $endBreak   = $jamAwal->copy()->setTime(13, 0);
                }
    
                // Koreksi waktu istirahat
                if ($jamAkhir->gt($endBreak) && $jamAwal->lt($startBreak)) {
                    $totalMinutes -= $startBreak->diffInMinutes($endBreak);
                } elseif ($jamAwal->between($startBreak, $endBreak) && $jamAkhir->gt($endBreak)) {
                    $totalMinutes -= $jamAwal->diffInMinutes($endBreak);
                } elseif ($jamAkhir->between($startBreak, $endBreak) && $jamAwal->lt($startBreak)) {
                    $totalMinutes -= $startBreak->diffInMinutes($jamAkhir);
                } elseif ($jamAwal->between($startBreak, $endBreak) && $jamAkhir->between($startBreak, $endBreak)) {
                    $totalMinutes = 0;
                }
    
                // Pastikan tidak negatif
                $totalMinutes = max($totalMinutes, 0);
            }
    
            // Konversi menit ke format HH:MM:SS
            $jumlahTime = CarbonInterval::minutes($totalMinutes)->cascade()->format('%H:%I:%S');
    
            // Update data izin
            $izin->update([
                'status'         => 5,
                'wktu_kembali'   => $jamAkhir,
                'lat'            => $lat,
                'lon'            => $lon,
                'jumlah'         => $jumlahTime,
            ]);
    
            return redirect()->route('siikma.daftar')
            ->with('success', 'Izin berhasil diakhiri');
        }catch(\Throwable $e) {
            return back()->with('error',  $e->getMessage());
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
     public function daftarFil(Request $req){
        try{
            $id = Auth::user()->id;
            $query = Sikama::where('user_id', $id);
            // Apply year filter if it's not the default
            if ($req->tahun !== 'Pilih Tahun') {
                $query->whereYear('created_at', $req->tahun);
            } else {
                $query->whereYear('created_at', date('Y')); // Default to current year
            }

            // Apply month filter if it's not the default
            if ($req->bulan !== 'Pilih Bulan') {
                $query->whereMonth('created_at', $req->bulan);
            }

            $data = $query->orderBy('created_at', 'DESC')->get();
            return view('sikama.daftar', ['izin' => $data]);
        }catch(\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        }
    }
    public function rekapFil(Request $req){
        try{
            $id = Auth::user()->is_permission;
            $tahun = $req->tahun;
            $bulan = $req->bulan;

            $query = Sikama::query();

            // Filter bidang berdasarkan permission
            if ($id == 1) {
            } elseif ($id == 12) {
                $query->whereIn('bidang', [12, 30]);
            } else {
                $query->where('bidang', $id);
            }

            // Filter tahun
            if ($tahun !== 'Pilih Tahun') {
                $query->whereYear('created_at', $tahun);
            } else {
                $query->whereYear('created_at', date('Y'));
            }

            // Filter bulan
            if ($bulan !== 'Pilih Bulan') {
                $query->whereMonth('created_at', $bulan);
            }

            // Ambil data
            $data = $query->where('status','!=',6)->orderBy('created_at', 'DESC')->get();

            return view('sikama.rekap', ['izin' => $data]);
        }catch(\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        }
    }
}
