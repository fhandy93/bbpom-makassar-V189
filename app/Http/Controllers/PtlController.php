<?php

namespace App\Http\Controllers;

use App\Models\Formulirlvla;
use App\Models\Formulirlvlb;
use App\Models\Instrumenlvla;
use App\Models\Instrumenlvlb;
use App\Models\Ptllvla;
use App\Models\Ptllvlb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PtlController extends Controller
{
    public function ptlLvlA(){
        $ptl = Ptllvla :: get();
        return view('sudoku.ptl.lvlav',['ptl'=>$ptl]);
    }
    public function ptlLvlAInput(){
        return view('sudoku.ptl.lvlai');
    }
    public function ptlLvlAStore(Request $request){
        $request -> validate([
            'no_dokumen' => ['required'],
            'judul' => ['required'],
            'tgl_terbit' => ['required'],
            'file' => ['required','mimes:pdf'],
        ]);
        $data = Ptllvla :: where('ptl_kode',$request->no_dokumen)->where('judul',$request->judul)->first();
        if($data){
            session () ->flash('unsuccess','Kode Pedoman Teknis/Judul Pedoman suda ada');
            return $this->ptlLvlA();
            // return back();
        }else{
            $lvla = new Ptllvla();
            $lvla-> ptl_kode    = $request->no_dokumen;
            $lvla-> judul       = $request->judul;
            $lvla-> user_id     = Auth::user()->id;
        
            if($request->file!= ''){        
                $path = public_path().'/storage/ptl/';
                //upload new file
                $file1 = $request->file;
                $filename1 = "/storage/ptl/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $lvla->file = $filename1;
    
            }
            $status = $lvla->save();
            $new_id = $lvla->id;
                if($status){
                    $rev = new Ptllvlb();
                    $rev -> ptl_kode   = $new_id;
                    $rev->tgl_terbit    = $request->tgl_terbit;
                    $rev->waktu         = 1;
                    $rev->revisi        = 1;
                    $rev->user_id       = Auth::user()->id;
                    $rev->save();
                    session () ->flash('success','Data berhasil disimpan');
                    // return back();
                    return $this->ptlLvlA();
                }else{
                    session () ->flash('unsuccess','Data gagal disimpan');
                    // return back();
                    return $this->ptlLvlA();
                }
        }
    }
    public function ptlLvlB($id){
        $lvlb = Ptllvlb :: where('ptl_kode','=',$id)->get();
        $data = Ptllvla ::where('id',$id)->first('ptl_kode');
        return view('sudoku.ptl.lvlbv',['lvlb'=>$lvlb,'proses_id'=>$id,'kode'=>$data]);
    }
    public function ptlLvlBInput($id){
        $data = Ptllvla ::where('id',$id)->first();
        return view('sudoku.ptl.lvlbi',['ptl'=>$id,'kode'=>$data]);
    }
    public function ptlLvlBStore(Request $request, $id){
       
        $request -> validate([
            'tgl_terbit' => 'required',
            'file' => 'mimes:pdf'
        ]);

        $lvlb = new Ptllvlb();
        $lvlb -> user_id        = Auth::user()->id;
        $lvlb -> ptl_kode      = $id;
        $lvlb -> tgl_terbit     = $request->tgl_terbit;
        $lvlb -> waktu          = $request->waktu;

        // get max value revisi
        $data = Ptllvlb :: where('ptl_kode','=',$id)->get();
        $maxrev =  $data -> max('revisi');

        $lvlb -> revisi     = $maxrev + 1;
        $status = $lvlb ->save();

        if($status){
            if($request->file!= ''){  
                $path = public_path().'/storage/ptl/';

                $ptl = Ptllvla :: where('id', '=', $id)->first();
                if($ptl->file && file_exists(public_path().$ptl->file)){
                    unlink(public_path().$ptl->file);
                }
                
                $file1 = $request->file;
                $filename1 = "/storage/ptl/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $ptl->file = $filename1;
                $ptl->save();
                session () ->flash('success','Data berhasil disimpan');
                return $this->ptlLvlA();

            }else{
                session () ->flash('unsuccess','File pdf tidak ditemukan');
                return $this->ptlLvlA();
            }
        }else{
            session () ->flash('unsuccess','Input data gagal');
            return $this->ptlLvlA();
        }
    }
    public function lvlADestroy($id){
        $data = Ptllvla :: findOrFail($id); 
        $status = $data->delete();
        if($data->file && file_exists(public_path().$data->file)){
            unlink(public_path().$data->file);
        }
        Ptllvlb ::where('ptl_kode', $id)->delete();
        
        if($status){
            session () ->flash('success','Data Berhasil Dihapus');
            return $this->ptlLvlA();
        }else{
            session () ->flash('unsuccess','Data gagal Dihapus');
            return $this->ptlLvlA();
        }
    }
    public function lvlBDestroy($id){
        $data = Ptllvlb :: findOrFail($id); 
        $status = $data->delete();
        if($status){
            session () ->flash('success','Data Berhasil Dihapus');
            return $this->ptlLvlA();
        }else{
            session () ->flash('unsuccess','Data gagal Dihapus');
            return $this->ptlLvlA();
        }
    }
    public function ptlLvlBEdit($id){
        $data = Ptllvla::where('id',$id)->first();
        return view('sudoku.ptl.lvlae',['data'=>$data]);
    }
    public function ptlLvlBUpdate(Request $request, $id){
        $request -> validate([
            'kode' =>  'required',
            'nama' => 'required'
            
        ]);
        $data1 = Ptllvla :: where('ptl_kode','=', $request->kode)->Where('judul','=',$request->nama)->first(); 
        if($data1){
            session () ->flash('unsuccess','Kode atau Judul PTL telah ada sebelumnya');
            return back();
        }else{
            $lvla = Ptllvla ::findOrFail($id);
            $lvladefault = $lvla->ptl_kode;
            $lvla -> ptl_kode = $request->kode;
            $lvla -> judul = $request->nama;
            $sts_a = $lvla -> save();
            if($sts_a){
                $data2 = Instrumenlvla :: where('mutu_kode','=',$lvladefault)->get(['id','mutu_kode']);
                if(!$data2->isEmpty()){
                    foreach ($data2 as $item1){
                        $lvlb = Instrumenlvla ::findOrFail($item1->id);
                        $lvlb -> mutu_kode = $request->kode;
                        $sts_b = $lvlb -> save();
                        if($sts_b){
                            $data3 = Instrumenlvlb :: where('mutu_kode','=',$lvladefault)->get(['id','instrumen_kode','mutu_kode']);
                            if(!$data3->isEmpty()){
                                foreach ($data3 as $item2){
                                    $lvlc = Instrumenlvlb ::findOrFail($item2->id);
                                    $lvlc -> mutu_kode = $request->kode;
                                    $lvlc -> save();
                                }
                            }
                        }
                    }
                }
                $data4 = Formulirlvla :: where('induk_kode','=',$lvladefault)->get(['id','induk_kode']);
                $numItems = count($data4);
                $i = 0;
                if(!$data4->isEmpty()){
                    foreach ($data4 as $item3){
                        $lvld = Formulirlvla ::findOrFail($item3->id);
                        $lvld -> induk_kode = $request->kode;
                        $sts_d = $lvld -> save();
                        if($sts_d){
                            $data5 = Formulirlvlb :: where('induk_kode','=',$lvladefault)->get(['id','formulir_kode','induk_kode']);
                            if($data5){
                                foreach ($data5 as $item4){
                                    $lvle = Formulirlvlb ::findOrFail($item4->id);
                                    $lvle -> induk_kode = $request->kode;
                                    $lvle -> save();
                                }
                            }
                        }
                        if(++$i === $numItems) {
                            session () ->flash('success','Data Sukses Diedit');
                            return $this->ptlLvlA();
                        }
                    }
                }else{
                    session () ->flash('success','Data Sukses Diedit');
                    return $this->ptlLvlA();
                }
            }else{
                session () ->flash('unsuccess','Data Gagal Diedit');
                return $this->ptlLvlA();
            }
        }
    }
    public function view_file($id){
        $data = Ptllvla::where('id',$id)->first('file');
        return view('sudoku.priview_file',['data'=>$data]);
        
    }
        public function editRevisi($id,){
        $rev = Ptllvlb :: where('id',$id)->first();
        return view('sudoku.ptl.lvlbedit',['id'=>$rev]);
    }
    public function updateRevisi(Request $request, $id){
        $request -> validate([
            'tgl_terbit' => 'required',
            'no_rev' => 'required',
        ]);
        $lvlc = Ptllvlb :: where('id',$id)->first();
        $lvlc -> tgl_terbit = $request->tgl_terbit;
        $lvlc -> waktu      = $request->waktu;
        $lvlc -> revisi     = $request->no_rev;
        $status = $lvlc -> save();
        if($status){
            session () ->flash('success','Update data berhasil');
            return back();
        }else{
            session () ->flash('unsuccess','Update data gagal');
            return back();
        }
    }

}
