<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rujukan;
use App\Models\Transrujukan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class RujukanNewController extends Controller
{
    public function rujukan(){
        return view('rujukan.index');
    }
    public function formrujuk(){
        return view('rujukan.form_rujukan');
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
        $max_id = Rujukan :: max('id');
        $rujuk              = new Rujukan ();
        $rujuk->id          = $max_id + 1;
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
        $rujuk->tujuan      = $request->tujuan;
        $rujuk->hal         = $request->hal;
        $rujuk->ket         = $request->ket;
        $rujuk->version     = 2;
       
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
        $ana = '6281243782726';
        sendMessage($pesan,$ana);


        return $this->view()->with('success', 'Data berhasil diinput');
        
    }
    public function view(){
        $permission = Auth::user()->is_permission;
        // if($permission == 1 or $permission == 5 or $permission == 16){
        //     $data = Rujukan::orderBy('id', 'DESC')->where('version',2)->take(500)->get();
        //     return view('rujukan.rujukanv',['rujuk'=>$data]);
        // }
        // else
        // {
        //     $data = Transrujukan::where('bidang',$permission)->orderBy('id', 'DESC')->take(500)->get();;
        //     return view('rujukan.rujukanv',['rujuk'=>$data]);
        // }
        if($permission == 5 || $permission == 17 ){
            $data = Rujukan::orderBy('id', 'DESC')->where('version',2)
                                                ->whereIn('status',[0,1,2,3,4,5,6,7,8,9])
                                                ->take(500)->get();
        }elseif($permission == 16 ){
            $data = Rujukan::orderBy('id', 'DESC')->where('version',2)
                                                ->whereIn('status',[1,2,3,4,5,6,7,8,9])
                                                ->take(500)->get();
        }elseif($permission == 7 || $permission == 21){
            $data = Rujukan::orderBy('id', 'DESC')->where('version',2)
                                                ->where('tindak',4)
                                                ->whereIn('status',[4,8,9])
                                                ->take(500)->get();
        }elseif($permission == 8 || $permission == 18){
            $data = Rujukan::orderBy('id', 'DESC')->where('version',2)
                                                ->where('tindak',5)
                                                ->whereIn('status',[5,8,9])
                                                ->take(500)->get();
        }elseif($permission == 9 ){
            $data = Rujukan::orderBy('id', 'DESC')->where('version',2)
                                                ->where('tindak',6)
                                                ->whereIn('status',[6,8,9])
                                                ->take(500)->get();
        }elseif($permission == 1 ){
            $data = Rujukan::orderBy('id', 'DESC')->where('version',2)->take(500)->get();
        }

        
        return view('rujukan.rujukanv',['rujuk'=>$data]);
    }
    public function show($id){
        $data = Rujukan::where('id',$id)->first();
        $hasil = Transrujukan :: where('rujukan_id',$id)->first();
        return view('rujukan.detail',['rujuk'=>$data,'hasil'=>$hasil]);
    }
    public function delete($id){
        $dara_trans =  $trans = Transrujukan::where('rujukan_id','=',$id)->first(); 
        if($dara_trans){
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
        }
        
        
        $data_induk = $rujuk = Rujukan::findOrFail($id);
        $rujuk->delete();
        if($data_induk){
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
        }
    
        $data = Rujukan::orderBy('id', 'DESC')->where('version',2)->take(500)->get();
        return view('rujukan.rujukanv',['rujuk'=>$data]);
    }
    public function download($id){
        ob_end_clean();
        return Storage::download('/rujukan/'.$id);
    }
    public function edit($id){
        $rujuk = Rujukan::findOrFail($id);
        return view('rujukan.edit',['rujuk'=> $rujuk]);
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
    public function cetak($id){
        $data = Rujukan::where('id',$id)->first();
        $rujuk = Transrujukan ::where('rujukan_id',$id)->first();
        $pdf = FacadePdf::loadView('rujukan.cetak',['rujuk'=>$data,'trans'=>$rujuk]) ->setOptions([
            'enable_remote' => true,
            'chroot'  => public_path('storage/post-image'),
            'defaultFont' => 'serif',
        ]);;
        return $pdf->setPaper('f4', 'portrait')->stream();
        
        // return view('seppulo.rujukan.cetak',['rujuk'=>$data,'trans'=>$rujuk]);
    }
    public function kirim(Request $request){
        $cek = Transrujukan :: where('rujukan_id', $request->rujukan_id)->first();
        if(isset($cek)){
            $data = Rujukan::latest()->get();
            return view('rujukan.rujukanv',['rujuk'=>$data])->with('succes', 'Data berhasil diupdate');
        }else{
        $rujuk              = new Transrujukan ();
        $rujuk->rujukan_id  = $request->rujukan_id;
        $rujuk->user_id     = Auth::user()->id;
        $rujuk->desc        = "-";
        $rujuk->tgl_kembali = "1111-11-11";
        $rujuk->save();
        
        // Pesan untuk ibu Kabalai
        $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan dengan No. Form: ".$rujuk->rujukan_id." masuk ke akun anda untuk dikonfirmasi, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v2-rujukan-view";
        $kabalai = '6281343000011';
        sendMessage($pesan,$kabalai);
     
        $update  = Rujukan::findOrFail($request->rujukan_id);
        $update->status      = 1;
        $update->kembali     = null;
        $update->save();

        return $this->view();
        }
    }
    public function kembali($id){
        return view('rujukan.form_kembali',['rujuk'=>$id]);
    }
    public function kembalis(Request $request,$id){
        $data  = Rujukan::where('id','=',$id)->whereNull('tindak')->first();
        if($data){
            $update  = Rujukan::findOrFail($id);
            $update->kembali      = $request->desc;
            $update->status       = 2;
            $update->updated_at   = date('Y-m-d H:i:s');
            $update->save();
            
            // pesan ke Ibu Ana
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Dikembalikan oleh KABALAI* utuk ditinjau kembali, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v2-rujukan-view";
            $ana = '6281243782726';
            sendMessage($pesan,$ana);

            $rujuk  = Transrujukan::where('rujukan_id',$id);
            $rujuk ->delete();
        }else{
            $update  = Rujukan::findOrFail($id);
            $update->kembali      = $request->desc;
            $update->status       = 8;
            $update->updated_at   = date('Y-m-d H:i:s');
            $update->save();

            $data  = Rujukan::where('id','=',$id)->first('tindak');
            if($data->tindak == 3){
                // pesan ke Ibu Ana
                $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan *Hasil Rujukan* telah *Dikembalikan oleh KABALAI* utuk ditinjau kembali, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v2-rujukan-view";
                $ana = '6281243782726';
                sendMessage($pesan,$ana);
            }else if($data->tindak == 4){
                // pesan ke Ibu Sri
                $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan *Hasil Rujukan* telah *Dikembalikan oleh KABALAI* utuk ditinjau kembali, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v2-rujukan-view";
                $sri = '6281355733866';
                sendMessage($pesan,$sri);
            }else if($data->tindak == 5){
                // pesan ke Pak Hamka
                $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan *Hasil Rujukan* telah *Dikembalikan oleh KABALAI* utuk ditinjau kembali, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v2-rujukan-view";
                $hamka = '6282298013619';
                sendMessage($pesan,$hamka);
            }else if($data->tindak == 6){
                // pesan ke Pak Nurhamida
                $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan *Hasil Rujukan* telah *Dikembalikan oleh KABALAI* utuk ditinjau kembali, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v2-rujukan-view";
                $nurhamida = '6285241560800';
                sendMessage($pesan,$nurhamida);
            }
        }
        return $this->view();
    }
    public function tindak(Request $request, $id){
        $update  = Rujukan::findOrFail($id);
        $update->status       = $request->tindak;
        $update->tindak       = $request->tindak;
        $update->desc_tl      = $request->desc_tl;
        $update->updated_at   = date('Y-m-d H:i:s');
        $update->save();

        $update_trans = Transrujukan :: where('rujukan_id',$id)->first();
        $update_trans->bidang       = $request->tindak;
        $update_trans->updated_at   = date('Y-m-d H:i:s');
        $update_trans->save();        
        
        if($request->tindak == 3){
            // pesan ke Ibu Ana
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Infokom* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v2-rujukan-view";
            $ana = '6281243782726';
            sendMessage($pesan,$ana);
        }else if($request->tindak == 4){
            // pesan ke Ibu Sri
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Substansi Penindakan* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v2-rujukan-view";
            $sri = '6281355733866';
            sendMessage($pesan,$sri);
        }else if($request->tindak == 5){
            // pesan ke Pak Hamka
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Pemeriksaan* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v2-rujukan-view";
            $hamka = '6282298013619';
            sendMessage($pesan,$hamka);
        }else if($request->tindak == 6){
            // pesan ke Pak Nurhamida
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Substansi Pengujian* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v2-rujukan-view";
            $nurhamida = '6285241560800';
            sendMessage($pesan,$nurhamida);
        }

        return $this->view();
    }
    public function rujukha($id){
        $rujuk = Transrujukan ::where('rujukan_id',$id)->first();
        return view('rujukan.form_hasil',['rujuk'=>$rujuk]);
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
        return $this->view();
    }
    public function kirimhasil(Request $request){
        $update  = Rujukan::findOrFail($request->rujukan_id);
        $update->status      = 7;
        $update->kembali      = null;
        $update->save();

          // pesan untuk ibu kabalai
          $pesan = "*Yth. Bapak/Ibu*, Hasil Rujukan dengan No. Form: ".$request->rujukan_id." Telah *Selesai diolah* dan telah dikirim kembali ke akun anda untuk dikonfirmasi, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v2-rujukan-view";
          $ana = '6281343000011';
          sendMessage($pesan,$ana);

        $dt = Carbon::now();
        Transrujukan :: where('rujukan_id',$request->rujukan_id)-> update(['user_id' => Auth::user()->id,'tgl_kembali' => $dt->toDateString() ]);
        return $this->view();
    }
    public function selesai(Request $request){
        $update  = Rujukan::findOrFail($request->rujukan_id);
        $update->status      = 9;
        $update->save();

         // pesan untuk ibu adilah
         $pesan = "*Yth. Bapak/Ibu*, Laporan Rujukan dengan No. Form: ".$request->rujukan_id." Telah *Selesai dan dikonfirmasi oleh KABALAI*";
         $ana = '6281243782726';
        sendMessage($pesan,$ana);

        return $this->view();
    }
    public function info(){
        return view('rujukan.info');
    }
}
