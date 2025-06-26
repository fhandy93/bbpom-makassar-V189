<?php

namespace App\Http\Controllers;

use App\Models\Bmnbarang;
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
        $barang = Bmnbarang :: get(['id','kode','nup']);
        return view('siyapp.formulir',['barang'=>$barang]);
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

        // $request -> validate([
        //     'nama_barang' => ['required','min:2'],
        //     'merek' => ['required'],
        //     'nup' => ['required'],
        //     'tahun' => ['required'],
        //     'bidang' => ['required'],
        //     'jenis' => ['required']
        // ]);
        Siyapp :: create([
            'user_id' => Auth::user()-> id,
            'nama_barang' => $request-> nama_barang,
            'merek' => $request-> merek,
            'nup' => $request-> kode,
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
            
            // Pesan Untuk ibu Amira
            $amira = '6281355957120';
            sendMessage($pesan2,$amira);
            
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
        
        // Pesan Untuk ibu Amira
        $amira = '6281355957120';
        sendMessage($pesan1,$amira);
        
        // pesan untuk Miska
        $miska = '6285333314410';
        sendMessage($pesan1,$miska);

        }
     
        if($request-> barang == 1){
            return redirect()->route('siyapp.view-it')->with('success', 'Data berhasil diinput'); 
        }else{
            return redirect()->route('siyapp.view-non-it')->with('success', 'Data berhasil diinput'); 
        }
       
    }
    public function update(Request $request, $id){
        // Validasi input
        $request->validate([
            'tindak_awal'   => ['required'],
            'tindak_lanjut' => ['required'],
            'uji'           => ['required'],
            'tgl_selesai'   => ['required'],
            'ket'           => ['required'],
        ]);

        $siyapp = Siyapp::findOrFail($id);
        $siyapp->tindak_awal   = $request->tindak_awal;
        $siyapp->tindak_lanjut = $request->tindak_lanjut;
        $siyapp->uji           = $request->uji;
        $siyapp->ket           = $request->ket;

        // Cek dan update tgl_selesai + status + kirim pesan
        if ($request->tgl_selesai != '00/00/0000') {
            $siyapp->tgl_selesai = $request->tgl_selesai;
            $siyapp->status = 2; // Update langsung field status

            // Ambil user dan profile sekali jalan
            $user = User::find($siyapp->user_id);
            $profile = Profile::where('username', $user->username)->first();

            // Kirim pesan kalau nomor telepon ada
            if (isset($profile->telpon)) {
                $pesan = '*Yth. Bapak/Ibu*🙏, Laporan Siyapp dengan ID Laporan : ' . $id . ' telah selesai diproses ✅';
                sendMessage($pesan, $profile->telpon);
            }
        }

        // Save perubahan
        $siyapp->save();

        if($siyapp->j_barang == 1){
            return redirect()->route('siyapp.view-it')->with('success', 'Data berhasil diedit'); 
        }else{
            return redirect()->route('siyapp.view-non-it')->with('success', 'Data berhasil diedit'); 
        }
    }
    public function destroy($id){
        $delete = Siyapp::where('id',$id)->first();
        $delete -> delete();
        session () ->flash('succes','Data berhasil dihapus');
        if($delete->j_barang == 1){
            return redirect()->route('siyapp.view-it')->with('success', 'Data berhasil dihapus'); 
        }else{
            return redirect()->route('siyapp.view-non-it')->with('success', 'Data berhasil dihapus'); 
        }
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
        $get_id = Siyapp::where('id', '=', $id)->first(); 
        $get_id->update(['status' => '1']); 
        
        $username = User::where('id', '=', $get_id->user_id)->first();
        $no_telp1 = Profile::where('username', '=', $username->username)->first();
        
        if (isset($no_telp1->telpon)) {
            $pesan1 = '*Yth. Bapak/Ibu*🙏, Laporan Siyapp dengan ID Laporan : ' . $id . ' telah dikonfirmasi dan akan segera ditindak lanjuti ✅ ';
            sendMessage($pesan1, $no_telp1->telpon);
        }
        
        if ($get_id->j_barang == 1) {
            return redirect()->route('siyapp.view-it')->with('success', 'Data Terkonfirmasi');
        } else {
            return redirect()->route('siyapp.view-non-it')->with('success', 'Data Terkonfirmasi');
        }
        
    }
    public function showBarang($id){
        $barang = Bmnbarang :: where('id',$id)->first(['kode','nup','nm_barang','merek']);
        return response()->json([$barang]);
    }
}


    