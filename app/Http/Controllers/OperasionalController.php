<?php

namespace App\Http\Controllers;

use App\Models\Operasional;
use App\Models\Rekapopera;
use App\Models\Transoperasional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class OperasionalController extends Controller
{
    public function operasionalv(){
        $data = Operasional::get();
        return view('sinonim.operasional.operasionalv',['opera'=>$data]);
    }
    public function operasional(){
        return view('sinonim.operasional.operasional');
    }
    public function operasionals(Request $request){
        $validator = Validator::make($request->all(), [
            "nama"      => "required",  
            "netto"  => "required",
            "stok"  => "required|number"
        ]);
        $nama = $request->nama;
        $netto = $request->netto;
        $cek = Operasional :: where('nama','=',$nama)->where('netto','=',$netto)->first();
        if(empty($cek)){
        $post               = new Operasional ();
        $post->nama         = $request->nama;
        $post->netto        = $request->netto;
        $post->stok         = $request->stok;
        $post->save();
        return back()->with('succes', 'Data berhasil diinput');
        }else{
            return back()->with('unsuccess','Data Operasional Pengujian suda ada');
        }
    }
    public function operasionaltransv($id){
        $data['data'] = Transoperasional::where('operasional_id',$id)->get();
        $data['id']=$id;
        return view('sinonim.operasional.trans_operasionalv',['trans'=>$data]);
    }
    public function operatransi($id){
        $data= Operasional::where('id',$id)->first();
        return view('sinonim.operasional.trans_operasional',['data'=>$data]);
    }
    public function operatrans(Request $request){
        $validator = Validator::make($request->all(), [
            "id"            => "required",  
            "jenis"         => "required",
            "stok"          => "required",
        ]);
        $id = $request-> id;
        if($request->jenis != "Transaksi Masuk"){
        $data = Operasional :: where('id',$id)->first();
            if($data->stok <= 0){
                return back()->with('unsucces', 'Stok barang telah habis, Transaksi keluar tidak bisa dilakukan');
            }elseif ($data->stok-$request->stok<0){
                return back()->with('unsucces', 'Stok permintaan lebih besar dari stok tersedia, Transaksi keluar tidak bisa dilakukan');
            }else{
                $post               = Operasional::findOrFail($id);
                $post->stok         = $data->stok - $request->stok;
                $post->updated_at   = date('Y-m-d H:i:s');
                $post->save();
                
                $trans                      = new Transoperasional ();
                $trans-> operasional_id     = $id;
                $trans->jenis               = $request->jenis;
                $trans->stok                = $request->stok;
                $trans->user_id             = Auth::user()->id;

                $trans->save();
                
                return back()->with('succes', 'Stok barang berhasil diupdate');
            }
        }else{
            $data = Operasional :: where('id',$id)->first();
            $plus               = Operasional::findOrFail($id);
            $plus->stok         = $data->stok + $request->stok;
            $plus->updated_at   = date('Y-m-d H:i:s');
            $plus->save();
            $trans                      = new Transoperasional ();
            $trans-> operasional_id     = $id;
            $trans->jenis               = $request->jenis;
            $trans->stok                = $request->stok;
            $trans->user_id             = Auth::user()->id;
            $trans->save();
            return back()->with('succes', 'Stok barang berhasil diupdate');
        }            
    }
    public function operasionale($id){
        $data = Operasional :: findOrFail($id);
        return view ('sinonim.operasional.operasionale',['opera'=>$data]);
    }
    public function operasionalu(Request $request, $id){
        $validator = Validator::make($request->all(), [
            "nama"      => "required",  
            "netto"  => "required",
        ]);
        $nama = $request->nama;
        $netto = $request->netto;
        $cek = Operasional :: where('id','!=',$id)->where('nama','=',$nama)->where('netto','=',$netto)->first();
        if(empty($cek)){
        $post               = Operasional::findOrFail($id);
        $post->nama         = $request->nama;
        $post->netto        = $request->netto;
        $post->updated_at   = date('Y-d-m H:i:s');
        $post->save();

        return back()->with('succes', 'Data berhasil diupdate');
        }else{
            return back()->with('unsuccess','Data tidak dapat diupdate, Data Operasional Pengujian suda ada');
        }
    }
    public function operasionald($id){
        $opera = Operasional::findOrFail($id);
        $opera->delete();
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
        $rekap = Rekapopera :: where('bulan','=', $month)->where('tahun','=', $year)->take(1)->first();
        if(!empty($rekap)){
            return back()->with('unsuccess','Data rekap untuk bulan terakhir suda ada');
        }else{
            $data = Operasional :: get();
            foreach($data as $item){
                $reagen             = new Rekapopera();
                $reagen-> nama      = $item-> nama;
                $reagen-> netto     = $item-> netto;
                $reagen-> stok      = $item-> stok;
                $reagen-> bulan     = $month;
                $reagen-> tahun     = $year;
                $reagen->save();
                
            }
            return back()->with('succes','Data Stok Akhir Bulanan telah diinput');
        }
    }
    public function formc(){
        return view('sinonim.operasional.opera_formc');
    }
    public function operacetak(Request $request){
        $validator = Validator::make($request->all(), [
            "bulan"         => "required",
            "tahun"          => "required",
        ]);
        $bulan  = $request->bulan;
        $tahun  = $request->tahun; 
        $data = Rekapopera :: where('bulan','=',$bulan)->where('tahun','=',$tahun)->get();             
        return view('sinonim.operasional.operasionalc',['opera'=>$data]);
    }
}
