<?php

namespace App\Http\Controllers;

use App\Models\Formulirlvla;
use App\Models\Formulirlvlb;
use App\Models\Instrumenlvla;
use App\Models\Instrumenlvlb;
use App\Models\Mutulvla;
use App\Models\Mutulvlb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MutuController extends Controller
{
    public function mutuLvlA(){
        $mutu = Mutulvla :: get();
        return view('sudoku.mutu-laboratorium.lvlav',['mutu'=>$mutu]);
    }
    public function mutuLvlAInput(){
        return view('sudoku.mutu-laboratorium.lvlai');
    }
    public function mutuLvlAStore(Request $request){
        $request -> validate([
            'no_dokumen' => ['required'],
            'judul' => ['required'],
            'tgl_terbit' => ['required'],
            'file' => ['required','mimes:pdf'],
        ]);
        $data = Mutulvla :: where('mutu_kode',$request->no_dokumen)->where('judul',$request->judul)->first();
        if($data){
            session () ->flash('unsuccess','Kode Mutu Lab. suda ada');
            return $this->mutuLvlA();
            // return back();
        }else{
            $lvla = new Mutulvla();
            $lvla-> mutu_kode   = $request->no_dokumen;
            $lvla-> judul       = $request->judul;
            $lvla-> user_id     = Auth::user()->id;
        
            if($request->file!= ''){        
                $path = public_path().'/storage/mutu-laboratorium/';
                //upload new file
                $file1 = $request->file;
                $filename1 = "/storage/mutu-laboratorium/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $lvla->file = $filename1;
    
            }
            $status = $lvla->save();
            $new_id = $lvla->id;
                if($status){
                    $rev = new Mutulvlb();
                    $rev -> mutu_kode   = $new_id;
                    $rev->tgl_terbit    = $request->tgl_terbit;
                    $rev->waktu         = 1;
                    $rev->revisi        = 1;
                    $rev->user_id       = Auth::user()->id;
                    $rev->save();
                    session () ->flash('success','Data berhasil disimpan');
                    // return back();
                    return $this->mutuLvlA();
                }else{
                    session () ->flash('unsuccess','Data gagal disimpan');
                    // return back();
                    return $this->mutuLvlA();
                }
        }
    }
    public function view_file($id){
        $data = Mutulvla::where('id',$id)->first('file');
        return view('sudoku.priview_file',['data'=>$data]);
        
    }
    public function lvlADestroy($id){
        $data = Mutulvla :: findOrFail($id); 
        $status = $data->delete();
        if($data->file && file_exists(public_path().$data->file)){
            // unlink(public_path().$data->file);
        }
        Mutulvlb ::where('mutu_kode', $id)->delete();
        
        if($status){
            session () ->flash('success','Data Berhasil Dihapus');
            return $this->mutuLvlA();
        }else{
            session () ->flash('unsuccess','Data gagal Dihapus');
            return $this->mutuLvlA();
        }
    }
    public function pjmlLvlAEdit($id){
        $data = Mutulvla::where('id',$id)->first();
        return view('sudoku.mutu-laboratorium.lvlae',['data'=>$data]);
    }
    public function pjmlLvlAUpdate(Request $request, $id){
        $request -> validate([
            'kode' =>  'required',
            'nama' => 'required'
            
        ]);
        $data1 = Mutulvla :: where('mutu_kode','=', $request->kode)->Where('judul','=',$request->nama)->first(); 
        if($data1){
            session () ->flash('unsuccess','Kode atau Judul PJML telah ada sebelumnya');
            return back();
        }else{
            $lvla = Mutulvla ::findOrFail($id);
            $lvladefault = $lvla->mutu_kode;
            $lvla -> mutu_kode = $request->kode;
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
                            return $this->mutuLvlA();
                        }
                    }
                }else{
                    session () ->flash('success','Data Sukses Diedit');
                    return $this->mutuLvlA();
                }

            }else{
                session () ->flash('unsuccess','Data Gagal Diedit');
                return $this->mutuLvlA();
            }
        }
    }
    public function mutuLvlB($id){
        $lvlb = Mutulvlb :: where('mutu_kode','=',$id)->get();
        $data = Mutulvla ::where('id',$id)->first('mutu_kode');
        return view('sudoku.mutu-laboratorium.lvlbv',['lvlb'=>$lvlb,'proses_id'=>$id,'kode'=>$data]);
    }
    public function mutuLvlBInput($id){
        $data = Mutulvla ::where('id',$id)->first();
        return view('sudoku.mutu-laboratorium.lvlbi',['mutu'=>$id,'kode'=>$data]);
    }
    public function lvlBDestroy($id){
        $data = Mutulvlb :: findOrFail($id); 
        $status = $data->delete();
        if($status){
            session () ->flash('success','Data Berhasil Dihapus');
            return $this->mutuLvlA();
        }else{
            session () ->flash('unsuccess','Data gagal Dihapus');
            return $this->mutuLvlA();
        }
    }
    public function mutuLvlBStore(Request $request, $id){
       
        $request -> validate([
            'tgl_terbit' => 'required',
            'file' => 'mimes:pdf'
        ]);

        $lvlb = new Mutulvlb();
        $lvlb -> user_id        = Auth::user()->id;
        $lvlb -> mutu_kode      = $id;
        $lvlb -> tgl_terbit     = $request->tgl_terbit;
        $lvlb -> waktu          = $request->waktu;

        // get max value revisi
        $data = Mutulvlb :: where('mutu_kode','=',$id)->get();
        $maxrev =  $data -> max('revisi');

        $lvlb -> revisi     = $maxrev + 1;
        $status = $lvlb ->save();

        if($status){
            if($request->file!= ''){  
                $path = public_path().'/storage/mutu-laboratorium/';

                $mutu = Mutulvla :: where('id', '=', $id)->first();
                if($mutu->file && file_exists(public_path().$mutu->file)){
                    // unlink(public_path().$mutu->file);
                }
                
                $file1 = $request->file;
                $filename1 = "/storage/mutu-laboratorium/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $mutu->file = $filename1;
                $mutu->save();
                session () ->flash('success','Data berhasil disimpan');
                return $this->mutuLvlA();

            }else{
                session () ->flash('unsuccess','File pdf tidak ditemukan');
                return $this->mutuLvlA();
            }
        }else{
            session () ->flash('unsuccess','Input data gagal');
            return $this->mutuLvlA();
        }
    }
    public function editRevisi($id,){
        $rev = Mutulvlb :: where('id',$id)->first();
        return view('sudoku.mutu-laboratorium.lvlbedit',['id'=>$rev]);
    }
    public function updateRevisi(Request $request, $id){
        $request -> validate([
            'tgl_terbit' => 'required',
            'no_rev' => 'required',
        ]);
        $lvlc = Mutulvlb :: where('id',$id)->first();
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
