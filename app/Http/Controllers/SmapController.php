<?php

namespace App\Http\Controllers;

use App\Models\Smaplvla;
use App\Models\Smaplvlb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SmapController extends Controller
{
    /*Pedoman*/

    public function pedomanLvlA(){
        $data = Smaplvla :: where('lvl', '=', 1)->get();
        return view('sudoku.smap-pedoman.lvlav',['data'=>$data]);
    }
    public function pedomanLvlAInput(){
        return view('sudoku.smap-pedoman.lvlai');
    }
    public function pedomanLvlAStore(Request $request){
        $request -> validate([
            'klausul' => ['required'],
            'no_dokumen' => ['required'],
            'judul' => ['required'],
            'tgl_terbit' => ['required'],
            'file' => ['required','mimes:pdf'],
        ]);
        $data = Smaplvla :: where('klausul',$request->klausul)
                            ->where('no_dokumen',$request->no_dokumen)
                            ->where('judul',$request->judul)
                            ->first();
        if($data){
            session () ->flash('unsuccess','Data Pedoman suda ada !');
            return $this->pedomanLvlA();
            // return back();
        }else{
            $lvla = new Smaplvla();
            $lvla-> lvl         = 1;
            $lvla-> klausul     = $request->klausul;
            $lvla-> no_dokumen   = $request->no_dokumen;
            $lvla-> judul       = $request->judul;
            $lvla-> user_id     = Auth::user()->id;
        
            if($request->file!= ''){        
                $path = public_path().'/storage/smap-pedoman/';
                //upload new file
                $file1 = $request->file;
                $filename1 = "/storage/smap-pedoman/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $lvla->file = $filename1;
    
            }
            $status = $lvla->save();
            $new_id = $lvla->id;
                if($status){
                    $rev = new Smaplvlb();
                    $rev -> smap_id     = $new_id;
                    $rev->tgl_terbit    = $request->tgl_terbit;
                    $rev->waktu         = 1;
                    $rev->revisi        = 1;
                    $rev->user_id       = Auth::user()->id;
                    $rev->save();
                    session () ->flash('success','Data berhasil disimpan');
                    // return back();
                    return $this->pedomanLvlA();
                }else{
                    session () ->flash('unsuccess','Data gagal disimpan');
                    // return back();
                    return $this->pedomanLvlA();
                }
        }
    }
    public function pedomanLvlB($id){
        $data = Smaplvlb :: where('smap_id','=',$id)
                                    ->join('sudoku_smap_lvl_a', 'sudoku_smap_lvl_a.id', '=', 'sudoku_smap_lvl_b.smap_id')
                                    ->get(['sudoku_smap_lvl_a.klausul','sudoku_smap_lvl_a.no_dokumen','sudoku_smap_lvl_a.judul','sudoku_smap_lvl_b.*']);
        // $induk = Smaplvla :: where('id','=',$id)->first(['klausul','no_dokumen']);
        return view('sudoku.smap-pedoman.lvlbv',['data'=>$data,'pedoman_id'=>$id]);
    }
    public function view_file($id){
        $data = Smaplvla::where('id',$id)->first('file');
        return view('sudoku.priview_file',['data'=>$data]);
    }
    public function pedomanLvlAEdit($id){
        $data = Smaplvla::where('id',$id)->first();
        return view('sudoku.smap-pedoman.lvlae',['data'=>$data]);
    }
    public function pedomanLvlAUpdate(Request $req, $id){
        $req -> validate([
            'klausul' =>  'required',
            'no_dokumen' => 'required',
            'judul' => 'required'
            
        ]);
        $data1 = Smaplvla :: where('klausul','=', $req->klausul)
                                    ->where('lvl','=',1)
                                    ->Where('no_dokumen','=',$req->no_dokumen)
                                    ->Where('judul','=',$req->judul)
                                    ->first(); 
        if($data1){
            session () ->flash('unsuccess','Klausul, No Dokumen atau Judul SMAP-Pedoman telah ada sebelumnya');
            return back();
        }else{
            $lvla = Smaplvla ::findOrFail($id);
            $lvla -> klausul = $req->klausul;
            $lvla -> no_dokumen = $req->no_dokumen;
            $lvla -> judul = $req->judul;
            $sts_a = $lvla -> save();
            if($sts_a){
                session () ->flash('success','Data Sukses Diedit');
                return $this->pedomanLvlA();
            }else{
                session () ->flash('unsuccess','Data Gagal Diedit');
                return $this->pedomanLvlA();
            }
        }
    }
    public function pedomanLvlADestroy($id){
        $data = Smaplvla :: findOrFail($id); 
        $status = $data->delete();
        if($data->file && file_exists(public_path().$data->file)){
            unlink(public_path().$data->file);
        }
        Smaplvlb ::where('smap_id', $id)->delete();
        
        if($status){
            session () ->flash('success','Data Berhasil Dihapus');
            return $this->pedomanLvlA();
        }else{
            session () ->flash('unsuccess','Data gagal Dihapus');
            return $this->pedomanLvlA();
        }
    }
    public function pedomanLvlBInput($id){
        $data = Smaplvla ::where('id',$id)->first();
        return view('sudoku.smap-pedoman.lvlbi',['id'=>$id,'data'=>$data]);
    }
    public function pedomanLvlBStore(Request $req,$id){
        
        $req -> validate([
            'tgl_terbit' => 'required',
            'file' => 'mimes:pdf'
        ]);

        $lvlb = new Smaplvlb();
        $lvlb -> user_id        = Auth::user()->id;
        $lvlb -> smap_id      = $id;
        $lvlb -> tgl_terbit     = $req->tgl_terbit;
        $lvlb -> waktu          = $req->waktu;

        // get max value revisi
        $data = Smaplvlb :: where('smap_id','=',$id)->get();
        $maxrev =  $data -> max('revisi');

        $lvlb -> revisi     = $maxrev + 1;
        $status = $lvlb ->save();

        if($status){
            if($req->file!= ''){  
                $path = public_path().'/storage/smap-pedoman/';

                $pedoman = Smaplvla :: where('id', '=', $id)->first();
                if($pedoman->file && file_exists(public_path().$pedoman->file)){
                    // unlink(public_path().$pedoman->file);
                }
                
                $file1 = $req->file;
                $filename1 = "/storage/smap-pedoman/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $pedoman->file = $filename1;
                $pedoman->save();
                session () ->flash('success','Data berhasil diupdate');
                return $this->pedomanLvlA();

            }else{
                session () ->flash('unsuccess','File pdf tidak ditemukan');
                return $this->pedomanLvlA();
            }
        }else{
            session () ->flash('unsuccess','Update data gagal');
            return $this->pedomanLvlA();
        }
    }
    public function pedomanLvlBEdit($id){
        $rev = Smaplvlb :: where('id',$id)->first();
        return view('sudoku.smap-pedoman.lvlbe',['id'=>$rev]);
    }
    public function pedomanLvlBUpdate(Request $req, $id){
        $req -> validate([
            'tgl_terbit' => 'required',
            'no_rev' => 'required',
        ]);
        $lvlb = Smaplvlb :: where('id',$id)->first();
        $lvlb -> tgl_terbit = $req->tgl_terbit;
        $lvlb -> waktu      = $req->waktu;
        $lvlb -> revisi     = $req->no_rev;
        $status = $lvlb -> save();
        if($status){
            session () ->flash('success','Update data berhasil');
            return $this->pedomanLvlA();
        }else{
            session () ->flash('unsuccess','Update data gagal');
            return $this->pedomanLvlA();
        }
    } 
    public function pedomanLvlBDestroy($id){
        $data = Smaplvlb :: findOrFail($id); 
        $status = $data->delete();
        if($status){
            session () ->flash('success','Data Berhasil Dihapus');
            return $this->pedomanLvlA();
        }else{
            session () ->flash('unsuccess','Data gagal Dihapus');
            return $this->pedomanLvlA();
        }
    }

    /*SOP*/
    public function sopLvlA(){
        $data = Smaplvla :: where('lvl', '=', 2)->get();
        return view('sudoku.smap-sop.lvlav',['data'=>$data]);
    }
    public function sopLvlAInput(){
        return view('sudoku.smap-sop.lvlai');
    }
    public function sopLvlAStore(Request $request){
        $request -> validate([
            'klausul' => ['required'],
            'no_dokumen' => ['required'],
            'judul' => ['required'],
            'tgl_terbit' => ['required'],
            'file' => ['required','mimes:pdf'],
        ]);
        $data = Smaplvla :: where('klausul',$request->klausul)
                            ->where('lvl','=',2)
                            ->where('no_dokumen',$request->no_dokumen)
                            ->where('judul',$request->judul)
                            ->first();
        if($data){
            session () ->flash('unsuccess','Data SOP suda ada !');
            return $this->sopLvlA();
            // return back();
        }else{
            $lvla = new Smaplvla();
            $lvla-> lvl         = 2;
            $lvla-> klausul     = $request->klausul;
            $lvla-> no_dokumen   = $request->no_dokumen;
            $lvla-> judul       = $request->judul;
            $lvla-> user_id     = Auth::user()->id;
        
            if($request->file!= ''){        
                $path = public_path().'/storage/smap-sop/';
                //upload new file
                $file1 = $request->file;
                $filename1 = "/storage/smap-sop/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $lvla->file = $filename1;
    
            }
            $status = $lvla->save();
            $new_id = $lvla->id;
                if($status){
                    $rev = new Smaplvlb();
                    $rev -> smap_id     = $new_id;
                    $rev->tgl_terbit    = $request->tgl_terbit;
                    $rev->waktu         = 1;
                    $rev->revisi        = 1;
                    $rev->user_id       = Auth::user()->id;
                    $rev->save();
                    session () ->flash('success','Data berhasil disimpan');
                    // return back();
                    return $this->sopLvlA();
                }else{
                    session () ->flash('unsuccess','Data gagal disimpan');
                    // return back();
                    return $this->sopLvlA();
                }
        }
    }
    public function sopLvlB($id){
        $data = Smaplvlb :: where('smap_id','=',$id)
                                    ->join('sudoku_smap_lvl_a', 'sudoku_smap_lvl_a.id', '=', 'sudoku_smap_lvl_b.smap_id')
                                    ->get(['sudoku_smap_lvl_a.klausul','sudoku_smap_lvl_a.no_dokumen','sudoku_smap_lvl_a.judul','sudoku_smap_lvl_b.*']);
        // $induk = Smaplvla :: where('id','=',$id)->first(['klausul','no_dokumen']);
        return view('sudoku.smap-sop.lvlbv',['data'=>$data,'sop_id'=>$id]);
    }
    public function sopLvlAEdit($id){
        $data = Smaplvla::where('id',$id)->first();
        return view('sudoku.smap-sop.lvlae',['data'=>$data]);
    }
    public function sopLvlAUpdate(Request $req, $id){
        $req -> validate([
            'klausul' =>  'required',
            'no_dokumen' => 'required',
            'judul' => 'required'
            
        ]);
        $data1 = Smaplvla :: where('klausul','=', $req->klausul)
                                    ->Where('no_dokumen','=',$req->no_dokumen)
                                    ->Where('judul','=',$req->judul)
                                    ->first(); 
        if($data1){
            session () ->flash('unsuccess','Klausul, No Dokumen atau Judul SMAP-SOP telah ada sebelumnya');
            return back();
        }else{
            $lvla = Smaplvla ::findOrFail($id);
            $lvla -> klausul = $req->klausul;
            $lvla -> no_dokumen = $req->no_dokumen;
            $lvla -> judul = $req->judul;
            $sts_a = $lvla -> save();
            if($sts_a){
                session () ->flash('success','Data Sukses Diedit');
                return $this->sopLvlA();
            }else{
                session () ->flash('unsuccess','Data Gagal Diedit');
                return $this->sopLvlA();
            }
        }
    }
    public function sopLvlADestroy($id){
        $data = Smaplvla :: findOrFail($id); 
        $status = $data->delete();
        if($data->file && file_exists(public_path().$data->file)){
            unlink(public_path().$data->file);
        }
        Smaplvlb ::where('smap_id', $id)->delete();
        
        if($status){
            session () ->flash('success','Data Berhasil Dihapus');
            return $this->sopLvlA();
        }else{
            session () ->flash('unsuccess','Data gagal Dihapus');
            return $this->sopLvlA();
        }
    }
    public function sopLvlBInput($id){
        $data = Smaplvla ::where('id',$id)->first();
        return view('sudoku.smap-sop.lvlbi',['id'=>$id,'data'=>$data]);
    }
    public function sopLvlBStore(Request $req,$id){
        
        $req -> validate([
            'tgl_terbit' => 'required',
            'file' => 'mimes:pdf'
        ]);

        $lvlb = new Smaplvlb();
        $lvlb -> user_id        = Auth::user()->id;
        $lvlb -> smap_id      = $id;
        $lvlb -> tgl_terbit     = $req->tgl_terbit;
        $lvlb -> waktu          = $req->waktu;

        // get max value revisi
        $data = Smaplvlb :: where('smap_id','=',$id)->get();
        $maxrev =  $data -> max('revisi');

        $lvlb -> revisi     = $maxrev + 1;
        $status = $lvlb ->save();

        if($status){
            if($req->file!= ''){  
                $path = public_path().'/storage/smap-sop/';

                $sop = Smaplvla :: where('id', '=', $id)->first();
                if($sop->file && file_exists(public_path().$sop->file)){
                    // unlink(public_path().$sop->file);
                }
                
                $file1 = $req->file;
                $filename1 = "/storage/smap-sop/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $sop->file = $filename1;
                $sop->save();
                session () ->flash('success','Data berhasil diupdate');
                return $this->sopLvlA();

            }else{
                session () ->flash('unsuccess','File pdf tidak ditemukan');
                return $this->sopLvlA();
            }
        }else{
            session () ->flash('unsuccess','Update data gagal');
            return $this->sopLvlA();
        }
    }
    public function sopLvlBEdit($id){
        $rev = Smaplvlb :: where('id',$id)->first();
        return view('sudoku.smap-sop.lvlbe',['id'=>$rev]);
    }
    public function sopLvlBUpdate(Request $req, $id){
        $req -> validate([
            'tgl_terbit' => 'required',
            'no_rev' => 'required',
        ]);
        $lvlb = Smaplvlb :: where('id',$id)->first();
        $lvlb -> tgl_terbit = $req->tgl_terbit;
        $lvlb -> waktu      = $req->waktu;
        $lvlb -> revisi     = $req->no_rev;
        $status = $lvlb -> save();
        if($status){
            session () ->flash('success','Update data berhasil');
            return $this->sopLvlA();
        }else{
            session () ->flash('unsuccess','Update data gagal');
            return $this->sopLvlAEditLvlA();
        }
    } 
    public function sopLvlBDestroy($id){
        $data = Smaplvlb :: findOrFail($id); 
        $status = $data->delete();
        if($status){
            session () ->flash('success','Data Berhasil Dihapus');
            return $this->sopLvlA();
        }else{
            session () ->flash('unsuccess','Data gagal Dihapus');
            return $this->sopLvlA();
        }
    }
     /*IK*/
      public function ikLvlA(){
        $data = Smaplvla :: where('lvl', '=', 3)->get();
        return view('sudoku.smap-ik.lvlav',['data'=>$data]);
    }
    public function ikLvlAInput(){
        return view('sudoku.smap-ik.lvlai');
    }
    public function ikLvlAStore(Request $request){
        $request -> validate([
            'klausul' => ['required'],
            'no_dokumen' => ['required'],
            'judul' => ['required'],
            'tgl_terbit' => ['required'],
            'file' => ['required','mimes:pdf'],
        ]);
        $data = Smaplvla :: where('klausul',$request->klausul)
                            ->where('lvl','=',3)
                            ->where('no_dokumen',$request->no_dokumen)
                            ->where('judul',$request->judul)
                            ->first();
        if($data){
            session () ->flash('unsuccess','Data IK suda ada !');
            return $this->ikLvlA();
            // return back();
        }else{
            $lvla = new Smaplvla();
            $lvla-> lvl         = 3;
            $lvla-> klausul     = $request->klausul;
            $lvla-> no_dokumen   = $request->no_dokumen;
            $lvla-> judul       = $request->judul;
            $lvla-> user_id     = Auth::user()->id;
        
            if($request->file!= ''){        
                $path = public_path().'/storage/smap-ik/';
                //upload new file
                $file1 = $request->file;
                $filename1 = "/storage/smap-ik/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $lvla->file = $filename1;
    
            }
            $status = $lvla->save();
            $new_id = $lvla->id;
                if($status){
                    $rev = new Smaplvlb();
                    $rev -> smap_id     = $new_id;
                    $rev->tgl_terbit    = $request->tgl_terbit;
                    $rev->waktu         = 1;
                    $rev->revisi        = 1;
                    $rev->user_id       = Auth::user()->id;
                    $rev->save();
                    session () ->flash('success','Data berhasil disimpan');
                    // return back();
                    return $this->ikLvlA();
                }else{
                    session () ->flash('unsuccess','Data gagal disimpan');
                    // return back();
                    return $this->ikLvlA();
                }
        }
    }
    public function ikLvlB($id){
        $data = Smaplvlb :: where('smap_id','=',$id)
                                    ->join('sudoku_smap_lvl_a', 'sudoku_smap_lvl_a.id', '=', 'sudoku_smap_lvl_b.smap_id')
                                    ->get(['sudoku_smap_lvl_a.klausul','sudoku_smap_lvl_a.no_dokumen','sudoku_smap_lvl_a.judul','sudoku_smap_lvl_b.*']);
        // $induk = Smaplvla :: where('id','=',$id)->first(['klausul','no_dokumen']);
        return view('sudoku.smap-ik.lvlbv',['data'=>$data,'ik_id'=>$id]);
    }
    public function ikLvlAEdit($id){
        $data = Smaplvla::where('id',$id)->first();
        return view('sudoku.smap-ik.lvlae',['data'=>$data]);
    }
    public function ikLvlAUpdate(Request $req, $id){
        $req -> validate([
            'klausul' =>  'required',
            'no_dokumen' => 'required',
            'judul' => 'required'
            
        ]);
        $data1 = Smaplvla :: where('klausul','=', $req->klausul)
                                    ->Where('no_dokumen','=',$req->no_dokumen)
                                    ->Where('judul','=',$req->judul)
                                    ->first(); 
        if($data1){
            session () ->flash('unsuccess','Klausul, No Dokumen atau Judul SMAP-IK telah ada sebelumnya');
            return back();
        }else{
            $lvla = Smaplvla ::findOrFail($id);
            $lvla -> klausul = $req->klausul;
            $lvla -> no_dokumen = $req->no_dokumen;
            $lvla -> judul = $req->judul;
            $sts_a = $lvla -> save();
            if($sts_a){
                session () ->flash('success','Data Sukses Diedit');
                return $this->ikLvlA();
            }else{
                session () ->flash('unsuccess','Data Gagal Diedit');
                return $this->ikLvlA();
            }
        }
    }
    public function ikLvlADestroy($id){
        $data = Smaplvla :: findOrFail($id); 
        $status = $data->delete();
        if($data->file && file_exists(public_path().$data->file)){
            unlink(public_path().$data->file);
        }
        Smaplvlb ::where('smap_id', $id)->delete();
        
        if($status){
            session () ->flash('success','Data Berhasil Dihapus');
            return $this->ikLvlA();
        }else{
            session () ->flash('unsuccess','Data gagal Dihapus');
            return $this->ikLvlA();
        }
    }
    public function ikLvlBInput($id){
        $data = Smaplvla ::where('id',$id)->first();
        return view('sudoku.smap-ik.lvlbi',['id'=>$id,'data'=>$data]);
    }
    public function ikLvlBStore(Request $req,$id){
        
        $req -> validate([
            'tgl_terbit' => 'required',
            'file' => 'mimes:pdf'
        ]);

        $lvlb = new Smaplvlb();
        $lvlb -> user_id        = Auth::user()->id;
        $lvlb -> smap_id      = $id;
        $lvlb -> tgl_terbit     = $req->tgl_terbit;
        $lvlb -> waktu          = $req->waktu;

        // get max value revisi
        $data = Smaplvlb :: where('smap_id','=',$id)->get();
        $maxrev =  $data -> max('revisi');

        $lvlb -> revisi     = $maxrev + 1;
        $status = $lvlb ->save();

        if($status){
            if($req->file!= ''){  
                $path = public_path().'/storage/smap-ik/';

                $ik = Smaplvla :: where('id', '=', $id)->first();
                if($ik->file && file_exists(public_path().$ik->file)){
                    // unlink(public_path().$ik->file);
                }
                
                $file1 = $req->file;
                $filename1 = "/storage/smap-ik/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $ik->file = $filename1;
                $ik->save();
                session () ->flash('success','Data berhasil diupdate');
                return $this->ikLvlA();

            }else{
                session () ->flash('unsuccess','File pdf tidak ditemukan');
                return $this->ikLvlA();
            }
        }else{
            session () ->flash('unsuccess','Update data gagal');
            return $this->ikLvlA();
        }
    }
    public function ikLvlBEdit($id){
        $rev = Smaplvlb :: where('id',$id)->first();
        return view('sudoku.smap-ik.lvlbe',['id'=>$rev]);
    }
    public function ikLvlBUpdate(Request $req, $id){
        $req -> validate([
            'tgl_terbit' => 'required',
            'no_rev' => 'required',
        ]);
        $lvlb = Smaplvlb :: where('id',$id)->first();
        $lvlb -> tgl_terbit = $req->tgl_terbit;
        $lvlb -> waktu      = $req->waktu;
        $lvlb -> revisi     = $req->no_rev;
        $status = $lvlb -> save();
        if($status){
            session () ->flash('success','Update data berhasil');
            return $this->ikLvlA();
        }else{
            session () ->flash('unsuccess','Update data gagal');
            return $this->ikLvlAEditLvlA();
        }
    } 
    public function ikLvlBDestroy($id){
        $data = Smaplvlb :: findOrFail($id); 
        $status = $data->delete();
        if($status){
            session () ->flash('success','Data Berhasil Dihapus');
            return $this->ikLvlA();
        }else{
            session () ->flash('unsuccess','Data gagal Dihapus');
            return $this->ikLvlA();
        }
    }
     /*Form*/

    public function formLvlA(){
        $data = Smaplvla :: where('lvl', '=', 4)->get();
        return view('sudoku.smap-form.lvlav',['data'=>$data]);
    }
    public function formLvlAInput(){
        return view('sudoku.smap-form.lvlai');
    }
    public function formLvlAStore(Request $request){
        $request -> validate([
            'klausul' => ['required'],
            'no_dokumen' => ['required'],
            'judul' => ['required'],
            'tgl_terbit' => ['required'],
            'file' => ['required','mimes:pdf'],
        ]);
        $data = Smaplvla :: where('klausul',$request->klausul)
                            ->where('lvl','=',1)
                            ->where('no_dokumen',$request->no_dokumen)
                            ->where('judul',$request->judul)
                            ->first();
        if($data){
            session () ->flash('unsuccess','Data form suda ada !');
            return $this->formLvlA();
            // return back();
        }else{
            $lvla = new Smaplvla();
            $lvla-> lvl         = 4;
            $lvla-> klausul     = $request->klausul;
            $lvla-> no_dokumen   = $request->no_dokumen;
            $lvla-> judul       = $request->judul;
            $lvla-> user_id     = Auth::user()->id;
        
            if($request->file!= ''){        
                $path = public_path().'/storage/smap-form/';
                //upload new file
                $file1 = $request->file;
                $filename1 = "/storage/smap-form/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $lvla->file = $filename1;
    
            }
            $status = $lvla->save();
            $new_id = $lvla->id;
                if($status){
                    $rev = new Smaplvlb();
                    $rev -> smap_id     = $new_id;
                    $rev->tgl_terbit    = $request->tgl_terbit;
                    $rev->waktu         = 1;
                    $rev->revisi        = 1;
                    $rev->user_id       = Auth::user()->id;
                    $rev->save();
                    session () ->flash('success','Data berhasil disimpan');
                    // return back();
                    return $this->formLvlA();
                }else{
                    session () ->flash('unsuccess','Data gagal disimpan');
                    // return back();
                    return $this->formLvlA();
                }
        }
    }
    public function formLvlB($id){
        $data = Smaplvlb :: where('smap_id','=',$id)
                                    ->join('sudoku_smap_lvl_a', 'sudoku_smap_lvl_a.id', '=', 'sudoku_smap_lvl_b.smap_id')
                                    ->get(['sudoku_smap_lvl_a.klausul','sudoku_smap_lvl_a.no_dokumen','sudoku_smap_lvl_a.judul','sudoku_smap_lvl_b.*']);
        // $induk = Smaplvla :: where('id','=',$id)->first(['klausul','no_dokumen']);
        return view('sudoku.smap-form.lvlbv',['data'=>$data,'form_id'=>$id]);
    }
    public function formLvlAEdit($id){
        $data = Smaplvla::where('id',$id)->first();
        return view('sudoku.smap-form.lvlae',['data'=>$data]);
    }
    public function formLvlAUpdate(Request $req, $id){
        $req -> validate([
            'klausul' =>  'required',
            'no_dokumen' => 'required',
            'judul' => 'required'
            
        ]);
        $data1 = Smaplvla :: where('klausul','=', $req->klausul)
                                    ->Where('no_dokumen','=',$req->no_dokumen)
                                    ->Where('judul','=',$req->judul)
                                    ->first(); 
        if($data1){
            session () ->flash('unsuccess','Klausul, No Dokumen atau Judul SMAP-Form telah ada sebelumnya');
            return back();
        }else{
            $lvla = Smaplvla ::findOrFail($id);
            $lvla -> klausul = $req->klausul;
            $lvla -> no_dokumen = $req->no_dokumen;
            $lvla -> judul = $req->judul;
            $sts_a = $lvla -> save();
            if($sts_a){
                session () ->flash('success','Data Sukses Diedit');
                return $this->formLvlA();
            }else{
                session () ->flash('unsuccess','Data Gagal Diedit');
                return $this->formLvlA();
            }
        }
    }
    public function formLvlADestroy($id){
        $data = Smaplvla :: findOrFail($id); 
        $status = $data->delete();
        if($data->file && file_exists(public_path().$data->file)){
            unlink(public_path().$data->file);
        }
        Smaplvlb ::where('smap_id', $id)->delete();
        
        if($status){
            session () ->flash('success','Data Berhasil Dihapus');
            return $this->formLvlA();
        }else{
            session () ->flash('unsuccess','Data gagal Dihapus');
            return $this->formLvlA();
        }
    }
    public function formLvlBInput($id){
        $data = Smaplvla ::where('id',$id)->first();
        return view('sudoku.smap-form.lvlbi',['id'=>$id,'data'=>$data]);
    }
    public function formLvlBStore(Request $req,$id){
        
        $req -> validate([
            'tgl_terbit' => 'required',
            'file' => 'mimes:pdf'
        ]);

        $lvlb = new Smaplvlb();
        $lvlb -> user_id        = Auth::user()->id;
        $lvlb -> smap_id      = $id;
        $lvlb -> tgl_terbit     = $req->tgl_terbit;
        $lvlb -> waktu          = $req->waktu;

        // get max value revisi
        $data = Smaplvlb :: where('smap_id','=',$id)->get();
        $maxrev =  $data -> max('revisi');

        $lvlb -> revisi     = $maxrev + 1;
        $status = $lvlb ->save();

        if($status){
            if($req->file!= ''){  
                $path = public_path().'/storage/smap-form/';

                $form = Smaplvla :: where('id', '=', $id)->first();
                if($form->file && file_exists(public_path().$form->file)){
                    // unlink(public_path().$form->file);
                }
                
                $file1 = $req->file;
                $filename1 = "/storage/smap-form/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $form->file = $filename1;
                $form->save();
                session () ->flash('success','Data berhasil diupdate');
                return $this->formLvlA();

            }else{
                session () ->flash('unsuccess','File pdf tidak ditemukan');
                return $this->formLvlA();
            }
        }else{
            session () ->flash('unsuccess','Update data gagal');
            return $this->formLvlA();
        }
    }
    public function formLvlBEdit($id){
        $rev = Smaplvlb :: where('id',$id)->first();
        return view('sudoku.smap-form.lvlbe',['id'=>$rev]);
    }
    public function formLvlBUpdate(Request $req, $id){
        $req -> validate([
            'tgl_terbit' => 'required',
            'no_rev' => 'required',
        ]);
        $lvlb = Smaplvlb :: where('id',$id)->first();
        $lvlb -> tgl_terbit = $req->tgl_terbit;
        $lvlb -> waktu      = $req->waktu;
        $lvlb -> revisi     = $req->no_rev;
        $status = $lvlb -> save();
        if($status){
            session () ->flash('success','Update data berhasil');
            return $this->formLvlA();
        }else{
            session () ->flash('unsuccess','Update data gagal');
            return $this->formLvlA();
        }
    } 
    public function formLvlBDestroy($id){
        $data = Smaplvlb :: findOrFail($id); 
        $status = $data->delete();
        if($status){
            session () ->flash('success','Data Berhasil Dihapus');
            return $this->formLvlA();
        }else{
            session () ->flash('unsuccess','Data gagal Dihapus');
            return $this->formLvlA();
        }
    }
}
