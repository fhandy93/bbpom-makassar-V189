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

class SPDController extends Controller
{
    public function form(){
        try{
            $data = User :: get(['id','name']); 
            return view('spd.formulir',['data'=>$data]);
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        }  
    }
    public function formex(){ 
        return view('spd.formulirex');

    }
    public function view(){
        try{
            $data = SPPDOnline :: where('user_id', '=', Auth::user()-> id)->orWhere('user_data', '=', Auth::user()-> id)->orderBy('id', 'DESC')->get();
            $data2 = SPPDOnlineex :: where('user_id', '=', Auth::user()-> id)->orderBy('id', 'DESC')->get();
            return view('spd.daftar',['data'=>$data,'data2'=>$data2]);
        }catch(\Throwable $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }  
    }
    public function show($id)
    {
        try{
            $data = user :: where('id',$id)->first('username');
            $user = Profile :: where('username',$data->username)->first(['nip','pangkat','jabatan']);
            return response()->json([$user]);
        }catch (\Throwable $e) {
            return redirect()->route('sppd.view')->with('error', $e->getMessage());
        } 
    }
    public function store(Request $req){
        try{
            $req->validate([
            "st" => "required|mimes:pdf|max:2048",
            "maksud" => "required",
            "tujuan" => "required",
            "asal" => "required",
            ], [
                "st.required" => "Harap memilih file PDF",
                "st.mimes"    => "File harus berupa PDF",
                "st.max"      => "Ukuran file maksimal 2MB",
                "maksud" => "Maksud Perjalanan Dinas harus diisi",
                "tujuan" => "Tempat Tujuan harus diisi",
                "asal" => "Tempat Berangkat harus diisi"
            ]);

            $sppd                   = new SPPDOnline();
            $sppd->user_id          = Auth::user()->id;
            $sppd->user_data        = $req->user_data;
            $sppd->level_biaya      = $req->level_biaya;
            $sppd->maksud           = $req->maksud;
            $sppd->transport        = $req->transport;
            $sppd->asal             = $req->asal;
            $sppd->tujuan           = $req->tujuan;
            $sppd->tgl_berangkat    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d');
            $sppd->tgl_kembali      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d');

            $hari = rangeDay(
                Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d'),
                Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d')
            );
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

            $sppd->hari        = $hari;
            $sppd->jns_dns2    = $req->jns_dns2;
            $sppd->jns_dns3    = $req->jns_dns3;
            $sppd->jns_dns4    = $req->jns_dns4;
            $sppd->akun        = $req->akun;
            $sppd->instansi    = $req->instansi;
            $sppd->keterangan  = $req->ket;
            $sppd->tgl_st      = Carbon::createFromFormat('d/m/Y', $req->tgl_st)->format('Y-m-d');
            $sppd->tgl         = Carbon::createFromFormat('d/m/Y', $req->tgl)->format('Y-m-d');
            $sppd->ppk         = $req->ppk;
            $sppd->mengetahui  = $req->mengetahui;

            if ($req->mode == 'save') {
                $sppd->status = 1;
            } else {
                $sppd->status = 2;
                $pesan1 = '*Hy Bestiee* Ada SPPD Online masuk, Konfirmasi Yuukkkk 🤭 https://bbpom-makassar.com/sppd-view-admin';
                sendMessage($pesan1, '6285399000189');
                sendMessage($pesan1, '082299321472');
            }
            // ======================
            // ✅ Upload file (private storage, anti duplikasi)
            // ======================
            if ($req->hasFile('st')) {
                $file = $req->file('st');

                // buat nama file berdasarkan hash isi
                $hashName = md5_file($file->getRealPath()) . '.' . $file->getClientOriginalExtension();

                // paksa simpan ke storage/app/st (disk local)
                if (!Storage::disk('local')->exists("st/{$hashName}")) {
                    $file->storeAs('st', $hashName, 'local');
                }

                $sppd->file          = "st/{$hashName}";               // path aman
                $sppd->original_name = $file->getClientOriginalName(); // nama asli
            }


            $sppd->save();
            $new_id = $sppd->id;
            // ======================
            // ✅ Untuk multiple user
            // ======================
            if ($req->user) {
                foreach ($req->user as $user) {
                    $sppdUser                   = new SPPDOnline();
                    $sppdUser->user_id          = Auth::user()->id;
                    $sppdUser->user_data        = $user;
                    $sppdUser->level_biaya      = $req->level_biaya;
                    $sppdUser->maksud           = $req->maksud;
                    $sppdUser->transport        = $req->transport;
                    $sppdUser->asal             = $req->asal;
                    $sppdUser->tujuan           = $req->tujuan;
                    $sppdUser->tgl_berangkat    = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d');
                    $sppdUser->tgl_kembali      = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d');
                    $hari = rangeDay(
                        Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d'),
                        Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d')
                    );

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
                
                        $sppdUser->hari        = $hari;
                        $sppdUser->jns_dns2    = $req->jns_dns2;
                        $sppdUser->jns_dns3    = $req->jns_dns3;
                        $sppdUser->jns_dns4    = $req->jns_dns4;
                        $sppdUser->akun        = $req->akun;
                        $sppdUser->instansi    = $req->instansi;
                        $sppdUser->keterangan  = $req->ket;
                        $sppdUser->tgl_st      = Carbon::createFromFormat('d/m/Y', $req->tgl_st)->format('Y-m-d');
                        $sppdUser->tgl         = Carbon::createFromFormat('d/m/Y', $req->tgl)->format('Y-m-d');
                        $sppdUser->ppk         = $req->ppk;
                        $sppdUser->mengetahui  = $req->mengetahui;
                        $sppdUser->status      = ($req->mode == 'save') ? 1 : 2;

                        // file tetap sama dengan file utama
                        if ($req->hasFile('st')) {
                            $sppdUser->file          = $sppd->file;
                            $sppdUser->original_name = $sppd->original_name;
                        }

                        $sppdUser->save();
                }
            }
            // ======================
            // ✅ Simpan pengikut
            // ======================
            if ($req->nama_pengikut1 != null) {
                $ikut              = new SPPDOnlinepengikut();
                $ikut->sppd_id     = $new_id;
                $ikut->nama1       = $req->nama_pengikut1;
                $ikut->tgl1        = $req->tgl_lahir_pengikut1;
                $ikut->ket1        = $req->ket_pengikut1;
                $ikut->nama2       = $req->nama_pengikut2;
                $ikut->tgl2        = $req->tgl_lahir_pengikut2;
                $ikut->ket2        = $req->ket_pengikut2;
                $ikut->nama3       = $req->nama_pengikut3;
                $ikut->tgl3        = $req->tgl_lahir_pengikut3;
                $ikut->ket3        = $req->ket_pengikut3;
                $ikut->nama4       = $req->nama_pengikut4;
                $ikut->tgl4        = $req->tgl_lahir_pengikut4;
                $ikut->ket4        = $req->ket_pengikut4;
                $ikut->nama5       = $req->nama_pengikut5;
                $ikut->tgl5        = $req->tgl_lahir_pengikut5;
                $ikut->ket5        = $req->ket_pengikut5;
                $ikut->save();
            }

            // ======================
            // ✅ Redirect
            // ======================
            if ($req->mode == 'save') {
                return redirect()->route('sppd.view')->with('success', 'Data berhasil disimpan');
            } else {
                return redirect()->route('sppd.view')->with('success', 'Data berhasil dikirim');
            }
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        }  
    }
    public function storeex(Request $req){
        
        try{
            $req->validate([
                "st"      => "required|mimetypes:application/pdf|max:2048",
                "maksud" => "required",
                "tujuan" => "required",
                "asal" => "required",
                ], [
                    "st.required" => "Harap memilih file PDF",
                    "st.mimetypes"  => "File harus berupa PDF",
                    "st.max"      => "Ukuran file maksimal 2MB",
                    "maksud" => "Maksud Perjalanan Dinas harus diisi",
                    "tujuan" => "Tempat Tujuan harus diisi",
                    "asal" => "Tempat Berangkat harus diisi"
                ]);

            $sppd                   = new SPPDOnlineex();
            $sppd->user_id          = Auth::id();
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

            $hari = rangeDay($sppd->tgl_berangkat, $sppd->tgl_kembali);

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

            $sppd->hari       = $hari;
            $sppd->jns_dns2   = $req->jns_dns2;
            $sppd->jns_dns3   = $req->jns_dns3;
            $sppd->jns_dns4   = $req->jns_dns4;
            $sppd->akun       = $req->akun;
            $sppd->instansi   = $req->instansi;
            $sppd->keterangan = $req->ket;
            $sppd->tgl_st     = Carbon::createFromFormat('d/m/Y', $req->tgl_st)->format('Y-m-d');
            $sppd->tgl        = Carbon::createFromFormat('d/m/Y', $req->tgl)->format('Y-m-d');
            $sppd->ppk        = $req->ppk;
            $sppd->mengetahui = $req->mengetahui;

            if ($req->mode == 'save') {
                $sppd->status = 1;
            } else {
                $sppd->status = 2;
                $pesan1 = '*Hy Bestiee* Ada SPPD Online masuk, Konfirmasi Yuukkkk 🤭 https://bbpom-makassar.com/sppd-view-admin';
                sendMessage($pesan1, '6285399000189');
                sendMessage($pesan1, '082299321472');
            }

            // ✅ Upload file ke storage private
            if ($req->hasFile('st')) {
                $file = $req->file('st');
            
                // buat nama file berdasarkan hash isi
                $hashName = md5_file($file->getRealPath()) . '.' . $file->getClientOriginalExtension();
            
                // paksa simpan ke storage/app/st (disk local)
                if (!Storage::disk('local')->exists("st/{$hashName}")) {
                    $file->storeAs('st', $hashName, 'local');
                }
            
                $sppd->file          = "st/{$hashName}";               // path aman
                $sppd->original_name = $file->getClientOriginalName(); // nama asli
            }


            $sts = $sppd->save();
            $new_id = $sppd->id;

            if ($sts && $req->nama_pengikut1 != null) {
            $ikut = new SPPDOnlinepengikutex();
            $ikut->sppd_id = $new_id;
            $ikut->nama1   = $req->nama_pengikut1;
            $ikut->tgl1    = $req->tgl_lahir_pengikut1;  
            $ikut->ket1    = $req->ket_pengikut1;
            $ikut->nama2   = $req->nama_pengikut2;
            $ikut->tgl2    = $req->tgl_lahir_pengikut2;
            $ikut->ket2    = $req->ket_pengikut2;
            $ikut->nama3   = $req->nama_pengikut3;
            $ikut->tgl3    = $req->tgl_lahir_pengikut3;
            $ikut->ket3    = $req->ket_pengikut3;
            $ikut->nama4   = $req->nama_pengikut4;
            $ikut->tgl4    = $req->tgl_lahir_pengikut4;
            $ikut->ket4    = $req->ket_pengikut4;
            $ikut->nama5   = $req->nama_pengikut5;
            $ikut->tgl5    = $req->tgl_lahir_pengikut5; 
            $ikut->ket5    = $req->ket_pengikut5;
            $ikut->save();
            }

            if ($sts) {
            return redirect()->route('sppd.view')
                            ->with('success', $req->mode == 'save' 
                                ? 'Data berhasil disimpan'
                                : 'Data berhasil dikirim');
            }
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function cetak($id){
        try{
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
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function cetakex($id){
        try{
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
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function detail($id){
        try{
            $data = SPPDOnline :: where('id', '=', $id)->first();
            $user = User :: where('id','=',$data->user_data)->first('username');
            $prof = Profile :: where('username','=',$user->username)->first(['nip','pangkat','jabatan']);
            $ikut = SPPDOnlinepengikut :: where('sppd_id','=',$id)->first();
            return view('spd.detail',['data'=>$data,'prof'=>$prof,'ikut'=>$ikut]);
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function detailex($id){
        try{
            $data = SPPDOnlineex :: where('id', '=', $id)->first();
            
            $ikut = SPPDOnlinepengikutex :: where('sppd_id','=',$id)->first();
            return view('spd.detail_ex',['data'=>$data,'ikut'=>$ikut]);
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function kirim($id){
        try{
            $update  = SPPDOnline::findOrFail($id);
            $update->status      = 2;
            $update->save();

            $pesan1 = '*Hy Bestiee* Ada SPPD Online masuk, Konfirmasi Yuukkkk 🤭 https://bbpom-makassar.com/sppd-view-admin';
            $no_telpon = '6285399000189';
            sendMessage($pesan1,$no_telpon);

            // session () ->flash('success','Data berhasil dikirim');
            // return $this->view();
            return redirect()->route('sppd.view')->with('success', 'Data berhasil dikirim');
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function kirimex($id){
        try{
            $update  = SPPDOnlineex::findOrFail($id);
            $update->status      = 2;
            $update->save();

            $pesan1 = '*Hy Bestiee* Ada SPPD Online masuk, Konfirmasi Yuukkkk 🤭 https://bbpom-makassar.com/sppd-view-admin';
            $no_telpon = '6285399000189';
            sendMessage($pesan1,$no_telpon);

            // session () ->flash('success','Data berhasil dikirim');
            // return $this->view();
            return redirect()->route('sppd.view')->with('success', 'Data berhasil dikirim');
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function edit($id){
        try{
            $data = SPPDOnline :: where('id','=',$id)->first();
            $user = User :: where('id','=',$data->user_data)->first(['username','name']);
            $prof = Profile :: where('username','=',$user->username)->first(['nip','pangkat','jabatan']);
            $ikut = SPPDOnlinepengikut :: where('sppd_id','=',$id)->first();
            return view('spd.edit',['data'=>$data,'prof'=>$prof,'ikut'=>$ikut,'user'=>$user]);
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function editex($id){
        try{
            $data = SPPDOnlineex :: where('id','=',$id)->first();
            $ikut = SPPDOnlinepengikutex :: where('sppd_id','=',$id)->first();
            return view('spd.edit_ex',['data'=>$data,'ikut'=>$ikut]);
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function update(Request $req, $id){
        try{
            $sppd = SPPDOnline::findOrFail($id);
            $sppd->level_biaya   = $req->level_biaya;
            $sppd->maksud        = $req->maksud;
            $sppd->transport     = $req->transport;
            $sppd->asal          = $req->asal;
            $sppd->tujuan        = $req->tujuan;
            $sppd->tgl_berangkat = Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d');
            $sppd->tgl_kembali   = Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d');

            $hari = rangeDay(
                Carbon::createFromFormat('d/m/Y', $req->tgl_berangkat)->format('Y-m-d'),
                Carbon::createFromFormat('d/m/Y', $req->tgl_kembali)->format('Y-m-d')
            );

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

            $sppd->hari       = $hari;
            $sppd->jns_dns2   = $req->jns_dns2;
            $sppd->jns_dns3   = $req->jns_dns3;
            $sppd->jns_dns4   = $req->jns_dns4;
            $sppd->akun       = $req->akun;
            $sppd->instansi   = $req->instansi;
            $sppd->keterangan = $req->ket;
            $sppd->tgl_st     = Carbon::createFromFormat('d/m/Y', $req->tgl_st)->format('Y-m-d');
            $sppd->tgl        = Carbon::createFromFormat('d/m/Y', $req->tgl)->format('Y-m-d');
            $sppd->ppk        = $req->ppk;
            $sppd->mengetahui = $req->mengetahui;

            if ($req->mode == 'save') {
                $sppd->status = 1;
            } elseif ($req->mode == 'admin') {
                // biarkan kosong sesuai kode lama
            } else {
                $sppd->status = 2;
                $pesan1 = '*Hy Bestiee* Ada SPPD Online masuk, Konfirmasi Yuukkkk 🤭 https://bbpom-makassar.com/sppd-view-admin';
                $no_telpon = '6285399000189';
                sendMessage($pesan1, $no_telpon);
            }

            // === BAGIAN UPLOAD FILE (refactor) ===
            if ($req->hasFile('st')) {
                $req->validate([
                    'st' => 'required|mimes:pdf|max:2048',
                ], [
                    'st.required' => 'Harap memilih file PDF',
                    'st.mimes'    => 'Format file harus PDF',
                    'st.max'      => 'Ukuran file maksimal 2MB',
                ]);

                // hapus file lama kalau ada
                // if ($sppd->file && Storage::exists($sppd->file)) {
                //     Storage::delete($sppd->file);
                // }

                $file = $req->file('st');

                // buat nama file berdasarkan hash isi
                $hashName = md5_file($file->getRealPath()) . '.' . $file->getClientOriginalExtension();
            
                // paksa simpan ke storage/app/st (disk local)
                if (!Storage::disk('local')->exists("st/{$hashName}")) {
                    $file->storeAs('st', $hashName, 'local');
                }
            
                $sppd->file          = "st/{$hashName}";               // path aman
                $sppd->original_name = $file->getClientOriginalName(); // nama asli
            }
            // === END UPLOAD FILE ===

            $sts = $sppd->save();
            // === update data pengikut (saya biarkan sesuai kode kamu) ===
            if ($sts) {
                if ($req->nama_pengikut1 != null) {
                    $ikut = SPPDOnlinepengikut::where('sppd_id', '=', $id)->first();
                    if ($ikut) {
                        $ikut->nama1 = $req->nama_pengikut1;
                        $ikut->tgl1  = $req->tgl_lahir_pengikut1;
                        $ikut->ket1  = $req->ket_pengikut1;
                        $ikut->nama2 = $req->nama_pengikut2;
                        $ikut->tgl2  = $req->tgl_lahir_pengikut2;
                        $ikut->ket2  = $req->ket_pengikut2;
                        $ikut->nama3 = $req->nama_pengikut3;
                        $ikut->tgl3  = $req->tgl_lahir_pengikut3;
                        $ikut->ket3  = $req->ket_pengikut3;
                        $ikut->nama4 = $req->nama_pengikut4;
                        $ikut->tgl4  = $req->tgl_lahir_pengikut4;
                        $ikut->ket4  = $req->ket_pengikut4;
                        $ikut->nama5 = $req->nama_pengikut5;
                        $ikut->tgl5  = $req->tgl_lahir_pengikut5;
                        $ikut->ket5  = $req->ket_pengikut5;
                        $ikut->save();
                    } else {
                        $ikut              = new SPPDOnlinepengikut();
                        $ikut->sppd_id     = $id;
                        $ikut->nama1       = $req->nama_pengikut1;
                        $ikut->tgl1        = $req->tgl_lahir_pengikut1;
                        $ikut->ket1        = $req->ket_pengikut1;
                        $ikut->nama2       = $req->nama_pengikut2;
                        $ikut->tgl2        = $req->tgl_lahir_pengikut2;
                        $ikut->ket2        = $req->ket_pengikut2;
                        $ikut->nama3       = $req->nama_pengikut3;
                        $ikut->tgl3        = $req->tgl_lahir_pengikut3;
                        $ikut->ket3        = $req->ket_pengikut3;
                        $ikut->nama4       = $req->nama_pengikut4;
                        $ikut->tgl4        = $req->tgl_lahir_pengikut4;
                        $ikut->ket4        = $req->ket_pengikut4;
                        $ikut->nama5       = $req->nama_pengikut5;
                        $ikut->tgl5        = $req->tgl_lahir_pengikut5;
                        $ikut->ket5        = $req->ket_pengikut5;
                        $ikut->save();
                    }
                }
            }
            if ($sts) {
                if ($req->mode == 'save') {
                    return redirect()->route('sppd.view')->with('success', 'Data berhasil diupdate');
                } elseif ($req->mode == 'admin') {
                    return redirect()->route('sppd.viewadmin')->with('success', 'Data berhasil diupdate');
                } else {
                    return redirect()->route('sppd.view')->with('success', 'Data berhasil dikirim');
                }
            }
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function updateex(Request $req, $id){
        try{
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
            // === BAGIAN UPLOAD FILE (refactor) ===
            if ($req->hasFile('st')) {
                $req->validate([
                    'st' => 'required|mimes:pdf|max:2048',
                ], [
                    'st.required' => 'Harap memilih file PDF',
                    'st.mimes'    => 'Format file harus PDF',
                    'st.max'      => 'Ukuran file maksimal 2MB',
                ]);

                // hapus file lama kalau ada
                if ($sppd->file && Storage::disk('local')->exists($sppd->file)) {
                    Storage::disk('local')->delete($sppd->file);
                }

                $file = $req->file('st');

                // buat nama file berdasarkan hash isi
                $hashName = md5_file($file->getRealPath()) . '.' . $file->getClientOriginalExtension();
            
                // paksa simpan ke storage/app/st (disk local)
                if (!Storage::disk('local')->exists("st/{$hashName}")) {
                    $file->storeAs('st', $hashName, 'local');
                }
            
                $sppd->file          = "st/{$hashName}";               // path aman
                $sppd->original_name = $file->getClientOriginalName(); // nama asli
            }
            // === END UPLOAD FILE ===
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
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function viewadmin(){
        try{
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
        }catch (\Throwable $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }
    }
    public function approv($id){
        try{
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
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function approvex($id){
        try{
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
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function destroy($id){
        try{
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
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function destroyex($id)
    {
        try {
            $delete = SPPDOnlineex::findOrFail($id);
    
            // hapus file kalau ada
            if ($delete->file && Storage::disk('local')->exists($delete->file)) {
                Storage::disk('local')->delete($delete->file);
            }
            \Log::info('Mau hapus file: ' . $delete->file);
            \Log::info('Lokasi full: ' . storage_path('app/' . $delete->file));
            // hapus record utama
            $delete->delete();
    
            // hapus relasi pengikut kalau ada
            SPPDOnlinepengikutex::where('sppd_id', $id)->delete();
    
            session()->flash('success', 'Data berhasil dihapus');
            return back();
        } catch (\Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function destroyadmin($id){
        try{
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
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function destroyadminex($id){
        try{
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
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function add($id){
        return view('spd.nomor_sppd',['id'=>$id]);
    }
    public function nomoredit($id){
        try{
            $data = SPPDOnline:: where('id',$id)->first('no_sppd');
            return view('spd.nomor_sppd_edit',['data'=>$data,'id'=>$id]);
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function nomoreditex($id){
        try{
            $data = SPPDOnlineex:: where('id',$id)->first('no_sppd');
            return view('spd.nomor_sppd_edit_ex',['data'=>$data,'id'=>$id]);
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }
    public function addex($id){
        return view('spd.nomor_sppd_ex',['id'=>$id]);
    }
    public function updatenumber(Request $req,$id){
        try{
            $update  = SPPDOnline::findOrFail($id);
            $update->no_sppd      = $req->no_sppd;
            $update->save();
            session () ->flash('success','Data berhasil diinput');
            return $this->viewadmin();
        }catch (\Throwable $e) {
            return redirect()->route('sppd.viewadmin')->with('error', $e->getMessage());
        } 
    }
    public function updatenumberex(Request $req,$id){
        try{
            $update  = SPPDOnlineex::findOrFail($id);
            $update->no_sppd      = $req->no_sppd;
            $update->save();
            session () ->flash('success','Data berhasil diinput');
            return $this->viewadmin();
        }catch (\Throwable $e) {
            return redirect()->route('sppd.viewadmin')->with('error', $e->getMessage());
        } 
    }
    public function dwn($id){
        try{
            $sppd = SPPDOnline::findOrFail($id);

            // cek file di storage/app/st/
            if (!Storage::disk('local')->exists($sppd->file)) {
            abort(403, 'File tidak ditemukan: '.$sppd->file);
            }

            // kirim file ke user dengan nama asli
            return Storage::disk('local')->download($sppd->file, $sppd->original_name);

        }catch (\Throwable $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }  
    }
    public function dwnEx($id){
        try{
            $sppd = SPPDOnlineex::findOrFail($id);

            // cek file di storage/app/st/
            if (!Storage::disk('local')->exists($sppd->file)) {
            abort(403, 'File tidak ditemukan: '.$sppd->file);
            }

            // kirim file ke user dengan nama asli
            return Storage::disk('local')->download($sppd->file, $sppd->original_name);
        }catch (\Throwable $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }  
    }
    public function filter(Request $req)
    {
        try{
            $query = SPPDOnline::query();
    
            $tahun = $req->tahun != 'Pilih Tahun' ? $req->tahun : date('Y');
            $bulan = $req->bulan != 'Pilih Bulan' ? $req->bulan : null;
            $query->whereYear('created_at', $tahun);
            if ($bulan) {
                $query->whereMonth('created_at', $bulan);
            }
            $data = $query->orderBy('id', 'DESC')->get();
            return view('spd.daftar', compact('data'));
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }

    public function filteradmin(Request $req)
    {
        try{
            // Tahun & bulan default
            $tahun = ($req->tahun && $req->tahun != 'Pilih Tahun') ? $req->tahun : date('Y');
            $bulan = ($req->bulan && $req->bulan != 'Pilih Bulan') ? $req->bulan : null;

            // fungsi kecil buat apply filter ke model
            $filterData = function ($model) use ($tahun, $bulan) {
                $query = $model::whereYear('created_at', $tahun);
                if ($bulan) {
                    $query->whereMonth('created_at', $bulan);
                }
                return $query->orderBy('id', 'DESC')->get();
            };

            $data  = $filterData(SPPDOnline::class);
            $data2 = $filterData(SPPDOnlineex::class);

            return view('spd.daftar_admin', compact('data', 'data2'));
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }

    public function filterp(Request $req)
    {
        try{
            $tahun = ($req->tahun && $req->tahun != 'Pilih Tahun') ? $req->tahun : date('Y');
            $bulan = ($req->bulan && $req->bulan != 'Pilih Bulan') ? $req->bulan : null;
            $userId = Auth::user()->id;

            // fungsi helper untuk filter query
            $filterData = function ($model, $withUserData = false) use ($tahun, $bulan, $userId) {
                $query = $model::whereYear('created_at', $tahun);

                if ($bulan) {
                    $query->whereMonth('created_at', $bulan);
                }

                // filter user
                if ($withUserData) {
                    $query->where(function ($q) use ($userId) {
                        $q->where('user_id', $userId)
                        ->orWhere('user_data', $userId);
                    });
                } else {
                    $query->where('user_id', $userId);
                }

                return $query->orderBy('id', 'DESC')->get();
            };

            $data  = $filterData(SPPDOnline::class, true);  // pakai user_id OR user_data
            $data2 = $filterData(SPPDOnlineex::class);      // hanya user_id

            return view('spd.daftar', compact('data', 'data2'));
        }catch (\Throwable $e) {
            return back()->with('error',  $e->getMessage());
        } 
    }

}