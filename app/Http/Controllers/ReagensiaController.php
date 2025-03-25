<?php

namespace App\Http\Controllers;

use App\Models\Reagensia;
use App\Models\Rekapreagen;
use App\Models\Transreagensia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ReagensiaController extends Controller
{
    public function reagensia(){
        return view('sinonim.reagensia.reagensia');
    }
    public function reagensias(Request $request){
        $validator = Validator::make($request->all(), [
            "nama"      => "required",  
            "kataloq"  => "required",
            "netto"  => "required",
            "stok"  => "required|number"
        ]);
        $nama = $request->nama;
        $kataloq = $request->kataloq;
        $netto = $request->netto;

        $cek = Reagensia :: where('nama','=',$nama)->where('kataloq','=',$kataloq)->where('netto','=',$netto)->first();
        if(empty($cek)){
        $post               = new Reagensia ();
        $post->nama         = $request->nama;
        $post->kataloq      = $request->kataloq;
        $post->netto        = $request->netto;
        $post->stok         = $request->stok;
        $post->save();
        return back()->with('succes', 'Data berhasil diinput');
        }else{
            return back()->with('unsuccess','Data Reagensia suda ada');
        }
    }
    public function reagensiav(){
        $data = Reagensia :: get();
        return view ('sinonim/reagensia/reagensiav',['agen'=> $data]);
    }
    public function reagensiae($id){
        $data = Reagensia :: findOrFail($id);
        return view ('sinonim.reagensia.reagensiae',['agen'=>$data]);
    }
    public function reagensiau(Request $request, $id){
        $validator = Validator::make($request->all(), [
            "nama"      => "required",  
            "kataloq"  => "required",
            "netto"  => "required",
        ]);
        $nama = $request->nama;
        $kataloq = $request->kataloq;
        $netto = $request->netto;

        $cek = Reagensia :: where('id','!=',$id)->where('nama','=',$nama)->where('kataloq','=',$kataloq)->where('netto','=',$netto)->first();
        if(empty($cek)){
        $post               = Reagensia::findOrFail($id);
        $post->nama         = $request->nama;
        $post->kataloq      = $request->kataloq;
        $post->netto        = $request->netto;
        $post->updated_at   = date('Y-m-d H:i:s');
        $post->save();

        return back()->with('succes', 'Data berhasil diupdate');
        }else{
        return back()->with('unsuccess','Data tidak dapat diupdate, Data Reagensia suda ada');
        }
    }
  
    public function reagensiatrans(Request $request){
        $validator = Validator::make($request->all(), [
            "id"            => "required",  
            "jenis"         => "required",
            "stok"          => "required",
        ]);
        $id = $request-> id;
        if($request->jenis != "Transaksi Masuk"){
        $data = Reagensia :: where('id',$id)->first();
            if($data->stok <= 0){
                return back()->with('unsucces', 'Stok barang telah habis, Transaksi keluar tidak bisa dilakukan');
            }elseif ($data->stok-$request->stok<0){
                return back()->with('unsucces', 'Stok permintaan lebih besar dari stok tersedia, Transaksi keluar tidak bisa dilakukan');
            }else{
                $post               = Reagensia::findOrFail($id);
                $post->stok         = $data->stok - $request->stok;
                $post->updated_at   = date('Y-m-d H:i:s');
                $post->save();
                
                $trans                  = new Transreagensia ();
                $trans-> reagensia_id   = $id;
                $trans->jenis           = $request->jenis;
                $trans->stok            = $request->stok;
                $trans->user_id         = Auth::user()->id;

                $trans->save();
                
                return back()->with('succes', 'Stok barang berhasil diupdate');
            }
        }else{
            $data = Reagensia :: where('id',$id)->first();
            $plus               = Reagensia::findOrFail($id);
            $plus->stok         = $data->stok + $request->stok;
            $plus->updated_at   = date('Y-m-d H:i:s');
            $plus->save();
            $trans                  = new Transreagensia ();
            $trans-> reagensia_id   = $id;
            $trans->jenis           = $request->jenis;
            $trans->stok            = $request->stok;
            $trans->user_id         = Auth::user()->id;
            $trans->save();
            return back()->with('succes', 'Stok barang berhasil diupdate');
        }            
    }
    public function reagensiatransv($id){
        $data['data'] = Transreagensia::where('reagensia_id',$id)->get();
        $data['id']=$id;
        return view('sinonim.reagensia.trans_reagensiav',['trans'=>$data]);
    }
    public function reagensiatransi($id){
        $data= Reagensia::where('id',$id)->first();
        return view('sinonim.reagensia.trans_reagensia',['data'=>$data]);
    }
    public function reagensiad($id){
        $mikro = Reagensia::findOrFail($id);
        $mikro->delete();
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
        //  echo $datenow;
         
        // echo $date->isoFormat('Y');
        $rekap = Rekapreagen :: where('bulan','=', $month)->where('tahun','=', $year)->take(1)->first();
        if(!empty($rekap)){
            return back()->with('unsuccess','Data rekap untuk bulan terakhir suda ada');
        }else{
            $data = Reagensia :: get();
            foreach($data as $item){
                $reagen             = new Rekapreagen();
                $reagen-> nama      = $item-> nama;
                $reagen-> kataloq   = $item-> kataloq;
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
        return view('sinonim.reagensia.reagen_formc');
    }
    public function reagencetak(Request $request){
        $validator = Validator::make($request->all(), [
            "bulan"         => "required",
            "tahun"          => "required",
        ]);
        $bulan  = $request->bulan;
        $tahun  = $request->tahun; 
        $data = Rekapreagen :: where('bulan','=',$bulan)->where('tahun','=',$tahun)->get();             
        return view('sinonim.reagensia.reagensiac',['reagen'=>$data]);
    }
}


