<?php

namespace App\Http\Controllers;

use App\Models\Reagensia;
use App\Models\Ulpk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;

class UlpkController extends Controller
{
    public function index(){
        return view('seppulo.index');
    }
    public function formulpk(){
        return view('seppulo.ulpk.formulpk');
    }
    public function store(Request $request){
        $request -> validate([
            'nama' => ['required'],
            'alamat' => ['required']
        ]);
        $dt = Carbon::now();
        $post                   = new Ulpk();
        $post->nama             = $request->nama ;
          if(date('Y/m/d',strtotime($request->tgl_lapor))!='-0001/11/30'){
            $post->tgl_lapor  =  date('Y/m/d',strtotime($request->tgl_lapor));
            }else{
            $post->tgl_lapor  = $dt->toDateString();
            }
        $post->umur             = $request->umur ? :"-";
        $post->kelamin          = $request->kelamin;
        $post->alamat           = $request->alamat;
        $post->hp               = $request->hp ? :"-";
        $post->email            = $request->email ? :"-";
        $post->perusahaan       = $request->perusahaan ? :"-";
        $post->pekerjaan        = $request->pekerjaan ? :"-";
        $post->jenis            = "-";
        $post->layanan          = "-";
        $post->jawaban          = "-";
        $post->komoditi         = "-";
        $post->user_id          = Auth::user()->id;
        $post->petugas          = "-";
        $post->sarana           = "-";
        $post->rujuk            = 0;
        $post->save();
        $id = $post->id;
        return view('seppulo.ulpk.formulpkk',['idn'=> $id]);
    }
    public function updateulpk(Request $request){
        $request -> validate([
            'layanan' => ['required'],
            'jawaban' => ['required']
        ]);
        $post                   = ulpk::findOrFail($request->id);
        $post->jenis            = $request->jenis;
        $post->layanan          = $request->layanan;
        $post->jawaban          = $request->jawaban;
        $post->komoditi         = $request->komoditi;
        $post->user_id          = Auth::user()->id;
        $post->petugas          = $request->petugas ? :"-";
        $post->sarana           = $request->sarana;
        $post->rujuk            = $request->rujuk;
        $post->updated_at       = date('Y-m-d H:i:s');
        $post->save();
        return redirect('/formulpk')->with('succes', 'Data konsumen berhasil diinput');
    }
    public function laporanulpk(){
        $data = Ulpk::orderBy('id', 'DESC')->take(500)->get();
        return view('seppulo.ulpk.laporan',['konsumen'=>$data]);
    }
    public function ulpkdetail($id){
        $data = Ulpk::where('id',$id)->first();
        return view('seppulo.ulpk.detail',['ulpk'=>$data]);
    }
    public function edit($id){
        $data = Ulpk::where('id',$id)->first();
        return view('seppulo.ulpk.editulpk',['ulpk'=>$data]);
    }
    public function update(Request $request,$id){
        $request -> validate([
            'nama' => ['required'],
            'alamat' => ['required']
        ]);
        $post                   = ulpk::findOrFail($request->id);
        $post->nama             = $request->nama ;
        $post->umur             = $request->umur ? :"-";
        $post->kelamin          = $request->kelamin;
        $post->alamat           = $request->alamat;
        $post->hp               = $request->hp ? :"-";
        $post->email            = $request->email ? :"-";
        $post->perusahaan       = $request->perusahaan ? :"-";
        $post->pekerjaan        = $request->pekerjaan ? :"-";
        $post->save();

        $data = Ulpk::where('id',$id)->first();
        return view('seppulo.ulpk.editulpkk',['ulpk'=> $data]);
    }
    public function updatee(Request $request,$id){
        $request -> validate([
            'layanan' => ['required'],
            'jawaban' => ['required']
        ]);
        $post                   = ulpk::findOrFail($request->id);
        $post->jenis            = $request->jenis;
        $post->layanan          = $request->layanan;
        $post->jawaban          = $request->jawaban;
        $post->komoditi         = $request->komoditi;
        $post->petugas          = $request->petugas ? :"-";
        $post->sarana           = $request->sarana;
        $post->rujuk            = $request->rujuk;
        $post->updated_at       = date('Y-m-d H:i:s');
        $post->save();

        $data = Ulpk::where('id',$id)->first();
        return view('seppulo.ulpk.detail',['ulpk'=>$data])->with('succes', 'Data konsumen berhasil diupdate');
    }
    public function formcetak(Request $request){
        
    // $bulan = $request -> bulan;
        // $tahun = $request -> tahun;
        $select = $request -> tahun.'-'.$request -> bulan;
        $customPaper = array(0,0,1920,1080);

        $data = Ulpk::where('tgl_lapor', 'like', '%' . $select . '%')->get();
        $pdf = FacadePdf::loadView('seppulo.ulpk.cetak',['ulpk'=>$data, 'bulan'=>$select]);
        return $pdf->setOptions(['defaultFont' => 'serif'])->setPaper($customPaper)->stream();
    }
    public function cetak(){
        
        return view('seppulo.ulpk.formcetak');
    }
    public function ulpk(){
        return view('seppulo.ulpk.ulpk');
    }
    public function delete($id){
        $ulpk = Ulpk::findOrFail($id);
        $ulpk->delete();
        
        return redirect()->back()->with('succes','Delete Laporan Berhasil');
    }
}
