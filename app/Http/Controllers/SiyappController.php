<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Siyapp;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiyappController extends Controller
{
    public function index(){
        return view('siyapp.index');
    }
    public function formulir(){
        return view('siyapp.formulir');
    }
    public function laporan(){
         $laporan = Siyapp::where('j_barang',2)->orderBy('id', 'DESC')->get();
        return view('siyapp.laporan',['laporan'=>$laporan]);
    }
    public function edit($id){
        $siyapp = Siyapp::findOrFail($id);
        return view('siyapp.edit',compact('siyapp'));
    }
    public function store(Request $request){
        $type = gettype($request->image);
        $fileName = null;
        if($type=='string'){
            $img = $request->image;
            $folderPath = "siyapp/";
    
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . '.png';
            
            $file = $folderPath . $fileName;
            Storage::put($file, $image_base64);
        }else{
            $image = $request->file('image');
            if($image){
                $path = public_path().'/storage/siyapp/';
                //upload new file
                $file1 = $request->image;
                $fileName = $file1->getClientOriginalName();
                $file1->move($path, $fileName);
            }
        }

        $request -> validate([
            'nama_barang' => ['required','min:2'],
            'merek' => ['required'],
            'type' => ['required'],
            'nup' => ['required'],
            'tahun' => ['required'],
            'bidang' => ['required'],
            'jenis' => ['required']
        ]);
        Siyapp :: create([
            'user_id' => Auth::user()-> id,
            'nama_barang' => $request-> nama_barang,
            'merek' => $request-> merek,
            'type' => $request-> type,
            'nup' => $request-> nup,
            'tahun' => $request-> tahun,
            'bidang' => $request-> bidang,
            'j_barang' => $request-> barang,
            'pemeliharaan' => $request-> pemeliharaan,
            'sifat' => $request-> sifat,
            'jenis' => $request-> jenis,
            'tindak_awal'=> '-',
            'tindak_lanjut'=> '-',
            'uji'=> '-',
            'ket'=> '-',
            'image' => $fileName
        ]);
        
        //  $pesan1 = "Testing WA Notify for SIYAPP";
        $pesan1 = "*Yth. Bapak/Ibu*🙏, Formulir Pengaduan Pemeliharaan Barang Milik Negara dari *". Auth::user()-> name ."*, Bidang *". $request-> bidang ."* masuk ke akun anda untuk dikonfirmasi https://bbpom-makassar.com/laporan";
        $pesan2 = "*Yth. Bapak/Ibu*🙏, Formulir Pengaduan Pemeliharaan Barang *IT* dari *". Auth::user()-> name ."*, Bidang *". $request-> bidang ."* masuk ke akun anda untuk dikonfirmasi https://bbpom-makassar.com/laporan-it";
        $pesan3 = "*Yth. Bapak/Ibu*🙏, Formulir Pengaduan Pemeliharaan Barang Milik Negara dari *". Auth::user()-> name ."*, Bidang *". $request-> bidang ."* masuk ke laporan SIYAPP, silakan membuka tautan https://bbpom-makassar.com/laporan untuk Informasi lebih lanjut.";
        if($request-> barang == 1){
            // pesan untuk Arman Afandi
            $arman = '6281363177720';
            sendMessage($pesan2,$arman);

            // pesan untuk Sirwan
            // $sirwan = '6282314063149';
            // sendMessage($pesan2,$sirwan);

            // pesan untuk pak Ancu
            $ancu = '6282187047977';
            sendMessage($pesan2,$ancu);
            
            // pesan untuk pak Agus
            $agus = '6285299665356';
            sendMessage($pesan2,$agus);

             // pesan untuk Ibu Arsy
             $arsy = '6285255955734';
             sendMessage($pesan2,$arsy);

              // Pesan Untuk yayu
            $yayu = '62811406364';
            sendMessage($pesan2,$yayu);
            
            // Pesan Untuk Mury
            $mury = '6281241465487';
            sendMessage($pesan2,$mury);
            
            // Pesan Untuk Wiwi
            $wiwi = '6285280134882';
            sendMessage($pesan2,$wiwi);
            
            // Pesan Untuk Nenenk
            $nenenk = '6281234675172';
            sendMessage($pesan2,$nenenk);
            
            // pesan untuk Miska
            $miska = '6285333314410';
            sendMessage($pesan2,$miska);

        }else{

        // pesan untuk pak Agus
        $agus = '6285299665356';
        sendMessage($pesan1,$agus);
        
        // pesan untuk pak Ibu Amirah
        $amirah = '081355957120';
        sendMessage($pesan1,$amirah);

        // pesan untuk Ibu Arsy
        $arsy = '6285255955734';
        sendMessage($pesan1,$arsy);
        
       // Pesan Untuk yayu
        $yayu = '62811406364';
        sendMessage($pesan1,$yayu);
        
        // Pesan Untuk Mury
        $mury = '6281241465487';
        sendMessage($pesan1,$mury);
        
        // Pesan Untuk Wiwi
        $wiwi = '6285280134882';
        sendMessage($pesan1,$wiwi);
        
         // Pesan Untuk Nenenk
        $nenenk = '6281234675172';
        sendMessage($pesan1,$nenenk);
        
        // pesan untuk Miska
        $miska = '6285333314410';
        sendMessage($pesan1,$miska);

        }
        //  if($request-> pemeliharaan=='Operasional Laboratorium'){
        //       // pesan untuk ibu Mury
        //       $curl = curl_init();
        //       curl_setopt_array($curl, array(
        //       CURLOPT_URL => 'https://pati.wablas.com/api/send-message',
        //       CURLOPT_RETURNTRANSFER => true,
        //       CURLOPT_ENCODING => '',
        //       CURLOPT_MAXREDIRS => 10,
        //       CURLOPT_TIMEOUT => 0,
        //       CURLOPT_FOLLOWLOCATION => true,
        //       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //       CURLOPT_CUSTOMREQUEST => 'POST',
        //       CURLOPT_POSTFIELDS => (['phone' => '62','message' => $pesan3]),
        //       CURLOPT_HTTPHEADER => array(
        //           'Authorization: pduX1OxoN5F8NCkGBfXTSRjNJ2MeiXQFR3qCkI8Zrlp8aQL5C97yU95o8RXiX1UW'
        //       ),
        //       ));
        //       $response = curl_exec($curl);
        //       curl_close($curl);
        // }else{
        //       // pesan untuk ibu Azika
        //       $azika = '6287856305677';
        //       sendMessage($pesan3,$azika);
        // }
        session () ->flash('succes','Input laporan berhasil, dan akan segera ditindak lanjuti');
        return back ();
    }
    public function update(Request $request, $id){
        $request -> validate([
            'tindak_awal' => ['required'],
            'tindak_lanjut' => ['required'],
            'uji' => ['required'],
            'tgl_selesai' => ['required'],
            'ket' => ['required'],
        ]);
        $siyapp = Siyapp::findOrFail($id);
       $siyapp->tindak_awal         = $request->tindak_awal;
       $siyapp->tindak_lanjut       = $request->tindak_lanjut;
       $siyapp->uji                 = $request->uji;
       if($request->tgl_selesai != '00/00/0000'){
        $siyapp->tgl_selesai         = $request->tgl_selesai;
        Siyapp::where('id',$id)->update(['status'=>'2']);
        // Pesan User 
        $get_id   = Siyapp :: where('id','=',$id)->first();
        $username = User::where('id','=',$get_id->user_id)->first();
        $no_telp1 = Profile :: where('username','=',$username->username)->first();
        if(isset($no_telp1->telpon)){
        $pesan1 = '*Yth. Bapak/Ibu*🙏, Laporan Siyapp dengan ID Laporan : ' .$id.' telah selesai diproses ✅ ';
        sendMessage($pesan1,$no_telp1->telpon);
        }
       }
       $siyapp->ket                 = $request->ket;
       $siyapp->updated_at          = date('Y-m-d H:i:s');
       $siyapp->save();
       session () ->flash('succes','Data berhasil diupdate !!');
       return back ();
    }
    public function destroy($id){
        $delete = Siyapp::where('id',$id)->first();
        $delete -> delete();
        session () ->flash('succes','Data berhasil dihapus');
        return back();
    }
    public function cetak(){
        
        $lapor = Siyapp::orderBy('id', 'DESC')->get();
        return view('siyapp.formcetak',['lapor'=>$lapor]);
    }
    public function show($id)
    {
        $siyapp = Siyapp :: where('id',$id)->get();
        return response()->json($siyapp);
    }
    public function scetak(Request $request){
        $id = $request -> id;
        $cetak = Siyapp :: where('id',$id)->first();
        // return view('siyapp.cetakk',['cetak'=>$cetak]);
        $pdf = FacadePdf::loadView('siyapp.cetakk',['cetak'=>$cetak]);
        return $pdf->setOptions(['defaultFont' => 'serif'])->stream();
    }
     public function it(){
        $laporan = Siyapp::where('j_barang',1)->orderBy('id', 'DESC')->get();
        return view('siyapp.laporan_it',['laporan'=>$laporan]);
        
    }
    public function detail($id){
        $siyapp = Siyapp :: where('id',$id)->first();
        return view('siyapp.detail',['data'=>$siyapp]);
    }
    public function konfir($id){
        Siyapp::where('id',$id)->update(['status'=>'1']);
        // Pesan User 
        $get_id   = Siyapp :: where('id','=',$id)->first();
        $username = User::where('id','=',$get_id->user_id)->first();
        $no_telp1 = Profile :: where('username','=',$username->username)->first();
        if(isset($no_telp1->telpon)){
        $pesan1 = '*Yth. Bapak/Ibu*🙏, Laporan Siyapp dengan ID Laporan : ' .$id.' telah dikonfirmasi dan akan segera ditindak lanjuti ✅ ';
        sendMessage($pesan1,$no_telp1->telpon);
        }
        return back();
    }
}


    