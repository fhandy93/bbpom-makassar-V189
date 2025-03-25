<?php

namespace App\Http\Controllers;

use App\Models\Rujukan;
use App\Models\Transrujukan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class RujukanController extends Controller
{
    public function formrujuk(){
        return view('seppulo.rujukan.form_rujukan');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'tgl_terima' => "required",
            'nama' => "required",
            'ttl' => "required", 
            'umur' => "required", 
            'kelamin' => "required", 
            'agama' => "required", 
            'pekerjaan' => "required", 
            'alamat' => "required", 
            'hp' => "required", 
            'fax' => "required", 
            'email' => "required", 
            'pengaduan' => "required", 
            'produk' => "required", 
            'regis' => "required", 
            'batch' => "required", 
            'tindak' => "required", 
            'pabrik' => "required", 
            'alm_pab' => "required", 
            'nama_kor' => "required", 
            'alm_kor' => "required", 
            'kelamin_kor' => "required", 
            'desc' => "required",
            'hal' => "required",
            'ket' => "required",
            'tujuan' => "required",
        ]);
        $dt = Carbon::now();
        $rujuk              = new Rujukan ();
        if($request->tgl_terima!='00/00/0000'){
        $rujuk->tgl_terima  =  $request->tgl_terima;
        }else{
        $rujuk->tgl_terima  = $dt->format('d/m/Y');
        }
        $rujuk->kadaluarsa  = $request->kadaluarsa;
        $rujuk->nama        = $request->nama;
        $rujuk->ttl         = $request->ttl;
        $rujuk->umur        = $request->umur;
        $rujuk->kelamin     = $request->kelamin;
        $rujuk->agama       = $request->agama;
        $rujuk->pekerjaan   = $request->pekerjaan;
        $rujuk->alamat      = $request->alamat;
        $rujuk->hp          = $request->hp;
        $rujuk->fax         = $request->fax;
        $rujuk->email       = $request->email;
        $rujuk->pengaduan   = $request->pengaduan;
        $rujuk->produk      = $request->produk;
        $rujuk->regis       = $request->regis;
        $rujuk->batch       = $request->batch;
        $rujuk->pabrik      = $request->pabrik;
        $rujuk->alm_pab     = $request->alm_pab;
        $rujuk->nama_kor    = $request->nama_kor;
        $rujuk->alm_kor     = $request->alm_kor;
        $rujuk->kelamin_kor = $request->kelamin_kor;
        $rujuk->desc        = $request->desc;
        $rujuk->user_id     = Auth::user()->id;
        $rujuk->tindak      = $request->tindak;
        $rujuk->tujuan      = $request->tujuan;
        $rujuk->hal         = $request->hal;
        $rujuk->ket         = $request->ket;
        $rujuk->version     = 1;
       
        if($request->gambar1!= ''){        
            $path = public_path().'/storage/rujukan/';

             //upload new file
             $file1 = $request->gambar1;
             $filename1 = "/storage/rujukan/".time().$file1->getClientOriginalName();
             $file1->move($path, $filename1);
             $rujuk->gambar1         = $filename1;

        }
        if($request->gambar2!= ''){        
            $path = public_path().'/storage/rujukan/';

             //upload new file
             $file2 = $request->gambar2;
             $filename2 = "/storage/rujukan/".time().$file2->getClientOriginalName();
             $file2->move($path, $filename2);
             $rujuk->gambar2         = $filename2;

        }
        if($request->gambar3!= ''){        
            $path = public_path().'/storage/rujukan/';

             //upload new file
             $file3 = $request->gambar3;
             $filename3 = "/storage/rujukan/".time().$file3->getClientOriginalName();
             $file3->move($path, $filename3);
             $rujuk->gambar3         = $filename3;

        }
        if($request->gambar4!= ''){        
            $path = public_path().'/storage/rujukan/';

             //upload new file
             $file4 = $request->gambar4;
             $filename4 = "/storage/rujukan/".time().$file4->getClientOriginalName();
             $file4->move($path, $filename4);
             $rujuk->gambar4         = $filename4;

        }
        if($request->gambar5!= ''){        
            $path = public_path().'/storage/rujukan/';

             //upload new file
             $file5 = $request->gambar5;
             $filename5 = "/storage/rujukan/".time().$file5->getClientOriginalName();
             $file5->move($path, $filename5);
             $rujuk->gambar5         = $filename5;

        }
        if($request->gambar6!= ''){        
            $path = public_path().'/storage/rujukan/';

             //upload new file
             $file6 = $request->gambar6;
             $filename6 = "/storage/rujukan/".time().$file6->getClientOriginalName();
             $file6->move($path, $filename6);
             $rujuk->gambar6         = $filename6;

        }
     
        $rujuk->save();
        
        // pesan untuk ibu Ana
        $pesan = "*Yth. Bapak/Ibu*, Laporan Rujukan baru telah *Sukses* diinput masuk kedalam sistem !";
        $ana = '628164385805';
        sendMessage($pesan,$ana);


        return back()->with('succes', 'Data berhasil diinput');
        
    }
    public function index(){
        $permission = Auth::user()->is_permission;
        if($permission == 1 or $permission == 5){
            $data = Rujukan::orderBy('id', 'DESC')->where('version',1)->take(500)->get();
            return view('seppulo.rujukan.rujukanv',['rujuk'=>$data]);
        }
        else
        {
            $data = Transrujukan::where('bidang',$permission)->orderBy('id', 'DESC')->take(500)->get();;
            return view('seppulo.rujukan.rujukanv',['rujuk'=>$data]);
        }
    }
    public function show($id){
        $data = Rujukan::where('id',$id)->first();
        return view('seppulo.rujukan.detail',['rujuk'=>$data]);
    }
    public function cetak($id){
        $data = Rujukan::where('id',$id)->first();
        $rujuk = Transrujukan ::where('rujukan_id',$id)->first();
        $pdf = FacadePdf::loadView('seppulo.rujukan.cetak',['rujuk'=>$data,'trans'=>$rujuk]) ->setOptions([
            'enable_remote' => true,
            'chroot'  => public_path('storage/post-image'),
            'defaultFont' => 'serif',
        ]);;
        return $pdf->setPaper('f4', 'portrait')->stream();
        
        // return view('seppulo.rujukan.cetak',['rujuk'=>$data,'trans'=>$rujuk]);
    }
    public function edit($id){
        $rujuk = Rujukan::findOrFail($id);
        return view('seppulo.rujukan.edit',['rujuk'=> $rujuk]);
    }
    public function rujukan(){
        return view('seppulo.rujukan.rujukan');
    }
    public function update(Request $request,$id){
        $validator = Validator::make($request->all(), [
            'tgl_terima' => "required",
            'nama' => "required",
            'ttl' => "required", 
            'umur' => "required", 
            'kelamin' => "required", 
            'agama' => "required", 
            'pekerjaan' => "required", 
            'alamat' => "required", 
            'hp' => "required", 
            'fax' => "required", 
            'email' => "required", 
            'pengaduan' => "required", 
            'produk' => "required", 
            'regis' => "required", 
            'batch' => "required", 
            'tindak' => "required", 
            'pabrik' => "required", 
            'alm_pab' => "required", 
            'nama_kor' => "required", 
            'alm_kor' => "required", 
            'kelamin_kor' => "required", 
            'desc' => "required",
            'hal' => "required",
            'ket' => "required",
            'tujuan' => "required",
        ]);
        $dt = Carbon::now();
            $rujuk  = Rujukan::findOrFail($id);
            if($request->tgl_terima!='00/00/0000'){
            $rujuk->tgl_terima  =  $request->tgl_terima;
            }else{
            $rujuk->tgl_terima  = $dt->format('d/m/Y');
            }
            $rujuk->kadaluarsa  = $request->kadaluarsa;
            $rujuk->nama        = $request->nama;
            $rujuk->ttl         = $request->ttl;
            $rujuk->umur        = $request->umur;
            $rujuk->kelamin     = $request->kelamin;
            $rujuk->agama       = $request->agama;
            $rujuk->pekerjaan   = $request->pekerjaan;
            $rujuk->alamat      = $request->alamat;
            $rujuk->hp          = $request->hp;
            $rujuk->fax         = $request->fax;
            $rujuk->email       = $request->email;
            $rujuk->pengaduan   = $request->pengaduan;
            $rujuk->produk      = $request->produk;
            $rujuk->regis       = $request->regis;
            $rujuk->batch       = $request->batch;
            $rujuk->pabrik      = $request->pabrik;
            $rujuk->alm_pab     = $request->alm_pab;
            $rujuk->nama_kor    = $request->nama_kor;
            $rujuk->alm_kor     = $request->alm_kor;
            $rujuk->kelamin_kor = $request->kelamin_kor;
            $rujuk->desc        = $request->desc;
            $rujuk->tindak      = $request->tindak;
            $rujuk->tujuan      = $request->tujuan;
            $rujuk->hal         = $request->hal;
            $rujuk->ket         = $request->ket;

            if($request->gambar1!= ''){        
                $path = public_path().'/storage/rujukan/';
    
                 //code for remove old file
                if($rujuk->gambar1 != ''  && $rujuk->gambar1 != null ){
                $file_old = $rujuk->gambar1;
                unlink(public_path().$file_old);
                }

                 //upload new file
                 $file1 = $request->gambar1;
                 $filename1 = "/storage/rujukan/".time().$file1->getClientOriginalName();
                 $file1->move($path, $filename1);
                 $rujuk->gambar1         = $filename1;
    
            }
            if($request->gambar2!= ''){        
                $path = public_path().'/storage/rujukan/';

                  //code for remove old file
                  if($rujuk->gambar2 != ''  && $rujuk->gambar2 != null ){
                    $file_old = $rujuk->gambar2;
                    unlink(public_path().$file_old);
                    }
    
                 //upload new file
                 $file2 = $request->gambar2;
                 $filename2 = "/storage/rujukan/".time().$file2->getClientOriginalName();
                 $file2->move($path, $filename2);
                 $rujuk->gambar2         = $filename2;
    
            }
            if($request->gambar3!= ''){        
                $path = public_path().'/storage/rujukan/';
    
                //code for remove old file
                if($rujuk->gambar3 != ''  && $rujuk->gambar3 != null ){
                $file_old = $rujuk->gambar3;
                unlink(public_path().$file_old);
                }

                 //upload new file
                 $file3 = $request->gambar3;
                 $filename3 = "/storage/rujukan/".time().$file3->getClientOriginalName();
                 $file3->move($path, $filename3);
                 $rujuk->gambar3         = $filename3;
    
            }
            if($request->gambar4!= ''){        
                $path = public_path().'/storage/rujukan/';

                //code for remove old file
                if($rujuk->gambar4 != ''  && $rujuk->gambar4 != null ){
                $file_old = $rujuk->gambar4;
                unlink(public_path().$file_old);
                }
    
                 //upload new file
                 $file4 = $request->gambar4;
                 $filename4 = "/storage/rujukan/".time().$file4->getClientOriginalName();
                 $file4->move($path, $filename4);
                 $rujuk->gambar4         = $filename4;
    
            }
            if($request->gambar5!= ''){        
                $path = public_path().'/storage/rujukan/';
    
                //code for remove old file
                if($rujuk->gambar5 != ''  && $rujuk->gambar5 != null ){
                $file_old = $rujuk->gambar5;
                unlink(public_path().$file_old);
                }

                 //upload new file
                 $file5 = $request->gambar5;
                 $filename5 = "/storage/rujukan/".time().$file5->getClientOriginalName();
                 $file5->move($path, $filename5);
                 $rujuk->gambar5         = $filename5;
    
            }
            if($request->gambar6!= ''){        
                $path = public_path().'/storage/rujukan/';
    
                //code for remove old file
                if($rujuk->gambar6 != ''  && $rujuk->gambar6 != null ){
                $file_old = $rujuk->gambar6;
                unlink(public_path().$file_old);
                }

                 //upload new file
                 $file6 = $request->gambar6;
                 $filename6 = "/storage/rujukan/".time().$file6->getClientOriginalName();
                 $file6->move($path, $filename6);
                 $rujuk->gambar6         = $filename6;
    
            }
            $rujuk->updated_at   = date('Y-m-d H:i:s');
            $rujuk->save();

        return back()->with('succes', 'Data berhasil diupdate');
    }
    public function hasil($id){
        $rujuk = Transrujukan ::where('rujukan_id',$id)->first();
        return view('seppulo.rujukan.form_hasil',['rujuk'=>$rujuk]);
    }
    public function kirim(Request $request){
        $cek = Transrujukan :: where('rujukan_id', $request->rujukan_id)->first();
        if(isset($cek)){
            $data = Rujukan::where('version',1)->latest()->get();
            return view('seppulo.rujukan.rujukanv',['rujuk'=>$data])->with('succes', 'Data berhasil diupdate');
        }else{
        $rujuk              = new Transrujukan ();
        $rujuk->rujukan_id  = $request->rujukan_id;
        $rujuk->user_id     = Auth::user()->id;
        $rujuk->desc        = "-";
        $rujuk->tgl_kembali = "1111-11-11";
        $rujuk->bidang      = $request->bidang;
        $rujuk->save();
        
        // Pesan untuk ibu Sriyani
        if($request->bidang==7){
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan dengan No. Form: ".$rujuk->rujukan_id." masuk ke akun anda untuk dikonfirmasi, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/rujukanv";
            $sri = '6281355733866';
            sendMessage($pesan,$sri);
        }
        elseif($request->bidang==8){
            // pesan untuk pak Hamka
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan dengan No. Form: ".$rujuk->rujukan_id." masuk ke akun anda untuk dikonfirmasi, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/rujukanv";
            $hamka = '6282298013619';
            sendMessage($pesan,$hamka);
        }
        elseif($request->bidang==9){
            // pesan untuk ibu st nurhamida
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan dengan No. Form: ".$rujuk->rujukan_id." masuk ke akun anda untuk dikonfirmasi, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/rujukanv";
            $ida = '6285241560800';
            sendMessage($pesan,$ida);
        }

        $update  = Rujukan::findOrFail($request->rujukan_id);
        $update->status      = 1;
        $update->kembali     = null;
        $update->save();

        $data = Rujukan::where('version',1)->latest()->get();
        return view('seppulo.rujukan.rujukanv',['rujuk'=>$data])->with('succes', 'Data berhasil diupdate');
        }
    }
    public function konfir(Request $request){
        $update  = Rujukan::findOrFail($request->rujukan_id);
        $update->status      = 2;
        $update->save();

         // pesan untuk ibu adilah
         $pesan = "*Yth. Bapak/Ibu*, Laporan Rujukan dengan No. Form: ".$request->rujukan_id." Telah *Disetujui dan dikonfirmasi*, Silakan menunggu hasil dari konfirmasi";
         $ana = '628164385805';
        sendMessage($pesan,$ana);

        Transrujukan :: where('rujukan_id',$request->rujukan_id)-> update(['user_id' => Auth::user()->id , 'updated_at' => date('Y-m-d H:i:s') ]);

        $rujuk = Transrujukan ::where('rujukan_id',$request->rujukan_id)->first();
        return view('seppulo.rujukan.form_hasil',['rujuk'=>$rujuk]);
        
    }
    public function rujukh(Request $request,$id){
        $rujuk  = Transrujukan::findOrFail($id);
        $rujuk->desc        = $request->desc;

        if($request->gambar1!= ''){        
            $path = public_path().'/storage/rujukan/';

                //code for remove old file
            if($rujuk->gambar1 != ''  && $rujuk->gambar1 != null ){
            $file_old = $rujuk->gambar1;
            unlink(public_path().$file_old);
            }

                //upload new file
                $file1 = $request->gambar1;
                $filename1 = "/storage/rujukan/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $rujuk->gambar1         = $filename1;

        }
        if($request->gambar2!= ''){        
            $path = public_path().'/storage/rujukan/';

                //code for remove old file
                if($rujuk->gambar2 != ''  && $rujuk->gambar2 != null ){
                $file_old = $rujuk->gambar2;
                unlink(public_path().$file_old);
                }

                //upload new file
                $file2 = $request->gambar2;
                $filename2 = "/storage/rujukan/".time().$file2->getClientOriginalName();
                $file2->move($path, $filename2);
                $rujuk->gambar2         = $filename2;

        }
        if($request->gambar3!= ''){        
            $path = public_path().'/storage/rujukan/';

            //code for remove old file
            if($rujuk->gambar3 != ''  && $rujuk->gambar3 != null ){
            $file_old = $rujuk->gambar3;
            unlink(public_path().$file_old);
            }

                //upload new file
                $file3 = $request->gambar3;
                $filename3 = "/storage/rujukan/".time().$file3->getClientOriginalName();
                $file3->move($path, $filename3);
                $rujuk->gambar3         = $filename3;

        }
        if($request->gambar4!= ''){        
            $path = public_path().'/storage/rujukan/';

            //code for remove old file
            if($rujuk->gambar4 != ''  && $rujuk->gambar4 != null ){
            $file_old = $rujuk->gambar4;
            unlink(public_path().$file_old);
            }

                //upload new file
                $file4 = $request->gambar4;
                $filename4 = "/storage/rujukan/".time().$file4->getClientOriginalName();
                $file4->move($path, $filename4);
                $rujuk->gambar4         = $filename4;

        }
        if($request->gambar5!= ''){        
            $path = public_path().'/storage/rujukan/';

            //code for remove old file
            if($rujuk->gambar5 != ''  && $rujuk->gambar5 != null ){
            $file_old = $rujuk->gambar5;
            unlink(public_path().$file_old);
            }

                //upload new file
                $file5 = $request->gambar5;
                $filename5 = "/storage/rujukan/".time().$file5->getClientOriginalName();
                $file5->move($path, $filename5);
                $rujuk->gambar5         = $filename5;

        }
        if($request->gambar6!= ''){        
            $path = public_path().'/storage/rujukan/';

            //code for remove old file
            if($rujuk->gambar6 != ''  && $rujuk->gambar6 != null ){
            $file_old = $rujuk->gambar6;
            unlink(public_path().$file_old);
            }

                //upload new file
                $file6 = $request->gambar6;
                $filename6 = "/storage/rujukan/".time().$file6->getClientOriginalName();
                $file6->move($path, $filename6);
                $rujuk->gambar6         = $filename6;

        }
        $rujuk->updated_at   = date('Y-m-d H:i:s');
        $rujuk->save();
         $permission = Auth::user()->is_permission;
        if($permission == 5 ){
            $data = Rujukan::orderBy('id', 'DESC')->where('version',1)->take(500)->get();
            return view('seppulo.rujukan.rujukanv',['rujuk'=>$data]);
        }else{
        $data = Transrujukan ::get();
        return view('seppulo.rujukan.rujukanv',['rujuk'=>$data]);
        }
    }
    public function rujukha($id){
        $rujuk = Transrujukan ::where('rujukan_id',$id)->first();
        return view('seppulo.rujukan.form_hasil',['rujuk'=>$rujuk]);
    }
    public function kirimhasil(Request $request){
        $update  = Rujukan::findOrFail($request->rujukan_id);
        $update->status      = 3;
        $update->save();

          // pesan untuk ibu adilah
          $pesan = "*Yth. Bapak/Ibu*, Hasil Rujukan dengan No. Form: ".$request->rujukan_id." Telah *Selesai diolah* dan telah dikirim kembali ke akun anda";
          $ana = '628164385805';
          sendMessage($pesan,$ana);

        $dt = Carbon::now();
        Transrujukan :: where('rujukan_id',$request->rujukan_id)-> update(['tgl_kembali' => $dt->toDateString() ]);
         $permission = Auth::user()->is_permission;
        if($permission == 5 ){
            $data = Rujukan::orderBy('id', 'DESC')->where('version',1)->take(500)->get();
            return view('seppulo.rujukan.rujukanv',['rujuk'=>$data]);
        }else{
        $data = Transrujukan ::get();
        return view('seppulo.rujukan.rujukanv',['rujuk'=>$data]);
        }
    }
    public function kembali($id){
        return view('seppulo.rujukan.form_kembali',['rujuk'=>$id]);
    }
    public function kembalis(Request $request,$id){
        $update  = Rujukan::findOrFail($id);
        if(isset($update->kembali)){
        $data = Transrujukan ::get();
        return view('seppulo.rujukan.rujukanv',['rujuk'=>$data]);
        }else{
        $update->kembali      = $request->desc;
        $update->status       = 4;
        $update->updated_at   = date('Y-m-d H:i:s');
        $update->save();
        
        // pesan ke Ibu Adilah
        $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Dikembalikan* utuk ditinjau kembali, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/rujukanv";
        $ana = '628164385805';
        sendMessage($pesan,$ana);

        $rujuk  = Transrujukan::where('rujukan_id',$id);
        $rujuk ->delete();
         $permission = Auth::user()->is_permission;
        if($permission == 5 ){
            $data = Rujukan::orderBy('id', 'DESC')->where('version',1)->take(500)->get();
            return view('seppulo.rujukan.rujukanv',['rujuk'=>$data]);
        }else{
        $data = Transrujukan ::get();
        return view('seppulo.rujukan.rujukanv',['rujuk'=>$data]);
        }
        }
    }
        public function info(){
        return view('seppulo.rujukan.info');
    }
        public function delete($id){
        $trans = Transrujukan::where('rujukan_id','=',$id)->first(); 
        if($trans->gambar1 && file_exists(public_path().$trans->gambar1)){
            unlink(public_path().$trans->gambar1);
        }
        if($trans->gambar2 && file_exists(public_path().$trans->gambar2)){
            unlink(public_path().$trans->gambar2);
        }
        if($trans->gambar3 && file_exists(public_path().$trans->gambar3)){
            unlink(public_path().$trans->gambar3);
        }
        if($trans->gambar4 && file_exists(public_path().$trans->gambar4)){
            unlink(public_path().$trans->gambar4);
        }
        if($trans->gambar5 && file_exists(public_path().$trans->gambar5)){
            unlink(public_path().$trans->gambar5);
        }
        if($trans->gambar6 && file_exists(public_path().$trans->gambar6)){
            unlink(public_path().$trans->gambar6);
        }
        
        
        $rujuk = Rujukan::findOrFail($id);
        $rujuk->delete();
        
        if($rujuk->gambar1 && file_exists(public_path().$rujuk->gambar1)){
            unlink(public_path().$rujuk->gambar1);
        }
        if($rujuk->gambar2 && file_exists(public_path().$rujuk->gambar2)){
            unlink(public_path().$rujuk->gambar2);
        }
        if($rujuk->gambar3 && file_exists(public_path().$rujuk->gambar3)){
            unlink(public_path().$rujuk->gambar3);
        }
        if($rujuk->gambar4 && file_exists(public_path().$rujuk->gambar4)){
            unlink(public_path().$rujuk->gambar4);
        }
        if($rujuk->gambar5 && file_exists(public_path().$rujuk->gambar5)){
            unlink(public_path().$rujuk->gambar5);
        }
        if($rujuk->gambar6 && file_exists(public_path().$rujuk->gambar6)){
            unlink(public_path().$rujuk->gambar6);
        }
    
        $data = Rujukan::orderBy('id', 'DESC')->where('version',1)->take(500)->get();
        return view('seppulo.rujukan.rujukanv',['rujuk'=>$data]);
    }
}
