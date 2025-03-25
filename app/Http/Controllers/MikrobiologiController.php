<?php

namespace App\Http\Controllers;

use App\Models\Mikrobiologi;
use App\Models\Rekapmikro;
use App\Models\Transmikrobiologi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class MikrobiologiController extends Controller
{
    public function mikrobiologiv(){
        $data = Mikrobiologi::get();
        return view('sinonim.mikrobiologi.mikrobiologiv',['mikro'=>$data]);
    }
    public function mikrobiologi(){
        return view('sinonim.mikrobiologi.mikrobiologi');
    }
    public function mikrobiologis(Request $request){
        $validator = Validator::make($request->all(), [
            "nama"      => "required",  
            "kataloq"  => "required",
            "netto"  => "required",
            "stok"  => "required|number"
        ]);
        $nama = $request->nama;
        $kataloq = $request->kataloq;
        $netto = $request->netto;

        $cek = Mikrobiologi :: where('nama','=',$nama)->where('kataloq','=',$kataloq)->where('netto','=',$netto)->first();
        if(empty($cek)){
        $post               = new Mikrobiologi ();
        $post->nama         = $request->nama;
        $post->kataloq      = $request->kataloq;
        $post->netto        = $request->netto;
        $post->exp          = $request->exp;
        $post->stok         = $request->stok;
        $post->save();
        return back()->with('succes', 'Data berhasil diinput');
        }else{
            return back()->with('unsuccess','Data Media Mikrobiologi suda ada');
        }
    }
    public function mikrobiologitransv($id){
        $data['data'] = Transmikrobiologi::where('mikrobiologi_id',$id)->get();
        $data['id']=$id;
        return view('sinonim.mikrobiologi.trans_mikrobiologiv',['trans'=>$data]);
    }
    public function mikrotransi($id){
        $data= Mikrobiologi::where('id',$id)->first();
        return view('sinonim.mikrobiologi.trans_mikrobiologi',['data'=>$data]);
    }
    public function mikrotrans(Request $request){
        $validator = Validator::make($request->all(), [
            "id"            => "required",  
            "jenis"         => "required",
            "stok"          => "required",
        ]);
        $id = $request-> id;
        if($request->jenis != "Transaksi Masuk"){
        $data = Mikrobiologi :: where('id',$id)->first();
            if($data->stok <= 0){
                return back()->with('unsucces', 'Stok barang telah habis, Transaksi keluar tidak bisa dilakukan');
            }elseif ($data->stok-$request->stok<0){
                return back()->with('unsucces', 'Stok permintaan lebih besar dari stok tersedia, Transaksi keluar tidak bisa dilakukan');
            }else{
                $post               = Mikrobiologi::findOrFail($id);
                $post->stok         = $data->stok - $request->stok;
                $post->updated_at   = date('Y-m-d H:i:s');
                $post->save();
                
                $trans                      = new Transmikrobiologi ();
                $trans-> mikrobiologi_id    = $id;
                $trans->jenis               = $request->jenis;
                $trans->stok                = $request->stok;
                $trans->user_id             = Auth::user()->id;

                $trans->save();
                
                return back()->with('succes', 'Stok barang berhasil diupdate');
            }
        }else{
            $data = Mikrobiologi :: where('id',$id)->first();
            $plus               = Mikrobiologi::findOrFail($id);
            $plus->stok         = $data->stok + $request->stok;
            $plus->updated_at   = date('Y-m-d H:i:s');
            $plus->save();
            $trans                      = new Transmikrobiologi ();
            $trans-> mikrobiologi_id    = $id;
            $trans->jenis               = $request->jenis;
            $trans->stok                = $request->stok;
            $trans->user_id             = Auth::user()->id;
            $trans->save();
            return back()->with('succes', 'Stok barang berhasil diupdate');
        }            
    }
    public function mikrobiologie($id){
        $data = Mikrobiologi :: findOrFail($id);
        return view ('sinonim.mikrobiologi.mikrobiologie',['mikro'=>$data]);
    }
    public function mikrobiologiu(Request $request, $id){
        $validator = Validator::make($request->all(), [
            "nama"      => "required",  
            "kataloq"  => "required",
            "netto"  => "required",
        ]);
        $nama = $request->nama;
        $kataloq = $request->kataloq;
        $netto = $request->netto;

        $cek = Mikrobiologi :: where('id','!=',$id)->where('nama','=',$nama)->where('kataloq','=',$kataloq)->where('netto','=',$netto)->first();
        if(empty($cek)){
            $post               = Mikrobiologi::findOrFail($id);
            $post->nama         = $request->nama;
            $post->kataloq      = $request->kataloq;
            $post->netto        = $request->netto;
            $post->exp          = $request->exp;
            $post->updated_at   = date('Y-d-m H:i:s');
            $post->save();

            return back()->with('succes', 'Data berhasil diupdate');
        }else{
            return back()->with('unsuccess','Data tidak dapat diupdate, Data Media Mikrobiologi suda ada');
        }
    }
    public function mikrobiologid($id){
        $mikro = Mikrobiologi::findOrFail($id);
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
        $rekap = Rekapmikro :: where('bulan','=', $month)->where('tahun','=', $year)->take(1)->first();
        if(!empty($rekap)){
            return back()->with('unsuccess','Data rekap untuk bulan terakhir suda ada');
        }else{
            $data = Mikrobiologi :: get();
            foreach($data as $item){
                $mikro             = new Rekapmikro();
                $mikro-> nama      = $item-> nama;
                $mikro-> kataloq   = $item-> kataloq;
                $mikro-> netto     = $item-> netto;
                $mikro-> exp       = $item-> exp;
                $mikro-> stok      = $item-> stok;
                $mikro-> bulan     = $month;
                $mikro-> tahun     = $year;
                $mikro->save();
                
            }
            return back()->with('succes','Data Stok Akhir Bulanan telah diinput');
        }
    }
    public function formc(){
        return view('sinonim.mikrobiologi.mikro_formc');
    }
    public function mikrocetak(Request $request){
        $validator = Validator::make($request->all(), [
            "bulan"         => "required",
            "tahun"          => "required",
        ]);
        $bulan  = $request->bulan;
        $tahun  = $request->tahun; 
        $data = Rekapmikro :: where('bulan','=',$bulan)->where('tahun','=',$tahun)->get();             
        return view('sinonim.mikrobiologi.mikrobiologic',['mikro'=>$data]);
    }
}
