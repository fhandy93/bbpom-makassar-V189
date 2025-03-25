<?php

namespace App\Http\Controllers;

use App\Models\Seppulorujukan;
use App\Models\Seppulotransrujukan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class SeppuloRujukanController extends Controller
{
    public function rujukan(){
        return view('seppulo-rujukan.index');
    }
    public function formrujuk(){
        return view('seppulo-rujukan.form_rujukan');
    }   
    public function store(Request $request){
        $request->validate([
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
            'kadaluarsa' => "required",
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
        $max_id = Seppulorujukan :: max('id');
        $rujuk              = new Seppulorujukan ();
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
        
        // pesan untuk Pak lalo
        $pesan = "*Yth. Bapak/Ibu*, Laporan Rujukan baru telah *Sukses* diinput masuk kedalam sistem !";
        $lalo = '6281243782726';
        sendMessage($pesan,$lalo);
        
        return redirect()->route('seppulov3.view')->with('success', 'Data berhasil diinput');
        
        // session () ->flash('success','Data berhasil diinput');
        // return $this->view();

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
        if($permission == 5 || $permission == 17){
            $data = Seppulorujukan::orderBy('id', 'DESC')
                                                ->whereIn('status',[0,1,2,3,7,8,9])
                                                ->get();
        }elseif($permission == 16 ){
            $data = Seppulorujukan::orderBy('id', 'DESC')
                                                ->whereIn('status',[1,3,7,8,9])
                                                ->get();
        }elseif($permission == 7 || $permission == 21){
            $data = Seppulorujukan::join('trans_seppulo_rujukan','trans_seppulo_rujukan.rujukan_id','=','seppulo_rujukan.id')
                                                ->whereIn('seppulo_rujukan.status',[3,7,8,9])
                                                ->where('trans_seppulo_rujukan.tindak','=',4)
                                                ->orderBy('seppulo_rujukan.id', 'DESC')
                                                ->get('seppulo_rujukan.*');
        }elseif($permission == 8 || $permission == 18 ){
            $data = Seppulorujukan::join('trans_seppulo_rujukan','trans_seppulo_rujukan.rujukan_id','=','seppulo_rujukan.id')
                                                ->whereIn('seppulo_rujukan.status',[3,7,8,9])
                                                ->whereIn('trans_seppulo_rujukan.tindak',[5,6,8])
                                                ->orderBy('seppulo_rujukan.id', 'DESC')->groupBy('id')
                                                ->get('seppulo_rujukan.*');
        }elseif($permission == 9 || $permission == 20){
            $data = Seppulorujukan::join('trans_seppulo_rujukan','trans_seppulo_rujukan.rujukan_id','=','seppulo_rujukan.id')
                                                ->whereIn('seppulo_rujukan.status',[3,7,8,9])
                                                ->where('trans_seppulo_rujukan.tindak','=',7)
                                                ->orderBy('seppulo_rujukan.id', 'DESC')
                                                ->get('seppulo_rujukan.*');
        }elseif($permission == 1 ){
            $data = Seppulorujukan::orderBy('id', 'DESC')
                                                
                                                ->get();
        }

        // echo $data;
        return view('seppulo-rujukan.rujukanv',['rujuk'=>$data]);
    }
    public function show($id){
        $data = Seppulorujukan::where('id',$id)->first();
        $hasil = Seppulotransrujukan :: where('rujukan_id',$id)->get();
        return view('seppulo-rujukan.detail',['rujuk'=>$data,'hasil'=>$hasil]);
    }
    public function delete($id){
        $data_trans =  $trans = Seppulotransrujukan::where('rujukan_id','=',$id)->first(); 
        if($data_trans){
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
        
        
        $data_induk = $rujuk = Seppulorujukan::findOrFail($id);
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
        
        return redirect()->route('seppulov3.view')->with('success', 'Data berhasil dihapus');
  
    }
    public function edit($id){
        $rujuk = Seppulorujukan::findOrFail($id);
        return view('seppulo-rujukan.edit',['rujuk'=> $rujuk]);
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
        $rujuk  = Seppulorujukan::findOrFail($id);

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
            
            return redirect()->route('seppulov3.view')->with('success', 'Data berhasil diupdate');
            
            // session () ->flash('success','Data berhasil diupdate');
            // return $this->view();
    }
    public function kirim(Request $req){        
        // Pesan untuk ibu Kabalai
        $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan dengan No. Form: ".$req->rujukan_id." masuk ke akun anda untuk dikonfirmasi, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
        $kabalai = '6281343000011';
        sendMessage($pesan,$kabalai);
     
        $update  = Seppulorujukan::findOrFail($req->rujukan_id);
        $update->status      = 1;
        $update->kembali     = null;
        $update->save();

        return redirect()->route('seppulov3.view')->with('success', 'Data berhasil dikirim');

        // return $this->view();
    }
    public function tindak(Request $req, $id){

        foreach($req->tindak as $item){
            $rujuk              = new Seppulotransrujukan ();
            $rujuk->rujukan_id  = $id;
            $rujuk->user_id     = Auth::user()->id;
            $rujuk->desc        = "-";
            $rujuk->tgl_kembali = "1111-11-11";
            $rujuk->tindak      = $item;
            $rujuk->status      = 3;
            $rujuk->save();  

            if($item == 3){
                // pesan ke Infokom
                $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Infokom* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
                $lalo = '6281243782726';
                sendMessage($pesan,$lalo);
            }else if($item == 4){
                // pesan ke Penindakan
                $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Substansi Penindakan* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
                $sri = '6281355733866';
                sendMessage($pesan,$sri);
            }else if($item == 5){
                // pesan ke Pemeriksaan
                $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Pemeriksaan* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
                $norma = '6281342720161';
                sendMessage($pesan,$norma);
            }else if($item == 6){
                // pesan ke Pemeriksaan
                $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Pemeriksaan* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
                $ilham = '6285396907906';
                sendMessage($pesan,$ilham);
            }else if($item == 7){
                // pesan ke Pengujian
                $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Substansi Pengujian* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
                $nurhamida = '6285241560800';
                sendMessage($pesan,$nurhamida);
            }
            else if($item == 8){
                // pesan ke pemeriksaan
                $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Rirujuk Ke Kelompok Pemeriksaan* oleh *KABALAI BBPOM Makassar* untuk ditinjak lanjuti, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
                $rahman = '6281355497097';
                sendMessage($pesan,$rahman);
            }
        }

        $update  = Seppulorujukan::findOrFail($id);
        $update->status       = 3;
        $update->desc_tl      = $req->desc_tl;
        $update->updated_at   = date('Y-m-d H:i:s');
        $update->save();
        
        return redirect()->route('seppulov3.view')->with('success', 'Data Tindak Lanjut telah dikirim');
        
        // session () ->flash('success','Data Tindak Lanjut telah dikirim');
        // return $this->view();
    }
    public function kembali($id){
        return view('seppulo-rujukan.form_kembali',['rujuk'=>$id]);
    }
    public function kembalis(Request $request,$id){
        $data  = Seppulorujukan::where('id','=',$id)->where('status','=',1)->first();
        if($data){
            $update  = Seppulorujukan::findOrFail($id);
            $update->kembali      = $request->desc;
            $update->status       = 2;
            $update->updated_at   = date('Y-m-d H:i:s');
            $update->save();
            
            // pesan ke infoko,
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan Rujukan telah *Dikembalikan oleh KABALAI* utuk ditinjau kembali, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
            $lalo = '6281243782726';
            sendMessage($pesan,$lalo);
        }else{
          
        }
        
        return redirect()->route('seppulov3.view')->with('success', 'Data telah dikembalikan');
        
        // session () ->flash('success','Data telah dikembalikan');
        // return $this->view();
    }
    public function rujukha($id){
        $rujuk = Seppulotransrujukan :: where('id',$id)->first();
        return view('seppulo-rujukan.form_hasil',['rujuk'=>$rujuk]);
    }
    public function rujukh(Request $request,$id){
        $rujuk  = Seppulotransrujukan::findOrFail($id);
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
        
        return redirect()->route('seppulov3.view')->with('success', 'Data hasil telah disimpan kedalam Database');
        
        // session () ->flash('success','Data hasil telah disimpan kedalam Database');
        // return $this->view();
    }
    public function kirimhasil(Request $req){
        // echo $req->rujukan_id;
        $dt = Carbon::now();
        $sts1 = Seppulotransrujukan :: where('id',$req->id)-> update(['user_id' => Auth::user()->id,'status' => 7,'tgl_kembali' => $dt->toDateString() ]);
        if($sts1){
            $data = Seppulotransrujukan :: where('rujukan_id','=',$req->rujukan_id)->whereIn('status',[8,3])->get('id');
            if(!$data->isEmpty()){
                // echo 'a';
                
                return redirect()->route('seppulov3.view')->with('success', 'Data akan segera diproses ke KABALAI');
                
                // session () ->flash('success','Data akan segera diproses ke KABALAI');
                // return $this->view();
            }else{
                // echo 'b';
                Seppulorujukan :: where('id',$req->rujukan_id)-> update(['status' => 7]);
                  
                  // pesan untuk ibu kabalai
                  $pesan = "*Yth. Bapak/Ibu*, Hasil Rujukan dengan No. Form: ".$req->rujukan_id." Telah *Selesai diolah* dan telah dikirim kembali ke akun anda untuk dikonfirmasi, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
                  $kabalai = '6281343000011';
                  sendMessage($pesan,$kabalai);
                
                  return redirect()->route('seppulov3.view')->with('success', 'Data akan segera diproses ke KABALAI');
                
                //   session () ->flash('success','Data akan segera diproses ke KABALAI');
                //   return $this->view();
            }
        }else{

        }
    }
    public function kembalihasil($id){
        return view('seppulo-rujukan.form_kembali_hasil',['rujuk'=>$id]);
    }
    public function kembalihasils(Request $request,$id){
       
        $update  = Seppulotransrujukan::findOrFail($id);
        $update->kembali      = $request->desc;
        $update->status       = 8;
        $update->updated_at   = date('Y-m-d H:i:s');
        $update->save();
        

        $data  = Seppulotransrujukan::where('id','=',$id)->first();

        $updtrujk  = Seppulorujukan::where ('id','=', $data->rujukan_id)->first();
        $updtrujk->status       = 8;
        $sts = $updtrujk->save();

        if($data->tindak == 3){
            // pesan ke Infokom
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan *Hasil Rujukan* telah *Dikembalikan oleh KABALAI* utuk ditinjau kembali, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
            $lalo = '6281243782726';
            sendMessage($pesan,$lalo);
        }else if($data->tindak == 4){
            // pesan ke penindakan
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan *Hasil Rujukan* telah *Dikembalikan oleh KABALAI* utuk ditinjau kembali, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
            $sri = '6281355733866';
            sendMessage($pesan,$sri);
        }else if($data->tindak == 5){
            // pesan ke Norma
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan *Hasil Rujukan* telah *Dikembalikan oleh KABALAI* utuk ditinjau kembali, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
            $norma = '6281342720161';
            sendMessage($pesan,$norma);
        }else if($data->tindak == 6){
            // pesan ke Ilham
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan *Hasil Rujukan* telah *Dikembalikan oleh KABALAI* utuk ditinjau kembali, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
            $ilham = '6285396907906';
            sendMessage($pesan,$ilham);
        }else if($data->tindak == 7){
            // pesan ke Pengujian
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan *Hasil Rujukan* telah *Dikembalikan oleh KABALAI* utuk ditinjau kembali, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
            $nurhamida = '6285241560800';
            sendMessage($pesan,$nurhamida);
        }else if($data->tindak == 8){
            // pesan ke Rahman
            $pesan = "*Yth. Bapak/Ibu*, Sebuah Laporan *Hasil Rujukan* telah *Dikembalikan oleh KABALAI* utuk ditinjau kembali, silakan masuk ke aplikasi Balla Pokja atau klik Link berikut ini https://bbpom-makassar.com/v3-rujukan-view";
            $rahman = '6281355497097';
            sendMessage($pesan,$rahman);
        }

        return redirect()->route('seppulov3.view')->with('success', 'Data telah dikembalikan');

        // session () ->flash('success','Data telah dikembalikan');
        // return $this->view();
    }
    public function selesai(Request $req){

        $update  = Seppulorujukan::findOrFail($req->id);
        $update->status      = 9;
        $update->save();

        $updttrans  = Seppulotransrujukan::where('rujukan_id','=', $req->id)->get();
        foreach($updttrans as $item){
            $item->status = 9;
            $item->save();
        }

         // pesan untuk pak lalo
         $pesan = "*Yth. Bapak/Ibu*, Laporan Rujukan dengan No. Form: ".$req->id." Telah *Selesai dan dikonfirmasi oleh KABALAI*";
         $lalo = '6281243782726';
        sendMessage($pesan,$lalo);

        return redirect()->route('seppulov3.view')->with('success', 'Data Selesai Diolah !');
        
        // return $this->view();
    }
    public function cetak($id,$idhasil){
        $data = Seppulorujukan::where('id',$id)->first();
        $rujuk = Seppulotransrujukan ::where('id',$idhasil)->first();
        $pdf = FacadePdf::loadView('seppulo-rujukan.cetak',['rujuk'=>$data,'trans'=>$rujuk]) ->setOptions([
            'enable_remote' => true,
            'chroot'  => public_path('storage/post-image'),
            'defaultFont' => 'serif',
        ]);;
        return $pdf->setPaper('f4', 'portrait')->stream();
        
        // return view('seppulo-rujukan.cetak',['rujuk'=>$data,'trans'=>$rujuk]);
    }
    public function info(){
        return view('seppulo-rujukan.info');
    }
    public function download($id){
        ob_end_clean();
        return Storage::download('/rujukan/'.$id);
    }
}
