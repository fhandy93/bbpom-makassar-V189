<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\SPPDOnline;
use App\Models\SPPDOnlineex;
use App\Models\SPPDOnlinepengikut;
use App\Models\SPPDOnlinepengikutex;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;

class SPDController extends Controller
{
    public function form(){
        $data = User :: get(['id','name']); 
        return view('spd.formulir',['data'=>$data]);

    }
    public function formex(){ 
        return view('spd.formulirex');

    }
    public function view(){
        $data = SPPDOnline :: where('user_id', '=', Auth::user()-> id)->orWhere('user_data', '=', Auth::user()-> id)->orderBy('id', 'DESC')->get();
        $data2 = SPPDOnlineex :: where('user_id', '=', Auth::user()-> id)->orderBy('id', 'DESC')->get();
        return view('spd.daftar',['data'=>$data,'data2'=>$data2]);
    }
    public function show($id)
    {
        $data = user :: where('id',$id)->first('username');
        $user = Profile :: where('username',$data->username)->first(['nip','pangkat','jabatan']);
        return response()->json([$user]);
    }
    public function store(Request $req){
        $req->validate([
            "st"      => "required|mimes:pdf"
          ],[
            "st"      => "Harap memilih file PDF"
        ]);
        // echo  Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d');
        $sppd                   = new SPPDOnline ();
        $sppd->user_id          = Auth::user()-> id;
        $sppd->user_data        = $req->user_data;
        $sppd->level_biaya      = $req->level_biaya;
        $sppd->maksud           = $req->maksud;
        $sppd->transport        = $req->transport;
        $sppd->asal             = $req->asal;
        $sppd->tujuan           = $req->tujuan;
        $sppd->tgl_berangkat    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d');
        $sppd->tgl_kembali      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d');
        $hari = rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d'));

        if(isset($req->asal2)){
            $sppd->asal2    = $req->asal2;
        }
        if(isset($req->tujuan2)){
            $sppd->tujuan2    = $req->tujuan2;
        }
        if(isset($req->tgl_berangkat2)){
            $sppd->tgl_berangkat2    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d');
        }
        if(isset($req->tgl_kembali2)){
            $sppd->tgl_kembali2      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d');
        }
        if(isset($req->tgl_berangkat2) && isset($req->tgl_kembali2) ){
            if($req->jns_dns2 == 1){
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d')) - 1;
            }else{
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d')) ;
            }
        }


        if(isset($req->asal3)){
            $sppd->asal3    =  $req->asal3;
        }
        if(isset($req->tujuan3)){
            $sppd->tujuan3    = $req->tujuan3;
        }
        if(isset($req->tgl_berangkat3)){
            $sppd->tgl_berangkat3    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d');
        }
        if(isset($req->tgl_kembali3)){
            $sppd->tgl_kembali3      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d');
        }
        if(isset($req->tgl_berangkat3) && isset($req->tgl_kembali3) ){
            if($req->jns_dns3 == 1){
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d')) - 1;
            }else{
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d')) ;
            }
        }

        if(isset($req->asal4)){
            $sppd->asal4    = $req->asal4;
        }
        if(isset($req->tujuan4)){
            $sppd->tujuan4    =  $req->tujuan4;
        }
        if(isset($req->tgl_berangkat4)){
            $sppd->tgl_berangkat4    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d');
        }
        if(isset($req->tgl_kembali4)){
            $sppd->tgl_kembali4      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d');
        }
        if(isset($req->tgl_berangkat4) && isset($req->tgl_kembali4) ){
            if($req->jns_dns4 == 1){
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d')) - 1;
            }else{
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d')) ;
            }
        }

        $sppd->hari             = $hari;
        $sppd->jns_dns2         = $req->jns_dns2;
        $sppd->jns_dns3         = $req->jns_dns3;
        $sppd->jns_dns4         = $req->jns_dns4;
        $sppd->akun             = $req->akun;
        $sppd->instansi         = $req->instansi;
        $sppd->keterangan       = $req->ket;
        $sppd->tgl_st           = Carbon::createFromFormat('d/m/Y', $req->tgl_st)->format('Y-m-d');
        $sppd->tgl              = Carbon::createFromFormat('d/m/Y', $req->tgl)->format('Y-m-d');
        $sppd->ppk              = $req->ppk;
        $sppd->mengetahui       = $req->mengetahui;
        if($req->mode == 'save'){
            $sppd->status              = 1;
        }else{
            $sppd->status              = 2;
            $pesan1 = '*Hy Bestiee* Ada SPPD Online masuk, Konfirmasi Yuukkkk 🤭 https://bbpom-makassar.com/sppd-view-admin';
            $no_telpon = '6285399000189';
            sendMessage($pesan1,$no_telpon);
        }
        if($req->st!= ''){        
            $path = public_path().'/storage/st/';

             //upload new file
             $file1 = $req->st;
             $filename1 = "/storage/st/".time().$file1->getClientOriginalName();
             $file1->move($path, $filename1);
             $sppd->file        = $filename1;
        }
        $sts = $sppd->save();
        $new_id = $sppd->id;
        if($req->user){
            foreach($req->user as $user){
                    $sppd                   = new SPPDOnline ();
                    $sppd->user_id          = Auth::user()-> id;
                    $sppd->user_data        = $user;
                    $sppd->level_biaya      = $req->level_biaya;
                    $sppd->maksud           = $req->maksud;
                    $sppd->transport        = $req->transport;
                    $sppd->asal             = $req->asal;
                    $sppd->tujuan           = $req->tujuan;
                    $sppd->tgl_berangkat    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d');
                    $sppd->tgl_kembali      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d');
                    $hari = rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d'));

                    if(isset($req->asal2)){
                        $sppd->asal2    = $req->asal2;
                    }
                    if(isset($req->tujuan2)){
                        $sppd->tujuan2    = $req->tujuan2;
                    }
                    if(isset($req->tgl_berangkat2)){
                        $sppd->tgl_berangkat2    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d');
                    }
                    if(isset($req->tgl_kembali2)){
                        $sppd->tgl_kembali2      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d');
                    }
                    if(isset($req->tgl_berangkat2) && isset($req->tgl_kembali2) ){
                        if($req->jns_dns2 == 1){
                            $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d')) - 1;
                        }else{
                            $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d')) ;
                        }
                    }
            
            
                    if(isset($req->asal3)){
                        $sppd->asal3    =  $req->asal3;
                    }
                    if(isset($req->tujuan3)){
                        $sppd->tujuan3    = $req->tujuan3;
                    }
                    if(isset($req->tgl_berangkat3)){
                        $sppd->tgl_berangkat3    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d');
                    }
                    if(isset($req->tgl_kembali3)){
                        $sppd->tgl_kembali3      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d');
                    }
                    if(isset($req->tgl_berangkat3) && isset($req->tgl_kembali3) ){
                        if($req->jns_dns3 == 1){
                            $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d')) - 1;
                        }else{
                            $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d')) ;
                        }
                    }
            
                    if(isset($req->asal4)){
                        $sppd->asal4    = $req->asal4;
                    }
                    if(isset($req->tujuan4)){
                        $sppd->tujuan4    =  $req->tujuan4;
                    }
                    if(isset($req->tgl_berangkat4)){
                        $sppd->tgl_berangkat4    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d');
                    }
                    if(isset($req->tgl_kembali4)){
                        $sppd->tgl_kembali4      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d');
                    }
                    if(isset($req->tgl_berangkat4) && isset($req->tgl_kembali4) ){
                        if($req->jns_dns4 == 1){
                            $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d')) - 1;
                        }else{
                            $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d')) ;
                        }
                    }
            
                    $sppd->hari             = $hari;
                    $sppd->jns_dns2         = $req->jns_dns2;
                    $sppd->jns_dns3         = $req->jns_dns3;
                    $sppd->jns_dns4         = $req->jns_dns4;
                    $sppd->akun             = $req->akun;
                    $sppd->instansi         = $req->instansi;
                    $sppd->keterangan       = $req->ket;
                    $sppd->tgl_st           = Carbon::createFromFormat('d/m/Y', $req->tgl_st)->format('Y-m-d');
                    $sppd->tgl              = Carbon::createFromFormat('d/m/Y', $req->tgl)->format('Y-m-d');
                    $sppd->ppk              = $req->ppk;
                    $sppd->mengetahui       = $req->mengetahui;
                    if($req->mode == 'save'){
                        $sppd->status              = 1;
                    }else{
                        $sppd->status              = 2;
                      
                    }
                    if($req->st!= ''){        
                        $file1 = $req->st;
                        $filename1 = "/storage/st/".time().$file1->getClientOriginalName();
                        
                        $sppd->file        = $filename1;
                    }
                    $sts = $sppd->save();
            }
        }
        if($sts){
            if($req->nama_pengikut1 != null){
                $ikut                       = new SPPDOnlinepengikut ();
                $ikut->sppd_id              = $new_id;
                $ikut->nama1                 = $req->nama_pengikut1;
                $ikut->tgl1                 = $req->tgl_lahir_pengikut1;  
                $ikut->ket1                 = $req->ket_pengikut1;
                $ikut->nama2                = $req->nama_pengikut2;
                $ikut->tgl2                 = $req->tgl_lahir_pengikut2;
                $ikut->ket2                 = $req->ket_pengikut2;
                $ikut->nama3                = $req->nama_pengikut3;
                $ikut->tgl3                 = $req->tgl_lahir_pengikut3;
                $ikut->ket3                 = $req->ket_pengikut3;
                $ikut->nama4                = $req->nama_pengikut4;
                $ikut->tgl4                 = $req->tgl_lahir_pengikut4;
                $ikut->ket4                 = $req->ket_pengikut4;
                $ikut->nama5                = $req->nama_pengikut5;
                $ikut->tgl5                 = $req->tgl_lahir_pengikut5; 
                $ikut->ket5                 = $req->ket_pengikut5;
                $ikut->save();
            }
        }
        if($sts){
            if($req->mode == 'save'){
                // session () ->flash('success','Data berhasil disimpan');
                // return $this->view();
                
                return redirect()->route('sppd.view')->with('success', 'Data berhasil disimpan');
                
            }else{
                // session () ->flash('success','Data berhasil dikirim');
                // return $this->view();
                
                return redirect()->route('sppd.view')->with('success', 'Data berhasil dikirim');
            }
        }
    }
    public function storeex(Request $req){
        $req->validate([
            "st"      => "required|mimes:pdf"
          ],[
            "st"      => "Harap memilih file PDF"
      ]);
        // echo  Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d');
        $sppd                   = new SPPDOnlineex ();
        $sppd->user_id          = Auth::user()-> id;
        $sppd->user_data        = $req->user_data;
        $sppd->nip              = $req->nip;
        $sppd->pangkat          = $req->pangkat;
        $sppd->jabatan          = $req->jabatan;
        $sppd->level_biaya      = $req->level_biaya;
        $sppd->maksud           = $req->maksud;
        $sppd->transport        = $req->transport;
        $sppd->asal             = $req->asal;
        $sppd->tujuan           = $req->tujuan;
        $sppd->tgl_berangkat    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d');
        $sppd->tgl_kembali      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d');
         $hari = rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d'));

        if(isset($req->asal2)){
            $sppd->asal2    = $req->asal2;
        }
        if(isset($req->tujuan2)){
            $sppd->tujuan2    = $req->tujuan2;
        }
        if(isset($req->tgl_berangkat2)){
            $sppd->tgl_berangkat2    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d');
        }
        if(isset($req->tgl_kembali2)){
            $sppd->tgl_kembali2      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d');
        }
        if(isset($req->tgl_berangkat2) && isset($req->tgl_kembali2) ){
            if($req->jns_dns2 == 1){
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d')) - 1;
            }else{
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d')) ;
            }
        }


        if(isset($req->asal3)){
            $sppd->asal3    =  $req->asal3;
        }
        if(isset($req->tujuan3)){
            $sppd->tujuan3    = $req->tujuan3;
        }
        if(isset($req->tgl_berangkat3)){
            $sppd->tgl_berangkat3    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d');
        }
        if(isset($req->tgl_kembali3)){
            $sppd->tgl_kembali3      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d');
        }
        if(isset($req->tgl_berangkat3) && isset($req->tgl_kembali3) ){
            if($req->jns_dns3 == 1){
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d')) - 1;
            }else{
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d')) ;
            }
        }

        if(isset($req->asal4)){
            $sppd->asal4    = $req->asal4;
        }
        if(isset($req->tujuan4)){
            $sppd->tujuan4    =  $req->tujuan4;
        }
        if(isset($req->tgl_berangkat4)){
            $sppd->tgl_berangkat4    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d');
        }
        if(isset($req->tgl_kembali4)){
            $sppd->tgl_kembali4      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d');
        }
        if(isset($req->tgl_berangkat4) && isset($req->tgl_kembali4) ){
            if($req->jns_dns4 == 1){
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d')) - 1;
            }else{
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d')) ;
            }
        }

        $sppd->hari             = $hari;
        $sppd->jns_dns2         = $req->jns_dns2;
        $sppd->jns_dns3         = $req->jns_dns3;
        $sppd->jns_dns4         = $req->jns_dns4;
        $sppd->akun             = $req->akun;
        $sppd->instansi         = $req->instansi;
        $sppd->keterangan       = $req->ket;
        $sppd->tgl_st           = Carbon::createFromFormat('d/m/Y', $req->tgl_st)->format('Y-m-d');
         $sppd->tgl             = Carbon::createFromFormat('d/m/Y', $req->tgl)->format('Y-m-d');
        $sppd->ppk              = $req->ppk;
        $sppd->mengetahui       = $req->mengetahui;
        if($req->mode == 'save'){
            $sppd->status              = 1;
        }else{
            $sppd->status              = 2;
            $pesan1 = '*Hy Bestiee* Ada SPPD Online masuk, Konfirmasi Yuukkkk 🤭 https://bbpom-makassar.com/sppd-view-admin';
            $no_telpon = '6285399000189';
            sendMessage($pesan1,$no_telpon);
        }
        if($req->st!= ''){        
            $path = public_path().'/storage/st/';

             //upload new file
             $file1 = $req->st;
             $filename1 = "/storage/st/".time().$file1->getClientOriginalName();
             $file1->move($path, $filename1);
             $sppd->file        = $filename1;
        }
        $sts = $sppd->save();
        $new_id = $sppd->id;
        if($sts){
            if($req->nama_pengikut1 != null){
                $ikut                       = new SPPDOnlinepengikutex ();
                $ikut->sppd_id              = $new_id;
                $ikut->nama1                 = $req->nama_pengikut1;
                $ikut->tgl1                 = $req->tgl_lahir_pengikut1;  
                $ikut->ket1                 = $req->ket_pengikut1;
                $ikut->nama2                = $req->nama_pengikut2;
                $ikut->tgl2                 = $req->tgl_lahir_pengikut2;
                $ikut->ket2                 = $req->ket_pengikut2;
                $ikut->nama3                = $req->nama_pengikut3;
                $ikut->tgl3                 = $req->tgl_lahir_pengikut3;
                $ikut->ket3                 = $req->ket_pengikut3;
                $ikut->nama4                = $req->nama_pengikut4;
                $ikut->tgl4                 = $req->tgl_lahir_pengikut4;
                $ikut->ket4                 = $req->ket_pengikut4;
                $ikut->nama5                = $req->nama_pengikut5;
                $ikut->tgl5                 = $req->tgl_lahir_pengikut5; 
                $ikut->ket5                 = $req->ket_pengikut5;
                $ikut->save();
            }
        }
        if($sts){
            if($req->mode == 'save'){
                // session () ->flash('success','Data berhasil disimpan');
                // return $this->view();
                return redirect()->route('sppd.view')->with('success', 'Data berhasil disimpan');
            }else{
                // session () ->flash('success','Data berhasil dikirim');
                // return $this->view();
                return redirect()->route('sppd.view')->with('success', 'Data berhasil dikirim');
            }
        }
    }
    public function cetak($id){
        $data = SPPDOnline :: where('id',$id)->first();
        $user = User :: where('id','=',$data->user_data)->first('username');
        $prof = Profile :: where('username','=',$user->username)->first(['nip','pangkat','jabatan']);
        $ikut = SPPDOnlinepengikut :: where('sppd_id','=',$id)->first();
        $pdf = FacadePdf::loadView('spd.cetak',['data'=>$data,'ikut'=>$ikut,'prof'=>$prof]) ->setOptions([
            'enable_remote' => true,
            'chroot'  => public_path('storage/post-image'),
            'fontDir' => public_path('/vendo/font'),
            'fontCache' => public_path('/vendot/font'),
            'defaultFont' => 'serif',
        ]);;
        return $pdf->setPaper('f4', 'portrait')->stream();
        
        // return view('spd.cetak',['data'=>$data,'ikut'=>$ikut,'prof'=>$prof]);

    }
    public function cetakex($id){
        $data = SPPDOnlineex :: where('id',$id)->first();
        $ikut = SPPDOnlinepengikutex :: where('sppd_id','=',$id)->first();
        $pdf = FacadePdf::loadView('spd.cetakex',['data'=>$data,'ikut'=>$ikut]) ->setOptions([
            'enable_remote' => true,
            'chroot'  => public_path('storage/post-image'),
            'fontDir' => public_path('/vendo/font'),
            'fontCache' => public_path('/vendot/font'),
            'defaultFont' => 'serif',
        ]);;
        return $pdf->setPaper('f4', 'portrait')->stream();
        
        // return view('spd.cetakex',['data'=>$data,'ikut'=>$ikut]);

    }
    public function detail($id){
        $data = SPPDOnline :: where('id', '=', $id)->first();
        $user = User :: where('id','=',$data->user_data)->first('username');
        $prof = Profile :: where('username','=',$user->username)->first(['nip','pangkat','jabatan']);
        $ikut = SPPDOnlinepengikut :: where('sppd_id','=',$id)->first();
        return view('spd.detail',['data'=>$data,'prof'=>$prof,'ikut'=>$ikut]);
    }
    public function detailex($id){
        $data = SPPDOnlineex :: where('id', '=', $id)->first();
        
        $ikut = SPPDOnlinepengikutex :: where('sppd_id','=',$id)->first();
        return view('spd.detail_ex',['data'=>$data,'ikut'=>$ikut]);
    }
    public function kirim($id){
        $update  = SPPDOnline::findOrFail($id);
        $update->status      = 2;
        $update->save();

        $pesan1 = '*Hy Bestiee* Ada SPPD Online masuk, Konfirmasi Yuukkkk 🤭 https://bbpom-makassar.com/sppd-view-admin';
        $no_telpon = '6285399000189';
        sendMessage($pesan1,$no_telpon);

        // session () ->flash('success','Data berhasil dikirim');
        // return $this->view();
        return redirect()->route('sppd.view')->with('success', 'Data berhasil dikirim');
    }
    public function kirimex($id){
        $update  = SPPDOnlineex::findOrFail($id);
        $update->status      = 2;
        $update->save();

        $pesan1 = '*Hy Bestiee* Ada SPPD Online masuk, Konfirmasi Yuukkkk 🤭 https://bbpom-makassar.com/sppd-view-admin';
        $no_telpon = '6285399000189';
        sendMessage($pesan1,$no_telpon);

        // session () ->flash('success','Data berhasil dikirim');
        // return $this->view();
        return redirect()->route('sppd.view')->with('success', 'Data berhasil dikirim');
    }
    public function edit($id){
        $data = SPPDOnline :: where('id','=',$id)->first();
        $user = User :: where('id','=',$data->user_data)->first(['username','name']);
        $prof = Profile :: where('username','=',$user->username)->first(['nip','pangkat','jabatan']);
        $ikut = SPPDOnlinepengikut :: where('sppd_id','=',$id)->first();
        return view('spd.edit',['data'=>$data,'prof'=>$prof,'ikut'=>$ikut,'user'=>$user]);
    }
    public function editex($id){
        $data = SPPDOnlineex :: where('id','=',$id)->first();
        $ikut = SPPDOnlinepengikutex :: where('sppd_id','=',$id)->first();
        return view('spd.edit_ex',['data'=>$data,'ikut'=>$ikut]);
    }
    public function update(Request $req, $id){
        $sppd = SPPDOnline::findOrFail($id);
        $sppd->level_biaya      = $req->level_biaya;
        $sppd->maksud           = $req->maksud;
        $sppd->transport        = $req->transport;
        $sppd->asal             = $req->asal;
        $sppd->tujuan           = $req->tujuan;
        $sppd->tgl_berangkat    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d');
        $sppd->tgl_kembali      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d');

        $hari = rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d'));

        if(isset($req->asal2)){
            $sppd->asal2    = $req->asal2;
        }
        if(isset($req->tujuan2)){
            $sppd->tujuan2    = $req->tujuan2;
        }
        if(isset($req->tgl_berangkat2)){
            $sppd->tgl_berangkat2    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d');
        }
        if(isset($req->tgl_kembali2)){
            $sppd->tgl_kembali2      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d');
        }
        if(isset($req->tgl_berangkat2) && isset($req->tgl_kembali2) ){
            if($req->jns_dns2 == 1){
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d')) - 1;
            }else{
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d')) ;
            }
        }


        if(isset($req->asal3)){
            $sppd->asal3    =  $req->asal3;
        }
        if(isset($req->tujuan3)){
            $sppd->tujuan3    = $req->tujuan3;
        }
        if(isset($req->tgl_berangkat3)){
            $sppd->tgl_berangkat3    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d');
        }
        if(isset($req->tgl_kembali3)){
            $sppd->tgl_kembali3      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d');
        }
        if(isset($req->tgl_berangkat3) && isset($req->tgl_kembali3) ){
            if($req->jns_dns3 == 1){
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d')) - 1;
            }else{
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d')) ;
            }
        }

        if(isset($req->asal4)){
            $sppd->asal4    = $req->asal4;
        }
        if(isset($req->tujuan4)){
            $sppd->tujuan4    =  $req->tujuan4;
        }
        if(isset($req->tgl_berangkat4)){
            $sppd->tgl_berangkat4    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d');
        }
        if(isset($req->tgl_kembali4)){
            $sppd->tgl_kembali4      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d');
        }
        if(isset($req->tgl_berangkat4) && isset($req->tgl_kembali4) ){
            if($req->jns_dns4 == 1){
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d')) - 1;
            }else{
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d')) ;
            }
        }

        $sppd->hari             = $hari;
        $sppd->jns_dns2         = $req->jns_dns2;
        $sppd->jns_dns3         = $req->jns_dns3;
        $sppd->jns_dns4         = $req->jns_dns4;
        $sppd->akun             = $req->akun;
        $sppd->instansi         = $req->instansi;
        $sppd->keterangan       = $req->ket;
        $sppd->tgl_st           = Carbon::createFromFormat('d/m/Y', $req->tgl_st)->format('Y-m-d');
        $sppd->tgl              = Carbon::createFromFormat('d/m/Y', $req->tgl)->format('Y-m-d');
        $sppd->ppk              = $req->ppk;
        $sppd->mengetahui       = $req->mengetahui;
        if($req->mode == 'save'){
            $sppd->status              = 1;
        }elseif($req->mode == 'admin'){
            
        }else{
            $sppd->status              = 2;
            $pesan1 = '*Hy Bestiee* Ada SPPD Online masuk, Konfirmasi Yuukkkk 🤭 https://bbpom-makassar.com/sppd-view-admin';
            $no_telpon = '6285399000189';
            sendMessage($pesan1,$no_telpon);
        }
        if($req->st!= ''){        
            $path = public_path().'/storage/st/';

            $req->validate([
                "st"      => "required|mimes:pdf"
              ],[
                "st"      => "Harap memilih file PDF"
            ]);
            //code for remove old file
            if($sppd->file != ''  && $sppd->file != null ){
                $file_old = $sppd->file;
                unlink(public_path().$file_old);
                }

             //upload new file
             $file1 = $req->st;
             $filename1 = "/storage/st/".time().$file1->getClientOriginalName();
             $file1->move($path, $filename1);
             $sppd->file        = $filename1;
        }
        $sts = $sppd->save();
        if($sts){
            if($req->nama_pengikut1 != null){
                $ikut                       = SPPDOnlinepengikut::where('sppd_id','=',$id)->first();
                if($ikut){
                    $ikut->nama1                = $req->nama_pengikut1;
                    $ikut->tgl1                 = $req->tgl_lahir_pengikut1;  
                    $ikut->ket1                 = $req->ket_pengikut1;
                    $ikut->nama2                = $req->nama_pengikut2;
                    $ikut->tgl2                 = $req->tgl_lahir_pengikut2;
                    $ikut->ket2                 = $req->ket_pengikut2;
                    $ikut->nama3                = $req->nama_pengikut3;
                    $ikut->tgl3                 = $req->tgl_lahir_pengikut3;
                    $ikut->ket3                 = $req->ket_pengikut3;
                    $ikut->nama4                = $req->nama_pengikut4;
                    $ikut->tgl4                 = $req->tgl_lahir_pengikut4;
                    $ikut->ket4                 = $req->ket_pengikut4;
                    $ikut->nama5                = $req->nama_pengikut5;
                    $ikut->tgl5                 = $req->tgl_lahir_pengikut5; 
                    $ikut->ket5                 = $req->ket_pengikut5;
                    $ikut->save();
                }else{
                    $ikut                       = new SPPDOnlinepengikut ();
                    $ikut->sppd_id              = $id;
                    $ikut->nama1                = $req->nama_pengikut1;
                    $ikut->tgl1                 = $req->tgl_lahir_pengikut1;  
                    $ikut->ket1                 = $req->ket_pengikut1;
                    $ikut->nama2                = $req->nama_pengikut2;
                    $ikut->tgl2                 = $req->tgl_lahir_pengikut2;
                    $ikut->ket2                 = $req->ket_pengikut2;
                    $ikut->nama3                = $req->nama_pengikut3;
                    $ikut->tgl3                 = $req->tgl_lahir_pengikut3;
                    $ikut->ket3                 = $req->ket_pengikut3;
                    $ikut->nama4                = $req->nama_pengikut4;
                    $ikut->tgl4                 = $req->tgl_lahir_pengikut4;
                    $ikut->ket4                 = $req->ket_pengikut4;
                    $ikut->nama5                = $req->nama_pengikut5;
                    $ikut->tgl5                 = $req->tgl_lahir_pengikut5; 
                    $ikut->ket5                 = $req->ket_pengikut5;
                    $ikut->save();
                }
               
            }
        }
        if($sts){
            if($req->mode == 'save'){
                // session () ->flash('success','Data berhasil diupdate');
                // return $this->view();
                return redirect()->route('sppd.view')->with('success', 'Data berhasil diupdate');
            }elseif($req->mode == 'admin'){
                // session () ->flash('success','Data berhasil diupdate');
                // return $this->viewadmin();
                return redirect()->route('sppd.viewadmin')->with('success', 'Data berhasil diupdate');
            }else{
                // session () ->flash('success','Data berhasil dikirim');
                // return $this->view();
                return redirect()->route('sppd.view')->with('success', 'Data berhasil dikirim');
            }
        }
    }
    public function updateex(Request $req, $id){
        $sppd = SPPDOnlineex::findOrFail($id);
        $sppd->nip              = $req->nip;
        $sppd->pangkat          = $req->pangkat;
        $sppd->jabatan          = $req->jabatan;
        $sppd->level_biaya      = $req->level_biaya;
        $sppd->maksud           = $req->maksud;
        $sppd->transport        = $req->transport;
        $sppd->asal             = $req->asal;
        $sppd->tujuan           = $req->tujuan;
        $sppd->tgl_berangkat    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d');
        $sppd->tgl_kembali      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d');
          $hari = rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d'));

        if(isset($req->asal2)){
            $sppd->asal2    = $req->asal2;
        }
        if(isset($req->tujuan2)){
            $sppd->tujuan2    = $req->tujuan2;
        }
        if(isset($req->tgl_berangkat2)){
            $sppd->tgl_berangkat2    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d');
        }
        if(isset($req->tgl_kembali2)){
            $sppd->tgl_kembali2      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d');
        }
        if(isset($req->tgl_berangkat2) && isset($req->tgl_kembali2) ){
            if($req->jns_dns2 == 1){
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d')) - 1;
            }else{
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat2)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali2)->format('Y-m-d')) ;
            }
        }


        if(isset($req->asal3)){
            $sppd->asal3    =  $req->asal3;
        }
        if(isset($req->tujuan3)){
            $sppd->tujuan3    = $req->tujuan3;
        }
        if(isset($req->tgl_berangkat3)){
            $sppd->tgl_berangkat3    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d');
        }
        if(isset($req->tgl_kembali3)){
            $sppd->tgl_kembali3      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d');
        }
        if(isset($req->tgl_berangkat3) && isset($req->tgl_kembali3) ){
            if($req->jns_dns3 == 1){
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d')) - 1;
            }else{
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat3)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali3)->format('Y-m-d')) ;
            }
        }

        if(isset($req->asal4)){
            $sppd->asal4    = $req->asal4;
        }
        if(isset($req->tujuan4)){
            $sppd->tujuan4    =  $req->tujuan4;
        }
        if(isset($req->tgl_berangkat4)){
            $sppd->tgl_berangkat4    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d');
        }
        if(isset($req->tgl_kembali4)){
            $sppd->tgl_kembali4      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d');
        }
        if(isset($req->tgl_berangkat4) && isset($req->tgl_kembali4) ){
            if($req->jns_dns4 == 1){
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d')) - 1;
            }else{
                $hari = $hari + rangeDay(Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat4)->format('Y-m-d'), Carbon::createFromFormat('d/m/Y', $req->tgl_kembali4)->format('Y-m-d')) ;
            }
        }

        $sppd->hari             = $hari;
        $sppd->jns_dns2         = $req->jns_dns2;
        $sppd->jns_dns3         = $req->jns_dns3;
        $sppd->jns_dns4         = $req->jns_dns4;
        $sppd->akun             = $req->akun;
        $sppd->instansi         = $req->instansi;
        $sppd->keterangan       = $req->ket;
        $sppd->tgl_st           = Carbon::createFromFormat('d/m/Y', $req->tgl_st)->format('Y-m-d');
        $sppd->tgl              = Carbon::createFromFormat('d/m/Y', $req->tgl)->format('Y-m-d');
        $sppd->ppk              = $req->ppk;
        $sppd->mengetahui       = $req->mengetahui;
        if($req->mode == 'save'){
            $sppd->status              = 1;
        }elseif($req->mode == 'admin'){
            
        }else{
            $sppd->status              = 2;
            $pesan1 = '*Hy Bestiee* Ada SPPD Online masuk, Konfirmasi Yuukkkk 🤭 https://bbpom-makassar.com/sppd-view-admin';
            $no_telpon = '6285399000189';
            sendMessage($pesan1,$no_telpon);
        }
        if($req->st!= ''){        
            $path = public_path().'/storage/st/';

            $req->validate([
                "st"      => "required|mimes:pdf"
              ],[
                "st"      => "Harap memilih file PDF"
            ]);
            //code for remove old file
            if($sppd->file != ''  && $sppd->file != null ){
                $file_old = $sppd->file;
                unlink(public_path().$file_old);
                }

             //upload new file
             $file1 = $req->st;
             $filename1 = "/storage/st/".time().$file1->getClientOriginalName();
             $file1->move($path, $filename1);
             $sppd->file        = $filename1;
        }
        $sts = $sppd->save();
        if($sts){
            if($req->nama_pengikut1 != null){
                $ikut                       = SPPDOnlinepengikutex::where('sppd_id','=',$id)->first();
                if($ikut){
                    $ikut->nama1                = $req->nama_pengikut1;
                    $ikut->tgl1                 = $req->tgl_lahir_pengikut1;  
                    $ikut->ket1                 = $req->ket_pengikut1;
                    $ikut->nama2                = $req->nama_pengikut2;
                    $ikut->tgl2                 = $req->tgl_lahir_pengikut2;
                    $ikut->ket2                 = $req->ket_pengikut2;
                    $ikut->nama3                = $req->nama_pengikut3;
                    $ikut->tgl3                 = $req->tgl_lahir_pengikut3;
                    $ikut->ket3                 = $req->ket_pengikut3;
                    $ikut->nama4                = $req->nama_pengikut4;
                    $ikut->tgl4                 = $req->tgl_lahir_pengikut4;
                    $ikut->ket4                 = $req->ket_pengikut4;
                    $ikut->nama5                = $req->nama_pengikut5;
                    $ikut->tgl5                 = $req->tgl_lahir_pengikut5; 
                    $ikut->ket5                 = $req->ket_pengikut5;
                    $ikut->save();
                }else{
                    $ikut                       = new SPPDOnlinepengikutex ();
                    $ikut->sppd_id              = $id;
                    $ikut->nama1                = $req->nama_pengikut1;
                    $ikut->tgl1                 = $req->tgl_lahir_pengikut1;  
                    $ikut->ket1                 = $req->ket_pengikut1;
                    $ikut->nama2                = $req->nama_pengikut2;
                    $ikut->tgl2                 = $req->tgl_lahir_pengikut2;
                    $ikut->ket2                 = $req->ket_pengikut2;
                    $ikut->nama3                = $req->nama_pengikut3;
                    $ikut->tgl3                 = $req->tgl_lahir_pengikut3;
                    $ikut->ket3                 = $req->ket_pengikut3;
                    $ikut->nama4                = $req->nama_pengikut4;
                    $ikut->tgl4                 = $req->tgl_lahir_pengikut4;
                    $ikut->ket4                 = $req->ket_pengikut4;
                    $ikut->nama5                = $req->nama_pengikut5;
                    $ikut->tgl5                 = $req->tgl_lahir_pengikut5; 
                    $ikut->ket5                 = $req->ket_pengikut5;
                    $ikut->save();
                }
               
            }
        }
        if($sts){
            if($req->mode == 'save'){
                // session () ->flash('success','Data berhasil diupdate');
                // return $this->view();
                return redirect()->route('sppd.view')->with('success', 'Data berhasil diupdate');
            }elseif($req->mode == 'admin'){
                // session () ->flash('success','Data berhasil diupdate');
                // return $this->viewadmin();
                return redirect()->route('sppd.viewadmin')->with('success', 'Data berhasil diupdate');
            }else{
                // session () ->flash('success','Data berhasil dikirim');
                // return $this->view();
                return redirect()->route('sppd.view')->with('success', 'Data berhasil dikirim');
            }
        }
    }
    public function viewadmin(){
        $data = SPPDOnline :: where(function ($query) {
        $query->where('status', '=', 2)
              ->orWhere('status', '=', 3);
        })
        ->whereMonth('created_at', '=', date('m'))
        ->whereYear('created_at', '=', date('Y'))
        ->orderBy('id', 'DESC')->get();
        $data2 = SPPDOnlineex :: where(function ($query) {
        $query->where('status', '=', 2)
              ->orWhere('status', '=', 3);
        })
        ->whereMonth('created_at', '=', date('m'))
        ->whereYear('created_at', '=', date('Y'))
        ->orderBy('id', 'DESC')->get();
        return view('spd.daftar_admin',['data'=>$data,'data2'=>$data2]);
    }
    public function approv($id){
        $update  = SPPDOnline::findOrFail($id);
        $update->status      = 3;
        $update->save();

        $getuser = SPPDOnline :: where('id',$id)->first(['user_id','user_data']);
        $user = user :: where('id',$getuser->user_id)->first('username');
        $profile = Profile :: where('username',$user->username)->first('telpon');

        $user_data = user :: where('id',$getuser->user_data)->first('name');

        $pesan1 = '*Yth. Bapak/Ibu* Online SPPD anda atas nama *'.$user_data->name.'* telah dikonfirmasi oleh Admin SPPD Online';
        sendMessage($pesan1,$profile->telpon);

        session () ->flash('success','Data Terkonfirmasi');
        return $this->viewadmin();
    }
    public function approvex($id){
        $update  = SPPDOnlineex::findOrFail($id);
        $update->status      = 3;
        $update->save();

        $getuser = SPPDOnlineex :: where('id',$id)->first(['user_id','user_data']);
        $user = user :: where('id',$getuser->user_id)->first('username');
        $profile = Profile :: where('username',$user->username)->first('telpon');

        if($profile != []){
            $pesan1 = '*Yth. Bapak/Ibu* Online SPPD anda atas nama *'.$getuser->user_data.'* telah dikonfirmasi oleh Admin SPPD Online';
            sendMessage($pesan1,$profile->telpon);    
        }
        
        session () ->flash('success','Data Terkonfirmasi');
        return $this->viewadmin();
    }
    public function destroy($id){
        $delete = SPPDOnline::where('id',$id)->first();
        $sts = $delete -> delete();
        if($sts){
            $deletee = SPPDOnlinepengikut :: where('sppd_id','=',$id)->first();
            if($deletee){
                $deletee -> delete();
            }
        }
        session () ->flash('success','Data berhasil dihapus');
        return back();
    }
    public function destroyex($id){
        $delete = SPPDOnlineex::where('id',$id)->first();
        $sts = $delete -> delete();
        if($sts){
            $deletee = SPPDOnlinepengikutex :: where('sppd_id','=',$id)->first();
            if($deletee){
                $deletee -> delete();
            }
        }
        session () ->flash('success','Data berhasil dihapus');
        return back();
    }
    public function destroyadmin($id){
        $delete = SPPDOnline::where('id',$id)->first();
        $sts = $delete -> delete();
        if($sts){
            $deletee = SPPDOnlinepengikut :: where('sppd_id','=',$id)->first();
            if($deletee){
                $deletee -> delete();
            }
        }
        session () ->flash('success','Data berhasil dihapus');
        return back();
    }
    public function destroyadminex($id){
        $delete = SPPDOnlineex::where('id',$id)->first();
        $sts = $delete -> delete();
        if($sts){
            $deletee = SPPDOnlinepengikutex :: where('sppd_id','=',$id)->first();
            if($deletee){
                $deletee -> delete();
            }
        }
        session () ->flash('success','Data berhasil dihapus');
        return back();
    }
    public function add($id){
        return view('spd.nomor_sppd',['id'=>$id]);
    }
    public function nomoredit($id){
        $data = SPPDOnline:: where('id',$id)->first('no_sppd');
        return view('spd.nomor_sppd_edit',['data'=>$data,'id'=>$id]);
    }
    public function nomoreditex($id){
        $data = SPPDOnlineex:: where('id',$id)->first('no_sppd');
        return view('spd.nomor_sppd_edit_ex',['data'=>$data,'id'=>$id]);
    }
    public function addex($id){
        return view('spd.nomor_sppd_ex',['id'=>$id]);
    }
    public function updatenumber(Request $req,$id){
        $update  = SPPDOnline::findOrFail($id);
        $update->no_sppd      = $req->no_sppd;
        $update->save();
        session () ->flash('success','Data berhasil diinput');
        return $this->viewadmin();
    }
    public function updatenumberex(Request $req,$id){
        $update  = SPPDOnlineex::findOrFail($id);
        $update->no_sppd      = $req->no_sppd;
        $update->save();
        session () ->flash('success','Data berhasil diinput');
        return $this->viewadmin();
    }
    public function dwn($id){
        ob_end_clean();
        return Storage::download('/st/'.$id);
    }
    public function filter(Request $req){

        if($req->tahun == 'Pilih Tahun' && $req->bulan=='Pilih Bulan'){
            $data = SPPDOnline :: whereYear('created_at', '=', date('Y'))
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('spd.daftar_admin',['data'=>$data]);
        }else if($req->tahun == 'Pilih Tahun'){
            $data = SPPDOnline :: whereMonth('created_at', '=', $req->bulan)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('spd.daftar_admin',['data'=>$data]);
        }else if($req->bulan=='Pilih Bulan'){               
            $data = SPPDOnline :: whereYear('created_at', '=', $req->tahun)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('spd.daftar_admin',['data'=>$data]);
        }else{
            $data = SPPDOnline :: whereYear('created_at', '=', $req->tahun)
            ->whereMonth('created_at', '=', $req->bulan)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('spd.daftar_admin',['data'=>$data]);
        }
    }
    public function filteradmin(Request $req){

        if($req->tahun == 'Pilih Tahun' && $req->bulan=='Pilih Bulan'){
            $data = SPPDOnline :: whereYear('created_at', '=', date('Y'))
            ->orderBy('created_at', 'DESC')
            ->get();
            $data2 = SPPDOnlineex :: whereYear('created_at', '=', date('Y'))
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('spd.daftar_admin',['data'=>$data,'data2'=>$data2]);
        }else if($req->tahun == 'Pilih Tahun'){
            $data = SPPDOnline :: whereMonth('created_at', '=', $req->bulan)
            ->orderBy('created_at', 'DESC')
            ->get();
            $data2 = SPPDOnlineex :: whereMonth('created_at', '=', $req->bulan)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('spd.daftar_admin',['data'=>$data,'data2'=>$data2]);
        }else if($req->bulan=='Pilih Bulan'){               
            $data = SPPDOnline :: whereYear('created_at', '=', $req->tahun)
            ->orderBy('created_at', 'DESC')
            ->get();
            $data2 = SPPDOnlineex :: whereYear('created_at', '=', $req->tahun)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('spd.daftar_admin',['data'=>$data,'data2'=>$data2]);
        }else{
            $data = SPPDOnline :: whereYear('created_at', '=', $req->tahun)
            ->whereMonth('created_at', '=', $req->bulan)
            ->orderBy('created_at', 'DESC')
            ->get();
            $data2 = SPPDOnlineex :: whereYear('created_at', '=', $req->tahun)
            ->whereMonth('created_at', '=', $req->bulan)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('spd.daftar_admin',['data'=>$data,'data2'=>$data2]);
        }
    }
    public function filterp(Request $req){

        if($req->tahun == 'Pilih Tahun' && $req->bulan=='Pilih Bulan'){
            $data = SPPDOnline :: whereYear('created_at', '=', date('Y'))
            ->where('user_id', '=', Auth::user()-> id)
            ->orWhere('user_data', '=', Auth::user()-> id)
            ->orderBy('created_at', 'DESC')
            ->get();
            $data2 = SPPDOnlineex :: whereYear('created_at', '=', date('Y'))
            ->where('user_id', '=', Auth::user()-> id)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('spd.daftar',['data'=>$data,'data2'=>$data2]);
        }else if($req->tahun == 'Pilih Tahun'){
            $data = SPPDOnline :: whereMonth('created_at', '=', $req->bulan)
            ->where('user_id', '=', Auth::user()-> id)
            ->orWhere('user_data', '=', Auth::user()-> id)
            ->orderBy('created_at', 'DESC')
            ->get();
            $data2 = SPPDOnlineex :: whereMonth('created_at', '=', $req->bulan)
            ->where('user_id', '=', Auth::user()-> id)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('spd.daftar',['data'=>$data,'data2'=>$data2]);
        }else if($req->bulan=='Pilih Bulan'){               
            $data = SPPDOnline :: whereYear('created_at', '=', $req->tahun)
            ->where('user_id', '=', Auth::user()-> id)
            ->orWhere('user_data', '=', Auth::user()-> id)
            ->orderBy('created_at', 'DESC')
            ->get();
            $data2 = SPPDOnlineex :: whereYear('created_at', '=', $req->tahun)
            ->where('user_id', '=', Auth::user()-> id)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('spd.daftar',['data'=>$data,'data2'=>$data2]);
        }else{
            $data = SPPDOnline :: whereYear('created_at', '=', $req->tahun)
            ->where('user_id', '=', Auth::user()-> id)
            ->orWhere('user_data', '=', Auth::user()-> id)
            ->whereMonth('created_at', '=', $req->bulan)
            ->orderBy('created_at', 'DESC')
            ->get();
            $data2 = SPPDOnlineex :: whereYear('created_at', '=', $req->tahun)
            ->where('user_id', '=', Auth::user()-> id)
            ->whereMonth('created_at', '=', $req->bulan)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('spd.daftar',['data'=>$data,'data2'=>$data2]);
        }
    }
}