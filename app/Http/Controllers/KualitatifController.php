<?php

namespace App\Http\Controllers;

use App\Models\Kualitatif;
use App\Models\Rekapkual;
use App\Models\Transkualitatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class KualitatifController extends Controller
{
    public function kualitatifv(){
        $data = Kualitatif::get();
        return view('sinonim.kualitatif.kualitatifv',['kual'=>$data]);
    }
    public function kualitatif(){
        return view('sinonim.kualitatif.kualitatif');
    }
    public function kualitatifs(Request $request){
        $validator = Validator::make($request->all(), [
            "nama"      => "required",  
            "bmn"  => "required",
            "ukuran"  => "required",
        ]);
        $nama = $request->nama;
        $ukuran = $request->ukuran;
        $cek = Kualitatif :: where('nama','=',$nama)->where('ukuran','=',$ukuran)->first();
        if(empty($cek)){
        $post               = new Kualitatif ();
        $post->bmn          = $request->bmn;
        $post->nama         = $request->nama;
        $post->ukuran       = $request->ukuran;
        $post->kosmetik     = 0;
        $post->pangan       = 0;
        $post->ot           = 0;
        $post->mikro        = 0;
        $post->obat         = 0;
        $post->s_kosmetik     = 0;
        $post->s_pangan       = 0;
        $post->s_ot           = 0;
        $post->s_mikro        = 0;
        $post->s_obat         = 0;
        $post->save();
        return back()->with('succes', 'Data berhasil diinput');
        }else{
            return back()->with('unsuccess','Data Alat Gelas Kualtitatif suda ada');
        }
    }
    public function kualitatiftransv($id){
        $data['data'] = Transkualitatif::where('kualitatif_id',$id)->get();
        $data['id']=$id;
        return view('sinonim.kualitatif.trans_kualitatifv',['trans'=>$data]);
    }
    public function kualtransi($id){
        $data= Kualitatif::where('id',$id)->first();
        return view('sinonim.kualitatif.trans_kualitatif',['data'=>$data]);
    }
    public function kualtrans(Request $request){
        $validator = Validator::make($request->all(), [
            "id"            => "required",  
            "jenis"         => "required",
            "stok"          => "required",
        ]);
        $id = $request-> id;
        if($request->jenis != "Transaksi Masuk Kosmetik" && $request->jenis != "Transaksi Masuk Pangan" && $request->jenis != "Transaksi Masuk OT" && $request->jenis != "Transaksi Masuk Mikro" && $request->jenis != "Transaksi Masuk Obat" ){
            if($request->jenis == "Transaksi Keluar/Pecah Kosmetik"){
                $data = Kualitatif :: where('id',$id)->first();
                if($data->kosmetik <= 0){
                    return back()->with('unsucces', 'Stok barang 0, Transaksi keluar tidak bisa dilakukan');
                }elseif ($data->kosmetik-$request->stok < 0){
                    return back()->with('unsucces', 'Stok permintaan (Keluar/Pecah) lebih besar dari stok tersedia, Transaksi keluar tidak bisa dilakukan');
                }else{
                    $post               = Kualitatif::findOrFail($id);
                    $post->kosmetik     = $data->kosmetik - $request->stok;
                    $post->updated_at   = date('Y-m-d H:i:s');
                    $post->save();
                    
                    $trans                      = new Transkualitatif ();
                    $trans-> kualitatif_id     = $id;
                    $trans->jenis               = $request->jenis;
                    $trans->stok                = $request->stok;
                    $trans->user_id             = Auth::user()->id;
    
                    $trans->save();
                    
                    return back()->with('succes', 'Stok barang berhasil diupdate');
                }
            }else if($request->jenis == "Transaksi Keluar/Pecah Pangan"){
                $data = Kualitatif :: where('id',$id)->first();
                if($data->pangan <= 0){
                    return back()->with('unsucces', 'Stok barang 0, Transaksi keluar tidak bisa dilakukan');
                }elseif ($data->pangan-$request->stok < 0){
                    return back()->with('unsucces', 'Stok permintaan (Keluar/Pecah) lebih besar dari stok tersedia, Transaksi keluar tidak bisa dilakukan');
                }else{
                    $post               = Kualitatif::findOrFail($id);
                    $post->pangan       = $data->pangan - $request->stok;
                    $post->updated_at   = date('Y-m-d H:i:s');
                    $post->save();
                    
                    $trans                      = new Transkualitatif ();
                    $trans-> kualitatif_id     = $id;
                    $trans->jenis               = $request->jenis;
                    $trans->stok                = $request->stok;
                    $trans->user_id             = Auth::user()->id;
    
                    $trans->save();
                    
                    return back()->with('succes', 'Stok barang berhasil diupdate');
                }
            }else if($request->jenis == "Transaksi Keluar/Pecah OT"){
                $data = Kualitatif :: where('id',$id)->first();
                if($data->ot <= 0){
                    return back()->with('unsucces', 'Stok barang 0, Transaksi keluar tidak bisa dilakukan');
                }elseif ($data->ot-$request->stok < 0){
                    return back()->with('unsucces', 'Stok permintaan (Keluar/Pecah) lebih besar dari stok tersedia, Transaksi keluar tidak bisa dilakukan');
                }else{
                    $post               = Kualitatif::findOrFail($id);
                    $post->ot           = $data->ot - $request->stok;
                    $post->updated_at   = date('Y-m-d H:i:s');
                    $post->save();
                    
                    $trans                      = new Transkualitatif ();
                    $trans-> kualitatif_id     = $id;
                    $trans->jenis               = $request->jenis;
                    $trans->stok                = $request->stok;
                    $trans->user_id             = Auth::user()->id;
    
                    $trans->save();
                    
                    return back()->with('succes', 'Stok barang berhasil diupdate');
                }
            }else if($request->jenis == "Transaksi Keluar/Pecah Mikro"){
                $data = Kualitatif :: where('id',$id)->first();
                if($data->mikro <= 0){
                    return back()->with('unsucces', 'Stok barang 0, Transaksi keluar tidak bisa dilakukan');
                }elseif ($data->mikro-$request->stok < 0){
                    return back()->with('unsucces', 'Stok permintaan (Keluar/Pecah) lebih besar dari stok tersedia, Transaksi keluar tidak bisa dilakukan');
                }else{
                    $post               = Kualitatif::findOrFail($id);
                    $post->mikro        = $data->mikro - $request->stok;
                    $post->updated_at   = date('Y-m-d H:i:s');
                    $post->save();
                    
                    $trans                      = new Transkualitatif ();
                    $trans-> kualitatif_id     = $id;
                    $trans->jenis               = $request->jenis;
                    $trans->stok                = $request->stok;
                    $trans->user_id             = Auth::user()->id;
    
                    $trans->save();
                    
                    return back()->with('succes', 'Stok barang berhasil diupdate');
                }
            }else if($request->jenis == "Transaksi Keluar/Pecah Obat"){
                $data = Kualitatif :: where('id',$id)->first();
                if($data->obat <= 0){
                    return back()->with('unsucces', 'Stok barang 0, Transaksi keluar tidak bisa dilakukan');
                }elseif ($data->obat-$request->stok < 0){
                    return back()->with('unsucces', 'Stok permintaan (Keluar/Pecah) lebih besar dari stok tersedia, Transaksi keluar tidak bisa dilakukan');
                }else{
                    $post               = Kualitatif::findOrFail($id);
                    $post->obat         = $data->obat - $request->stok;
                    $post->updated_at   = date('Y-m-d H:i:s');
                    $post->save();
                    
                    $trans                      = new Transkualitatif ();
                    $trans-> kualitatif_id     = $id;
                    $trans->jenis               = $request->jenis;
                    $trans->stok                = $request->stok;
                    $trans->user_id             = Auth::user()->id;
    
                    $trans->save();
                    
                    return back()->with('succes', 'Stok barang berhasil diupdate');
                }
            }
        }else{
            
            if ($request->jenis == "Transaksi Masuk Kosmetik"){
                $data = Kualitatif :: where('id',$id)->first();
                $plus               = Kualitatif::findOrFail($id);
                $plus->kosmetik     = $data->kosmetik + $request->stok;
                $plus->updated_at   = date('Y-m-d H:i:s');
                $plus->save();
                $trans                      = new Transkualitatif ();
                $trans-> kualitatif_id     = $id;
                $trans->jenis               = $request->jenis;
                $trans->stok                = $request->stok;
                $trans->user_id             = Auth::user()->id;
                $trans->save();
                return back()->with('succes', 'Stok barang berhasil diupdate');
            }else if ($request->jenis == "Transaksi Masuk Pangan"){
                $data = Kualitatif :: where('id',$id)->first();
                $plus               = Kualitatif::findOrFail($id);
                $plus->pangan       = $data->pangan + $request->stok;
                $plus->updated_at   = date('Y-m-d H:i:s');
                $plus->save();
                $trans                      = new Transkualitatif ();
                $trans-> kualitatif_id    = $id;
                $trans->jenis               = $request->jenis;
                $trans->stok                = $request->stok;
                $trans->user_id             = Auth::user()->id;
                $trans->save();
                return back()->with('succes', 'Stok barang berhasil diupdate');
            }else if ($request->jenis == "Transaksi Masuk OT"){
                $data = Kualitatif :: where('id',$id)->first();
                $plus               = Kualitatif::findOrFail($id);
                $plus->ot       = $data->ot + $request->stok;
                $plus->updated_at   = date('Y-m-d H:i:s');
                $plus->save();
                $trans                      = new Transkualitatif ();
                $trans-> kualitatif_id    = $id;
                $trans->jenis               = $request->jenis;
                $trans->stok                = $request->stok;
                $trans->user_id             = Auth::user()->id;
                $trans->save();
                return back()->with('succes', 'Stok barang berhasil diupdate');
            }else if ($request->jenis == "Transaksi Masuk Mikro"){
                $data = Kualitatif :: where('id',$id)->first();
                $plus               = Kualitatif::findOrFail($id);
                $plus->mikro       = $data->mikro + $request->stok;
                $plus->updated_at   = date('Y-m-d H:i:s');
                $plus->save();
                $trans                      = new Transkualitatif ();
                $trans-> kualitatif_id    = $id;
                $trans->jenis               = $request->jenis;
                $trans->stok                = $request->stok;
                $trans->user_id             = Auth::user()->id;
                $trans->save();
                return back()->with('succes', 'Stok barang berhasil diupdate');
            }else if ($request->jenis == "Transaksi Masuk Obat"){
                $data = Kualitatif :: where('id',$id)->first();
                $plus               = Kualitatif::findOrFail($id);
                $plus->obat         = $data->obat + $request->stok;
                $plus->updated_at   = date('Y-m-d H:i:s');
                $plus->save();
                $trans                      = new Transkualitatif ();
                $trans-> kualitatif_id    = $id;
                $trans->jenis               = $request->jenis;
                $trans->stok                = $request->stok;
                $trans->user_id             = Auth::user()->id;
                $trans->save();
                return back()->with('succes', 'Stok barang berhasil diupdate');
            }
        }     
    }
    public function kualitatife($id){
        $data = Kualitatif :: findOrFail($id);
        return view ('sinonim.kualitatif.kualitatife',['kual'=>$data]);
    }
    public function kualitatifu(Request $request, $id){
        $validator = Validator::make($request->all(), [
            "nama"      => "required",  
            "ukuran"  => "required",
            "bmn"  => "required",
        ]);
        $nama = $request->nama;
        $ukuran = $request->ukuran;
        $cek = Kualitatif :: where('id','!=',$id)->where('nama','=',$nama)->where('ukuran','=',$ukuran)->first();
        if(empty($cek)){
        $post               = Kualitatif::findOrFail($id);
        $post->nama         = $request->nama;
        $post->bmn        = $request->bmn;
        $post->ukuran        = $request->ukuran;
        $post->updated_at   = date('Y-d-m H:i:s');
        $post->save();

        return back()->with('succes', 'Data berhasil diupdate');
        }else{
            return back()->with('unsuccess','Data tidak dapat diupdate, Data Alat Gelas Kuantitatif suda ada');
        }
    }
    public function kualitatifd($id){
        $kuan = Kualitatif::findOrFail($id);
        $kuan->delete();
        return back()->with('succes','Data berhasil dihapus');
    }
    public function rekap(){
         $datenow = Carbon::now();
        $month =  $datenow->subMonth()->format('m');
     
        if($month==12){
            $year =  $datenow->format('Y');
        }else{
            $year  =  $datenow->isoFormat('Y');
        }

        $rekap = Rekapkual :: where('bulan','=', $month)->where('tahun','=', $year)->take(1)->first();
        if(!empty($rekap)){
            return back()->with('unsuccess','Data rekap untuk bulan terakhir suda ada');
        }else{
            $dataa = Kualitatif :: get();
            foreach ($dataa as $item){
                $post = Kualitatif::findOrFail($item->id);
                $post->s_kosmetik         = $item->kosmetik;
                $post->s_pangan           = $item->pangan;
                $post->s_ot               = $item->ot;
                $post->s_mikro            = $item->mikro;
                $post->s_obat             = $item->obat;
                $post->save();
            }
            $data = Kualitatif :: get();
            $transaksi = Transkualitatif :: whereMonth('created_at',$month)->whereYear('created_at', $year)->get();
            // Rekap Kosmetik
            foreach ($data as $item){
                $trans                      = new Rekapkual ();
                $trans-> bmn                = $item->bmn;
                $trans-> nama               = $item->nama;
                $trans-> ukuran             = $item->ukuran;
                    $hasil1 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->kualitatif_id){
                            if($tran->jenis == 'Transaksi Keluar/Pecah Kosmetik'){
                                $hasil1 = $hasil1 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> pecah              = $hasil1;
                    $hasil2 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->kualitatif_id){
                            if($tran->jenis == 'Transaksi Masuk Kosmetik'){
                                $hasil2 = $hasil2 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> masuk              = $hasil2;    
                $trans-> awal               = $item->s_kosmetik + $hasil1 - $hasil2;
                $trans-> akhir              = $item->s_kosmetik;
                $trans-> bulan              = $month;
                $trans-> tahun              = $year;
                $trans-> lab                = "Kosmetik";
                $trans->save();
            }
            // Rekap Pangan
            foreach ($data as $item){
                $trans                      = new Rekapkual ();
                $trans-> bmn                = $item->bmn;
                $trans-> nama               = $item->nama;
                $trans-> ukuran             = $item->ukuran;
                    $hasil1 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->kualitatif_id){
                            if($tran->jenis == 'Transaksi Keluar/Pecah Pangan'){
                                $hasil1 = $hasil1 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> pecah              = $hasil1;
                    $hasil2 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->kualitatif_id){
                            if($tran->jenis == 'Transaksi Masuk Pangan'){
                                $hasil2 = $hasil2 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> masuk              = $hasil2;    
                $trans-> awal               = $item->s_pangan + $hasil1 - $hasil2;
                $trans-> akhir              = $item->s_pangan;
                $trans-> bulan              = $month;
                $trans-> tahun              = $year;
                $trans-> lab                = "Pangan";
                $trans->save();
            }
            // Rekap OT
            foreach ($data as $item){
                $trans                      = new Rekapkual ();
                $trans-> bmn                = $item->bmn;
                $trans-> nama               = $item->nama;
                $trans-> ukuran             = $item->ukuran;
                    $hasil1 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->kualitatif_id){
                            if($tran->jenis == 'Transaksi Keluar/Pecah OT'){
                                $hasil1 = $hasil1 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> pecah              = $hasil1;
                    $hasil2 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->kualitatif_id){
                            if($tran->jenis == 'Transaksi Masuk OT'){
                                $hasil2 = $hasil2 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> masuk              = $hasil2;    
                $trans-> awal               = $item->s_ot + $hasil1 - $hasil2;
                $trans-> akhir              = $item->s_ot;
                $trans-> bulan              = $month;
                $trans-> tahun              = $year;
                $trans-> lab                = "OT";
                $trans->save();
            }
            // Rekap Mikro
            foreach ($data as $item){
                $trans                      = new Rekapkual ();
                $trans-> bmn                = $item->bmn;
                $trans-> nama               = $item->nama;
                $trans-> ukuran             = $item->ukuran;
                $trans-> awal               = 0;
                    $hasil1 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->kualitatif_id){
                            if($tran->jenis == 'Transaksi Keluar/Pecah Mikro'){
                                $hasil1 = $hasil1 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> pecah              = $hasil1;
                    $hasil2 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->kualitatif_id){
                            if($tran->jenis == 'Transaksi Masuk Mikro'){
                                $hasil2 = $hasil2 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> masuk              = $hasil2;    
                $trans-> awal               = $item->s_mikro + $hasil1 - $hasil2;
                $trans-> akhir              = $item->s_mikro;
                $trans-> bulan              = $month;
                $trans-> tahun              = $year;
                $trans-> lab                = "Mikro";
                $trans->save();
            }
            // Rekap Obat
            foreach ($data as $item){
                $trans                      = new Rekapkual ();
                $trans-> bmn                = $item->bmn;
                $trans-> nama               = $item->nama;
                $trans-> ukuran             = $item->ukuran;
                $trans-> awal               = 0;
                    $hasil1 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->kualitatif_id){
                            if($tran->jenis == 'Transaksi Keluar/Pecah Obat'){
                                $hasil1 = $hasil1 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> pecah              = $hasil1;
                    $hasil2 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->kualitatif_id){
                            if($tran->jenis == 'Transaksi Masuk Obat'){
                                $hasil2 = $hasil2 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> masuk              = $hasil2;    
                $trans-> awal               = $item->s_obat + $hasil1 - $hasil2;
                $trans-> akhir              = $item->s_obat;
                $trans-> bulan              = $month;
                $trans-> tahun              = $year;
                $trans-> lab                = "Obat";
                $trans->save();
            }
        }

        return back()->with('succes','Data Stok Akhir Bulanan telah diinput');
    }
    public function formc(){
        return view('sinonim.kualitatif.kual_formc');
    }
    public function kualcetak(Request $request){
        $validator = Validator::make($request->all(), [
            "lab"            => "required",  
            "bulan"         => "required",
            "tahun"          => "required",
        ]);
        $lab    = $request->lab;
        $bulan  = $request->bulan;
        $tahun  = $request->tahun; 

        if($lab=='All'){
            $data = Rekapkual :: where('bulan','=',$bulan)->where('tahun','=',$tahun)->get();             
        }else{
            $data = Rekapkual :: where('lab','=',$lab)->where('bulan','=',$bulan)->where('tahun','=',$tahun)->get(); 
        }
        return view('sinonim.kualitatif.kualitatifc',['kual'=>$data,'lab'=>$lab]);
    }

}
