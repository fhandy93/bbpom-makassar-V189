<?php

namespace App\Http\Controllers;

use App\Models\Baku;
use App\Models\Rekapbaku;
use App\Models\Transbaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class BakuController extends Controller
{
    public function bakuv(){
        $data = Baku::get();
        return view('sinonim.baku.bakuv',['baku'=>$data]);
    }
    public function baku(){
        return view('sinonim.baku.baku');
    }
    public function bakus(Request $request){
        $validator = Validator::make($request->all(), [
            "nama"      => "required",  
            "no_kontrol"  => "required",
            "bobot"  => "required",
        ]);
        $nama = $request->nama;
        $no_kontrol = $request->no_kontrol;
        $bobot = $request->bobot;

        $cek = Baku :: where('nama','=',$nama)->where('no_kontrol','=',$no_kontrol)->where('bobot','=',$bobot)->first();
        if(empty($cek)){
        $post               = new Baku ();
        $post->no_kontrol   = $request->no_kontrol;
        $post->nama         = $request->nama;
        $post->bobot       = $request->bobot;
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
            return back()->with('unsuccess','Data Baku Pembanding suda ada');
        }
    }
    public function bakutransv($id){
        $data['data'] = Transbaku::where('baku_id',$id)->get();
        $data['id']=$id;
        return view('sinonim.baku.trans_bakuv',['trans'=>$data]);
    }
    public function bakutransi($id){
        $data= Baku::where('id',$id)->first();
        return view('sinonim.baku.trans_baku',['data'=>$data]);
    }
    public function bakutrans(Request $request){
        $validator = Validator::make($request->all(), [
            "id"            => "required",  
            "jenis"         => "required",
            "stok"          => "required",
        ]);
        $id = $request-> id;
        if($request->jenis != "Transaksi Masuk Kosmetik" && $request->jenis != "Transaksi Masuk Pangan" && $request->jenis != "Transaksi Masuk OT" && $request->jenis != "Transaksi Masuk Mikro" && $request->jenis != "Transaksi Masuk Obat" ){
            if($request->jenis == "Transaksi Keluar Kosmetik"){
                $data = Baku :: where('id',$id)->first();
                if($data->kosmetik <= 0){
                    return back()->with('unsucces', 'Stok barang 0, Transaksi keluar tidak bisa dilakukan');
                }elseif ($data->kosmetik-$request->stok < 0){
                    return back()->with('unsucces', 'Stok permintaan (Keluar) lebih besar dari stok tersedia, Transaksi keluar tidak bisa dilakukan');
                }else{
                    $post               = Baku::findOrFail($id);
                    $post->kosmetik     = $data->kosmetik - $request->stok;
                    $post->updated_at   = date('Y-m-d H:i:s');
                    $post->save();
                    
                    $trans                      = new Transbaku ();
                    $trans-> baku_id      = $id;
                    $trans->jenis               = $request->jenis;
                    $trans->stok                = $request->stok;
                    $trans->user_id             = Auth::user()->id;
    
                    $trans->save();
                    
                    return back()->with('succes', 'Stok barang berhasil diupdate');
                }
            }else if($request->jenis == "Transaksi Keluar Pangan"){
                $data = Baku :: where('id',$id)->first();
                if($data->pangan <= 0){
                    return back()->with('unsucces', 'Stok barang 0, Transaksi keluar tidak bisa dilakukan');
                }elseif ($data->pangan-$request->stok < 0){
                    return back()->with('unsucces', 'Stok permintaan (Keluar) lebih besar dari stok tersedia, Transaksi keluar tidak bisa dilakukan');
                }else{
                    $post               = Baku::findOrFail($id);
                    $post->pangan       = $data->pangan - $request->stok;
                    $post->updated_at   = date('Y-m-d H:i:s');
                    $post->save();
                    
                    $trans                      = new Transbaku ();
                    $trans-> baku_id     = $id;
                    $trans->jenis               = $request->jenis;
                    $trans->stok                = $request->stok;
                    $trans->user_id             = Auth::user()->id;
    
                    $trans->save();
                    
                    return back()->with('succes', 'Stok barang berhasil diupdate');
                }
            }else if($request->jenis == "Transaksi Keluar OT"){
                $data = Baku :: where('id',$id)->first();
                if($data->ot <= 0){
                    return back()->with('unsucces', 'Stok barang 0, Transaksi keluar tidak bisa dilakukan');
                }elseif ($data->ot-$request->stok < 0){
                    return back()->with('unsucces', 'Stok permintaan (Keluar) lebih besar dari stok tersedia, Transaksi keluar tidak bisa dilakukan');
                }else{
                    $post               = Baku::findOrFail($id);
                    $post->ot           = $data->ot - $request->stok;
                    $post->updated_at   = date('Y-m-d H:i:s');
                    $post->save();
                    
                    $trans                      = new Transbaku ();
                    $trans-> baku_id      = $id;
                    $trans->jenis               = $request->jenis;
                    $trans->stok                = $request->stok;
                    $trans->user_id             = Auth::user()->id;
    
                    $trans->save();
                    
                    return back()->with('succes', 'Stok barang berhasil diupdate');
                }
            }else if($request->jenis == "Transaksi Keluar Mikro"){
                $data = Baku :: where('id',$id)->first();
                if($data->mikro <= 0){
                    return back()->with('unsucces', 'Stok barang 0, Transaksi keluar tidak bisa dilakukan');
                }elseif ($data->mikro-$request->stok < 0){
                    return back()->with('unsucces', 'Stok permintaan (Keluar) lebih besar dari stok tersedia, Transaksi keluar tidak bisa dilakukan');
                }else{
                    $post               = Baku::findOrFail($id);
                    $post->mikro        = $data->mikro - $request->stok;
                    $post->updated_at   = date('Y-m-d H:i:s');
                    $post->save();
                    
                    $trans                      = new Transbaku ();
                    $trans-> baku_id     = $id;
                    $trans->jenis               = $request->jenis;
                    $trans->stok                = $request->stok;
                    $trans->user_id             = Auth::user()->id;
    
                    $trans->save();
                    
                    return back()->with('succes', 'Stok barang berhasil diupdate');
                }
            }else if($request->jenis == "Transaksi Keluar Obat"){
                $data = Baku :: where('id',$id)->first();
                if($data->obat <= 0){
                    return back()->with('unsucces', 'Stok barang 0, Transaksi keluar tidak bisa dilakukan');
                }elseif ($data->obat-$request->stok < 0){
                    return back()->with('unsucces', 'Stok permintaan (Keluar) lebih besar dari stok tersedia, Transaksi keluar tidak bisa dilakukan');
                }else{
                    $post               = Baku::findOrFail($id);
                    $post->obat         = $data->obat - $request->stok;
                    $post->updated_at   = date('Y-m-d H:i:s');
                    $post->save();
                    
                    $trans                      = new Transbaku ();
                    $trans-> baku_id     = $id;
                    $trans->jenis               = $request->jenis;
                    $trans->stok                = $request->stok;
                    $trans->user_id             = Auth::user()->id;
    
                    $trans->save();
                    
                    return back()->with('succes', 'Stok barang berhasil diupdate');
                }
            }
        }else{
            
            if ($request->jenis == "Transaksi Masuk Kosmetik"){
                $data = Baku :: where('id',$id)->first();
                $plus               = Baku::findOrFail($id);
                $plus->kosmetik     = $data->kosmetik + $request->stok;
                $plus->updated_at   = date('Y-m-d H:i:s');
                $plus->save();
                $trans                      = new Transbaku ();
                $trans-> baku_id      = $id;
                $trans->jenis               = $request->jenis;
                $trans->stok                = $request->stok;
                $trans->user_id             = Auth::user()->id;
                $trans->save();
                return back()->with('succes', 'Stok barang berhasil diupdate');
            }else if ($request->jenis == "Transaksi Masuk Pangan"){
                $data = Baku :: where('id',$id)->first();
                $plus               = Baku::findOrFail($id);
                $plus->pangan       = $data->pangan + $request->stok;
                $plus->updated_at   = date('Y-m-d H:i:s');
                $plus->save();
                $trans                      = new Transbaku ();
                $trans-> baku_id      = $id;
                $trans->jenis               = $request->jenis;
                $trans->stok                = $request->stok;
                $trans->user_id             = Auth::user()->id;
                $trans->save();
                return back()->with('succes', 'Stok barang berhasil diupdate');
            }else if ($request->jenis == "Transaksi Masuk OT"){
                $data = Baku :: where('id',$id)->first();
                $plus               = Baku::findOrFail($id);
                $plus->ot           = $data->ot + $request->stok;
                $plus->updated_at   = date('Y-m-d H:i:s');
                $plus->save();
                $trans                      = new Transbaku ();
                $trans-> baku_id      = $id;
                $trans->jenis               = $request->jenis;
                $trans->stok                = $request->stok;
                $trans->user_id             = Auth::user()->id;
                $trans->save();
                return back()->with('succes', 'Stok barang berhasil diupdate');
            }else if ($request->jenis == "Transaksi Masuk Mikro"){
                $data = Baku :: where('id',$id)->first();
                $plus               = Baku::findOrFail($id);
                $plus->mikro       = $data->mikro + $request->stok;
                $plus->updated_at   = date('Y-m-d H:i:s');
                $plus->save();
                $trans                      = new Transbaku ();
                $trans-> baku_id    = $id;
                $trans->jenis               = $request->jenis;
                $trans->stok                = $request->stok;
                $trans->user_id             = Auth::user()->id;
                $trans->save();
                return back()->with('succes', 'Stok barang berhasil diupdate');
            }else if ($request->jenis == "Transaksi Masuk Obat"){
                $data = Baku :: where('id',$id)->first();
                $plus               = Baku::findOrFail($id);
                $plus->obat         = $data->obat + $request->stok;
                $plus->updated_at   = date('Y-m-d H:i:s');
                $plus->save();
                $trans                      = new Transbaku ();
                $trans-> baku_id      = $id;
                $trans->jenis               = $request->jenis;
                $trans->stok                = $request->stok;
                $trans->user_id             = Auth::user()->id;
                $trans->save();
                return back()->with('succes', 'Stok barang berhasil diupdate');
            }
        }         
    }
    public function bakue($id){
        $data = Baku :: findOrFail($id);
        return view ('sinonim.baku.bakue',['baku'=>$data]);
    }
    public function bakuu(Request $request, $id){
        $validator = Validator::make($request->all(), [
            "nama"      => "required",  
            "bobot"  => "required",
            "no_kontrol"  => "required",
        ]);

       $nama = $request->nama;
        $no_kontrol = $request->no_kontrol;
        $bobot = $request->bobot;

        $cek = Baku :: where('id','!=',$id)->where('nama','=',$nama)->where('no_kontrol','=',$no_kontrol)->where('bobot','=',$bobot)->first();
        if(empty($cek)){
        $post               = Baku::findOrFail($id);
        $post->nama         = $request->nama;
        $post->no_kontrol   = $request->no_kontrol;
        $post->bobot        = $request->bobot;
        $post->updated_at   = date('Y-d-m H:i:s');
        $post->save();
        return back()->with('succes', 'Data berhasil diupdate');
        }else{
            return back()->with('unsuccess','Data tidak dapat diupdate, Data Baku Pembanding suda ada');
        }
    }
    public function bakud($id){
        $kuan = Baku::findOrFail($id);
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
        $rekap = Rekapbaku :: where('bulan','=', $month)->where('tahun','=', $year)->take(1)->first();
        if(!empty($rekap)){
            return back()->with('unsuccess','Data rekap untuk bulan terakhir suda ada');
        }else{
            $dataa = Baku :: get();
            foreach ($dataa as $item){
                $post = Baku::findOrFail($item->id);
                $post->s_kosmetik         = $item->kosmetik;
                $post->s_pangan           = $item->pangan;
                $post->s_ot               = $item->ot;
                $post->s_mikro            = $item->mikro;
                $post->s_obat             = $item->obat;
                $post->save();
            }
            $transaksi = Transbaku :: whereMonth('created_at',$month)->whereYear('created_at', $year)->get();
            $data = Baku :: get();
            // Rekap Kosmetik
            foreach ($data as $item){
                $trans                      = new Rekapbaku ();
                $trans-> no_kontrol         = $item->no_kontrol;
                $trans-> nama               = $item->nama;
                $trans-> bobot              = $item->bobot;
                    $hasil1 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->baku_id){
                            if($tran->jenis == 'Transaksi Keluar/Pecah Kosmetik'){
                                $hasil1 = $hasil1 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> pecah              = $hasil1;
                    $hasil2 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->baku_id){
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
                $trans                      = new Rekapbaku ();
                $trans-> no_kontrol         = $item->no_kontrol;
                $trans-> nama               = $item->nama;
                $trans-> bobot              = $item->bobot;
                    $hasil1 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->baku_id){
                            if($tran->jenis == 'Transaksi Keluar/Pecah Pangan'){
                                $hasil1 = $hasil1 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> pecah              = $hasil1;
                    $hasil2 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->baku_id){
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
                $trans                      = new Rekapbaku ();
                $trans-> no_kontrol         = $item->no_kontrol;
                $trans-> nama               = $item->nama;
                $trans-> bobot              = $item->bobot;
                    $hasil1 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->baku_id){
                            if($tran->jenis == 'Transaksi Keluar/Pecah OT'){
                                $hasil1 = $hasil1 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> pecah              = $hasil1;
                    $hasil2 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->baku_id){
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
                $trans                      = new Rekapbaku ();
                $trans-> no_kontrol         = $item->no_kontrol;
                $trans-> nama               = $item->nama;
                $trans-> bobot              = $item->bobot;
                $trans-> awal               = 0;
                    $hasil1 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->baku_id){
                            if($tran->jenis == 'Transaksi Keluar/Pecah Mikro'){
                                $hasil1 = $hasil1 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> pecah              = $hasil1;
                    $hasil2 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->baku_id){
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
                $trans                      = new Rekapbaku ();
                $trans-> no_kontrol         = $item->no_kontrol;
                $trans-> nama               = $item->nama;
                $trans-> bobot              = $item->bobot;
                $trans-> awal               = 0;
                    $hasil1 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->baku_id){
                            if($tran->jenis == 'Transaksi Keluar/Pecah Obat'){
                                $hasil1 = $hasil1 + $tran->stok;
                                
                            }
                        }
                    }
                $trans-> pecah              = $hasil1;
                    $hasil2 = 0;                    
                    foreach($transaksi as $tran){
                        if($item->id == $tran->baku_id){
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
        return view('sinonim.baku.baku_formc');
    }
    public function bakucetak(Request $request){
        $validator = Validator::make($request->all(), [
            "lab"            => "required",  
            "bulan"         => "required",
            "tahun"          => "required",
        ]);
        $lab    = $request->lab;
        $bulan  = $request->bulan;
        $tahun  = $request->tahun; 

        if($lab=='All'){
            $data = Rekapbaku :: where('bulan','=',$bulan)->where('tahun','=',$tahun)->get();             
        }else{
            $data = Rekapbaku :: where('lab','=',$lab)->where('bulan','=',$bulan)->where('tahun','=',$tahun)->get(); 
        }
        return view('sinonim.baku.bakuc',['baku'=>$data,'lab'=>$lab]);
    }
}
