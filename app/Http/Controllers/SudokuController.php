<?php

namespace App\Http\Controllers;

use App\Models\Detailrevisilvla;
use App\Models\Formulirlvlb;
use App\Models\Formulirlvlc;
use App\Models\Instrumenlvlb;
use App\Models\Instrumenlvlc;
use App\Models\Makrolvla;
use App\Models\Makrolvlb;
use App\Models\Makrolvlc;
use App\Models\Makrolvld;
use App\Models\Makrolvle;
use App\Models\Manualorg;
use App\Models\Manualorgdetail;
use App\Models\Mikrolvlb;
use App\Models\Mikrolvlc;
use App\Models\Mutulvla;
use App\Models\Ptllvla;
use App\Models\Sudokustorage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SudokuController extends Controller
{
    public function index(){
        return view('sudoku.index');
    }
    public function man_orgv(){
        $data = Manualorg::get();
        return view('sudoku.manual-organisasi.man_orgv',['data'=>$data]);
    }
    public function man_orgi(){
        return view('sudoku.manual-organisasi.man_orgi');
    }
    public function man_org_store(Request $request){
        $request -> validate([
            'klausul' => ['required','min:1','unique:sudoku_manual_orgs'],
            'judul' => 'required',
            'filepdf' => 'mimes:pdf'
        ]);

        $up = Manualorg::get();
        foreach($up as $item){
            if($item->file && file_exists(public_path().$item->file)){
                unlink(public_path().$item->file);
            }
            
            $path = public_path().'/storage/manual-organisasi/';
            $file1 = $request->filepdf;
            $filename1 = "/storage/manual-organisasi/".time().$file1->getClientOriginalName();
            $item->file = $filename1;
            $item->save();
        }
        
        $mo                     = new Manualorg();       
        $mo->klausul            = $request->klausul;
        $mo->judul              = $request->judul;
        $mo->user_id            = Auth::user()->id;

       
       
        if($request->filepdf!= ''){        
            $path = public_path().'/storage/manual-organisasi/';

             //upload new file
             $file1 = $request->filepdf;
             $filename1 = "/storage/manual-organisasi/".time().$file1->getClientOriginalName();
             $file1->move($path, $filename1);
             $mo->file = $filename1;

        }
       
        $status = $mo->save();
        if($status){
            return back()->with('success', 'Data berhasil diinput');
        }else{
            return back()->with('unsuccess', 'Data gagal diinput');
        }

    }
    public function view_file($id){
        $data = Manualorg::where('id',$id)->first('file');
        return view('sudoku.priview_file',['data'=>$data]);
    }
    public function manOrgDetailV($id){
        $data = Manualorgdetail::where('sudoku_manual_org_id',$id)->get();
        $data_id = Manualorg::where('id',$id)->first('id');
        return view('sudoku.manual-organisasi.detail_judulv',['data'=>$data],['data_id'=>$data_id]);
    }
    public function detailJudul($id){
        $data = Manualorg::where('id',$id)->first();
        return view('sudoku.manual-organisasi.detail_juduli',['data'=>$data]);
    }
    public function manOrgJudulStore(Request $request,$id){
        $request -> validate([
            'judul' => 'required',
        ]);
        $dt = \Carbon\Carbon::now();
        $mod = new Manualorgdetail();
       
        $mod->user_id               = Auth::user()->id;
        $mod->sudoku_manual_org_id  = $id;
        $mod->klausul               = $request->klausul;
        $mod->no_dokumen            = $request->no_dokumen;
        $mod->judul                 = $request->judul;
        $status = $mod->save();
        $new_id = $mod->id;

        if($status){
            $mo = Manualorg::findOrFail($id);
            if($request->filepdf!= ''){        
                $path = public_path().'/storage/manual-organisasi/';
    
                $up = Manualorg::get();
                foreach($up as $item){
                    if($item->file && file_exists(public_path().$item->file)){
                        unlink(public_path().$item->file);
                    }
                    
                    $file1 = $request->filepdf;
                    $filename1 = "/storage/manual-organisasi/".time().$file1->getClientOriginalName();
                    $item->file = $filename1;
                    $item->save();
                }
    
                //upload new file
                $file1 = $request->filepdf;
                $filename1 = "/storage/manual-organisasi/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $mo->file = $filename1;
    
            }
            $mo->save();
            
            $rev = new Detailrevisilvla();
            $rev->user_id               = Auth::user()->id;
            $rev->kategori              = 1;
            $rev->judul_id              = $new_id;
            if(date('Y/m/d',strtotime($request->tgl_terbit))!='-0001/11/30'){
                $rev->tgl_terbit  =  date('Y/m/d',strtotime($request->tgl_terbit));
             }else{
                $rev->tgl_terbit  = $dt->toDateString();
            }
            $rev->waktu                 = 1;
            $rev->revisi                = 1;
            $rev->save();
        }


        if($status){
            return back()->with('success', 'Data berhasil diinput');
        }else{
            return back()->with('unsuccess', 'Data gagal diinput');
        }
    }
    public function destroy($id){
        $data = Manualorg::where('id',$id)->first();
        $status = $data -> delete();
        if($data && file_exists(public_path().$data->file)){
            unlink(public_path().$data->file);
        }
        if($status){
            session () ->flash('succes','Data berhasil dihapus');
            return back();
        }else{
            session () ->flash('succes','Data gagal dihapus');
            return back();
        }
    }
    public function destroyJudul($id){
        $data = Manualorgdetail::where('id',$id)->first();
        $status = $data -> delete();
        if($status){
            session () ->flash('succes','Data berhasil dihapus');
            return back();
        }else{
            session () ->flash('succes','Data gagal dihapus');
            return back();
        }
    }
    public function revisiDetail($lvla,$id,$cat){
        $data = Detailrevisilvla :: where('judul_id',$id)->where('kategori',$cat)->get();
        return view('sudoku.manual-organisasi.detail_revisiv',['data'=>$data],['data_id'=>$id, 'lvla'=>$lvla, 'cat'=>$cat]);
    }
    public function revisiInput($lvla,$id,$cat){
        $data = Manualorgdetail::where('id',$id)->first();
        return view('sudoku.manual-organisasi.detail_revisii',['data'=>$data],['lvla'=>$lvla,'cat'=>$cat]);
    }
    public function revisiStore(Request $request,$lvla,$id,$cat){
        $isi = Detailrevisilvla :: where('judul_id','=',$id)->get();
        $max_revisi = 0;
        foreach ($isi as $item){
            if($max_revisi < $item->revisi){
                $max_revisi = $item->revisi;
            }
        }
        $dt = \Carbon\Carbon::now();
        $rev = new Detailrevisilvla();
        $rev->user_id               = Auth::user()->id;
        $rev->kategori              = $cat;
        $rev->judul_id              = $id;
        if(date('Y/m/d',strtotime($request->tgl_terbit))!='-0001/11/30'){
            $rev->tgl_terbit  =  date('Y/m/d',strtotime($request->tgl_terbit));
         }else{
            $rev->tgl_terbit  = $dt->toDateString();
        }
        $rev->waktu                 = 1;
        $rev->revisi                = $max_revisi+1;
        $status = $rev->save();

        if($status){
            $mo = Manualorg::findOrFail($lvla);
            if($request->filepdf!= ''){        
                $path = public_path().'/storage/manual-organisasi/';
    
                 $up = Manualorg::get();
                foreach($up as $item){
                    if($item->file && file_exists(public_path().$item->file)){
                        unlink(public_path().$item->file);
                    }
                    
                    $file1 = $request->filepdf;
                    $filename1 = "/storage/manual-organisasi/".time().$file1->getClientOriginalName();
                    $item->file = $filename1;
                    $item->save();
                }
    
                //upload new file
                $file1 = $request->filepdf;
                $filename1 = "/storage/manual-organisasi/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $mo->file = $filename1;
    
            }
            $mo->save();
        }
        if($status){
            session () ->flash('success','Data berhasil dihapus');
            return back();
        }else{
            session () ->flash('success','Data gagal dihapus');
            return back();
        }
    }
     public function storage(){
        $data = Sudokustorage :: orderBy('id', 'DESC')->take(500)->get();
        return view('sudoku.storage_view',['data'=>$data]);
    }
    public function storageAdd(){
        return view('sudoku.storage');
    }
    public function storageStore(Request $request){
        $request -> validate([
            'nama' => ['required'],
            'file' => ['required','mimes:pdf,doc,docx']
        ]);

        $data = new Sudokustorage();
            if($request->file != ''){        
                $path = public_path().'/storage/sudoku-storage/';

                //upload new file
                $file = $request->file;
                $filename1 = "/storage/sudoku-storage/".time().$file->getClientOriginalName();
                $file->move($path, $filename1);
                $data->file     = $filename1;
                $data->ket      = $request->ket;
                $data->nama_file     = $request->nama;
                $data->user_id  = Auth::user()-> id;
            }
        $data->save();
        session () ->flash('success','Data berhasil disimpan');
        return back();
    }
    public function download($id){
        ob_end_clean();
        return Storage::download('/sudoku-storage/'.$id);
    }
    public function delete($id){
        $data = Sudokustorage :: where('id',$id)->first();
        if(Auth::user()-> id == $data->user_id){
            $data_delete = Sudokustorage :: find($id);
        
            if($data_delete->file && file_exists(public_path().$data_delete->file)){
                unlink(public_path().$data_delete->file);
            }
            $data_delete->delete();
            session () ->flash('success','Data berhasil terdelete');
            return back();
        }
        return back();
    }
        public function didIntern(){
        $lvla = Makrolvla :: get(['id','kode_proses','nm_proses']);
        $lvlb = Makrolvlb :: get(['id','proses_id','kode_sub_pro','nm_sub_pro']);
        $lvlc = Makrolvlc :: get(['id','sub_proses_id','kode_peta','nm_peta']);
        $lvld = Makrolvld :: get(['id','peta_id','kode_sop','judul_sop']);
        $lvle = Makrolvle :: get(['id','sop_id','tgl_terbit','revisi','waktu']);
        $lvlam = Mikrolvlb :: join('sudoku_mikro_lvl_a','sudoku_mikro_lvl_b.kode_makro','=','sudoku_mikro_lvl_a.kode_makro')->get(['sudoku_mikro_lvl_b.id','sudoku_mikro_lvl_a.kode_makro','sudoku_mikro_lvl_b.kode_mikro','sudoku_mikro_lvl_b.judul_sop']);
        $lvlcm = Mikrolvlc :: get(['id','kode_mikro','tgl_terbit','revisi','waktu']);
        return view('sudoku.did_int',['lvla'=>$lvla,'lvlb'=>$lvlb,'lvlc'=>$lvlc,'lvld'=>$lvld,'lvle'=>$lvle,'lvlam'=>$lvlam,'lvlcm'=>$lvlcm]);
    }
    public function didInternBpom(){
        $lvla = Mikrolvlb :: get(['id','kode_mikro','judul_sop']);
        $lvlaf = Formulirlvlb :: get();
        $lvlbf = Formulirlvlc :: get();
        return view('sudoku.did_int_mks',['lvla'=>$lvla,'lvlaf'=>$lvlaf,'lvlbf'=>$lvlbf]);

    }
    public function didInternBpom17025(){
        $lvlaptl = Ptllvla :: get(['id','ptl_kode','judul']); 
        $lvlapjml = Mutulvla :: get(['id','mutu_kode','judul']);  
        $lvlbint = Instrumenlvlb :: get(['id','instrumen_kode','mutu_kode','judul_sop']);
        $lvlcint = Instrumenlvlc :: get(['id','instrumen_kode','tgl_terbit','revisi','waktu']);
        $lvldf = Formulirlvlb :: get(['id','formulir_kode','induk_kode','judul_sop']);
        $lvlef = Formulirlvlc :: get(['id','formulir_kode','tgl_terbit','revisi','waktu']);
        return view('sudoku.did_int_mks_17025',['lvlapjml'=>$lvlapjml,'lvlaptl'=>$lvlaptl,'lvlbint'=>$lvlbint,'lvlcint'=>$lvlcint,'lvldf'=>$lvldf,'lvlef'=>$lvlef]);
    }
}
