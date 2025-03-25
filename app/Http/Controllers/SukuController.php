<?php

namespace App\Http\Controllers;

use App\Models\Rekapsuku;
use App\Models\Suku;
use App\Models\Transsuku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class SukuController extends Controller
{
    public function sukuv(){
        $data = Suku::get();
        return view('sinonim.suku.sukuv',['suku'=>$data]);
    }
    public function suku(){
        return view('sinonim.suku.suku');
    }
    public function sukus(Request $request){
        $validator = Validator::make($request->all(), [
            "nama"      => "required",  
            "no_apl"  => "required",
            "kataloq"  => "required",
            "stok"  => "required|number"
        ]);
        $nama = $request->nama;
        $kataloq = $request->kataloq;
        $no_apl = $request->no_apl;

        $cek = Suku :: where('nama','=',$nama)->where('kataloq','=',$kataloq)->where('no_apl','=',$no_apl)->first();
        if(empty($cek)){
        $post               = new Suku ();
        $post->no_apl       = $request->no_apl;
        $post->nama         = $request->nama;
        $post->kataloq      = $request->kataloq;
        $post->stok         = $request->stok;
        $post->netto         = $request->netto;
        $post->save();
        return back()->with('succes', 'Data berhasil diinput');
        }else{
            return back()->with('unsuccess','Data Suku Cadang suda ada');
        }
    }
    public function sukutransv($id){
        $data['data'] = Transsuku::where('suku_id',$id)->get();
        $data['id']=$id;
        return view('sinonim.suku.trans_sukuv',['trans'=>$data]);
    }
    public function sukutransi($id){
        $data= Suku::where('id',$id)->first();
        return view('sinonim.suku.trans_suku',['data'=>$data]);
    }
    public function sukutrans(Request $request){
        $validator = Validator::make($request->all(), [
            "id"            => "required",  
            "jenis"         => "required",
            "stok"          => "required",
        ]);
        $id = $request-> id;
        if($request->jenis != "Transaksi Masuk"){
        $data = Suku :: where('id',$id)->first();
            if($data->stok <= 0){
                return back()->with('unsucces', 'Stok barang telah habis, Transaksi keluar tidak bisa dilakukan');
            }elseif ($data->stok-$request->stok<0){
                return back()->with('unsucces', 'Stok permintaan lebih besar dari stok tersedia, Transaksi keluar tidak bisa dilakukan');
            }else{
                $post               = Suku::findOrFail($id);
                $post->stok         = $data->stok - $request->stok;
                $post->updated_at   = date('Y-m-d H:i:s');
                $post->save();
                
                $trans                      = new Transsuku ();
                $trans-> suku_id            = $id;
                $trans->jenis               = $request->jenis;
                $trans->stok                = $request->stok;
                $trans->user_id             = Auth::user()->id;

                $trans->save();
                
                return back()->with('succes', 'Stok barang berhasil diupdate');
            }
        }else{
            $data = Suku :: where('id',$id)->first();
            $plus               = Suku::findOrFail($id);
            $plus->stok         = $data->stok + $request->stok;
            $plus->updated_at   = date('Y-m-d H:i:s');
            $plus->save();
            $trans                      = new Transsuku ();
            $trans-> suku_id            = $id;
            $trans->jenis               = $request->jenis;
            $trans->stok                = $request->stok;
            $trans->user_id             = Auth::user()->id;
            $trans->save();
            return back()->with('succes', 'Stok barang berhasil diupdate');
        }            
    }
    public function sukue($id){
        $data = Suku :: findOrFail($id);
        return view ('sinonim.suku.sukue',['suku'=>$data]);
    }
    public function sukuu(Request $request, $id){
        $validator = Validator::make($request->all(), [
            "nama"      => "required",  
            "no_apl"  => "required",
            "kataloq"  => "required",
        ]);
        $nama = $request->nama;
        $kataloq = $request->kataloq;
        $no_apl = $request->no_apl;

        $cek = Suku :: where('id','!=',$id)->where('nama','=',$nama)->where('kataloq','=',$kataloq)->where('no_apl','=',$no_apl)->first();
        if(empty($cek)){
            $post               = Suku::findOrFail($id);
            $post->nama         = $request->nama;
            $post->no_apl       = $request->no_apl;
            $post->kataloq      = $request->kataloq;
            $post->netto         = $request->netto;
            $post->updated_at   = date('Y-d-m H:i:s');
            $post->save();

            return back()->with('succes', 'Data berhasil diupdate');
        }else{
            return back()->with('unsuccess','Data tidak dapat diupdate, Data Suku Cadang suda ada');
        }
    }
    public function sukud($id){
        $kuan = Suku::findOrFail($id);
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
        $rekap = Rekapsuku :: where('bulan','=', $month)->where('tahun','=', $year)->take(1)->first();
        if(!empty($rekap)){
            return back()->with('unsuccess','Data rekap untuk bulan terakhir suda ada');
        }else{
            $data = Suku :: get();
            foreach($data as $item){
                $reagen             = new Rekapsuku();
                $reagen-> nama      = $item-> nama;
                $reagen-> kataloq   = $item-> kataloq;
                $reagen-> no_apl    = $item-> no_apl;
                $reagen-> stok      = $item-> stok;
                $reagen-> bulan     = $month;
                $reagen-> tahun     = $year;
                $reagen->save();
                
            }
            return back()->with('succes','Data Stok Akhir Bulanan telah diinput');
        }
    }
    public function formc(){
        return view('sinonim.suku.suku_formc');
    }
    public function sukucetak(Request $request){
        $validator = Validator::make($request->all(), [
            "bulan"         => "required",
            "tahun"          => "required",
        ]);
        $bulan  = $request->bulan;
        $tahun  = $request->tahun; 
        $data = Rekapsuku :: where('bulan','=',$bulan)->where('tahun','=',$tahun)->get();             
        return view('sinonim.suku.sukuc',['suku'=>$data]);
    }
}
