<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Reagensia;
use App\Models\Ulpk;
use App\Models\UlpkV2;
use App\Models\User;
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
        $v = 'V.1';
        return view('seppulo.ulpk.laporan',['konsumen'=>$data,'v'=>$v]);
    }
    public function ulpkdetail($id){
        $data = Ulpk::where('id',$id)->first();
        $v = 1;
        return view('seppulo.ulpk.detail',['ulpk'=>$data,'v'=>$v]);
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

        // $data = Ulpk::where('id',$id)->first();
        // return view('seppulo.ulpk.detail',['ulpk'=>$data])->with('succes', 'Data konsumen berhasil diupdate');
        return $this->ulpk();
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
    public function formulir(){
        $data = User :: where('isactive',1)->get(['id','name']); 
        return view('seppulo.ulpk.form',['user'=>$data]);
    }
    public function ulpkStore(Request $req){
        $req -> validate([
            'nama' => ['required'],
            'alamat' => ['required'],
            'layanan' => ['required'],
            'jawaban' => ['required'],
            'hp' => ['required'],
            'email' => ['required'],
            'perusahaan' => ['required'],
        ],[
            'nama' => 'Kolom Nama harap diisi',
            'alamat' => 'Kolom Alamat harap diisi',
            'layanan' => 'Kolom Layanan harap diisi',
            'jawaban' => 'Kolom Jawaban harap diisi',
            'hp' => 'Kolom HP/Telp harap diisi',
            'email' => 'Kolom Email harap diisi',
            'perusahaan' => 'Kolom Perusahaan/Instansi harap diisi',
        ]);

        $post                   = new UlpkV2();
        $post->nama             = $req->nama ;
        $post->tgl_lapor        = Carbon::createFromFormat('d/m/Y', $req->tgl_terima)->format('Y-m-d');
        $post->umur             = $req->umur;
        $post->kelamin          = $req->kelamin;
        $post->alamat           = $req->alamat;
        $post->hp               = $req->hp;
        $post->email            = $req->email;
        $post->perusahaan       = $req->perusahaan;
        $post->pekerjaan        = $req->pekerjaan;
        $post->jenis            = $req->jenis;
        $post->layanan          = $req->layanan;
        $post->jawaban          = $req->jawaban;
        $post->komoditi         = $req->komoditi;
        if($req->petugas == "-"){
            $post->petugas2_id      = null;
        }else{
            $post->petugas2_id      = $req->petugas;
        }
        $post->petugas1_id      = Auth::user()->id;
        $post->sarana           = $req->sarana;
        $post->rujuk            = $req->rujuk;
        $post->save();
        return redirect()->route('ulpk.lapv2')->with('success', 'Data berhasil diinput');
    }
    public function laporanUlpkv2(){
        $data = UlpkV2::orderBy('id', 'DESC')->get();
        $v = 'V.2';
        return view('seppulo.ulpk.laporan',['konsumen'=>$data,'v'=>$v]);
    }
    public function filterV1(Request $req){
        $v = 'V.1';
         if($req->tahun == 'Pilih Tahun' && $req->bulan=='Pilih Bulan'){
            $data = Ulpk :: whereYear('tgl_lapor', '=', date('Y'))
            ->orderBy('id', 'DESC')
            ->get();
            return view('seppulo.ulpk.laporan',['konsumen'=>$data,'v'=>$v]);
        }else if($req->tahun == 'Pilih Tahun'){
            $data = Ulpk :: whereMonth('tgl_lapor', '=', $req->bulan)
            ->orderBy('id', 'DESC')
            ->get();
            return view('seppulo.ulpk.laporan',['konsumen'=>$data,'v'=>$v]);
        }else if($req->bulan=='Pilih Bulan'){               
            $data = Ulpk :: whereYear('tgl_lapor', '=', $req->tahun)
            ->orderBy('id', 'DESC')
            ->get();
            return view('seppulo.ulpk.laporan',['konsumen'=>$data,'v'=>$v]);
        }else{
            $data = Ulpk :: whereYear('tgl_lapor', '=', $req->tahun)
            ->whereMonth('tgl_lapor', '=', $req->bulan)
            ->orderBy('id', 'DESC')
            ->get();
            return view('seppulo.ulpk.laporan',['konsumen'=>$data,'v'=>$v]);
        }
    }
    public function filterV2(Request $req){
        $v = 'V.2';
         if($req->tahun == 'Pilih Tahun' && $req->bulan=='Pilih Bulan'){
            $data = UlpkV2 :: whereYear('tgl_lapor', '=', date('Y'))
            ->orderBy('id', 'DESC')
            ->get();
            return view('seppulo.ulpk.laporan',['konsumen'=>$data,'v'=>$v]);
        }else if($req->tahun == 'Pilih Tahun'){
            $data = UlpkV2 :: whereMonth('tgl_lapor', '=', $req->bulan)
            ->orderBy('id', 'DESC')
            ->get();
            return view('seppulo.ulpk.laporan',['konsumen'=>$data,'v'=>$v]);
        }else if($req->bulan=='Pilih Bulan'){               
            $data = UlpkV2 :: whereYear('tgl_lapor', '=', $req->tahun)
            ->orderBy('id', 'DESC')
            ->get();
            return view('seppulo.ulpk.laporan',['konsumen'=>$data,'v'=>$v]);
        }else{
            $data = UlpkV2 :: whereYear('tgl_lapor', '=', $req->tahun)
            ->whereMonth('tgl_lapor', '=', $req->bulan)
            ->orderBy('id', 'DESC')
            ->get();
            return view('seppulo.ulpk.laporan',['konsumen'=>$data,'v'=>$v]);
        }
    }
    public function ulpkDetailV2($id){
        $data = UlpkV2::where('id',$id)->first();
        $v = 2;
        return view('seppulo.ulpk.detail',['ulpk'=>$data,'v'=>$v]);
    }
    public function editUlpk($id){
        $user = User :: where('isactive',1)->get(['id','name']); 
        $data = UlpkV2::where('id',$id)->first();
        return view('seppulo.ulpk.formedit',['ulpk'=>$data,'user'=>$user]);
    }
    public function ulpkUpdate(Request $req, $id){
        $req -> validate([
            'nama' => ['required'],
            'alamat' => ['required'],
            'layanan' => ['required'],
            'jawaban' => ['required'],
            'hp' => ['required'],
            'email' => ['required'],
            'perusahaan' => ['required'],
        ],[
            'nama' => 'Kolom Nama harap diisi',
            'alamat' => 'Kolom Alamat harap diisi',
            'layanan' => 'Kolom Layanan harap diisi',
            'jawaban' => 'Kolom Jawaban harap diisi',
            'hp' => 'Kolom HP/Telp harap diisi',
            'email' => 'Kolom Email harap diisi',
            'perusahaan' => 'Kolom Perusahaan/Instansi harap diisi',
        ]);

        echo $post              = UlpkV2 :: findOrFail($id);
        $post->nama             = $req->nama ;
        $post->tgl_lapor        = Carbon::createFromFormat('d/m/Y', $req->tgl_terima)->format('Y-m-d');
        $post->umur             = $req->umur;
        $post->kelamin          = $req->kelamin;
        $post->alamat           = $req->alamat;
        $post->hp               = $req->hp;
        $post->email            = $req->email;
        $post->perusahaan       = $req->perusahaan;
        $post->pekerjaan        = $req->pekerjaan;
        $post->jenis            = $req->jenis;
        $post->layanan          = $req->layanan;
        $post->jawaban          = $req->jawaban;
        $post->komoditi         = $req->komoditi;
        if($req->petugas == "-"){
            $post->petugas2_id      = null;
        }else{
            $post->petugas2_id      = $req->petugas;
        }
        $post->sarana           = $req->sarana;
        $post->rujuk            = $req->rujuk;
        $post->save();
        return redirect()->route('ulpk.lapv2')->with('success', 'Data berhasil diupdate');
    }
    public function download(){
        $data = User :: where('isactive',1)->get(['id','name']); 
        return view('seppulo.ulpk.formdownload',['user'=>$data]);
    }
    public function downProses(Request $req){
        ini_set('memory_limit', '512M');
        ini_set('max_execution_time', 300);
        $select = $req -> tahun.'-'.$req -> bulan;
        $customPaper = array(0,0,1920,1080);

        if($req->petugas == '-' && $req->komoditi == '-'){
            $data = UlpkV2::where('tgl_lapor', 'like', '%' . $select . '%')->get();
        }elseif($req->petugas != '-' && $req->komoditi == '-'){
            $data = UlpkV2::where('tgl_lapor', 'like', '%' . $select . '%')->where(function ($query) use ($req) {
                $query->where('petugas1_id', $req->petugas)
                ->orWhere('petugas2_id', $req->petugas);
            })->get();
        }elseif($req->petugas != '-' && $req->komoditi != '-'){
            $data = UlpkV2::where('tgl_lapor', 'like', '%' . $select . '%')
                ->where('komoditi',$req->komoditi)
                ->where(function ($query) use ($req) {
                $query->where('petugas1_id', $req->petugas)
                ->orWhere('petugas2_id', $req->petugas);
            })->get();
        }elseif($req->petugas == '-' && $req->komoditi != '-'){
            $data = UlpkV2::where('tgl_lapor', 'like', '%' . $select . '%')
                ->where('komoditi',$req->komoditi)
                ->get();
        }



        
        $pdf = FacadePdf::loadView('seppulo.ulpk.cetak2',['ulpk'=>$data, 'bulan'=>$select]);
        return $pdf->setOptions(['defaultFont' => 'serif'])->setPaper($customPaper)->stream();
    }
    public function sipintar($id){
        $data  = Layanan :: where('id',$id)->first();
        $user = User :: where('isactive',1)->get(['id','name']); 
        return view('seppulo.ulpk.formsipintar',['user'=>$user, 'data'=>$data]);
    }
}
