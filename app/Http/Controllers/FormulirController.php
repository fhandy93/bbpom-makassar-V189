<?php

namespace App\Http\Controllers;

use App\Models\Formulirlvla;
use App\Models\Formulirlvlb;
use App\Models\Formulirlvlc;
use App\Models\Instrumenlvla;
use App\Models\Instrumenlvlb;
use App\Models\Mikrolvlb;
use App\Models\Mutulvla;
use App\Models\Ptllvla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormulirController extends Controller
{
    public function formulirLvlA(){
        $form = Formulirlvla :: get();
        return view('sudoku.formulir.lvlav',['form'=>$form]);
    }
    public function formulirLvlAInput(){
        $data = Formulirlvla :: get('induk_kode');
        $ptl  = Ptllvla :: whereNotIn('ptl_kode', $data)->get('ptl_kode');
        $mutu = Mutulvla :: whereNotIn('mutu_kode', $data)->get('mutu_kode');
        $mikro = Mikrolvlb :: whereNotIn('kode_mikro', $data)->get('kode_mikro');
        $inst = Instrumenlvlb :: whereNotIn('instrumen_kode', $data)->get('instrumen_kode');
        return view('sudoku.formulir.lvlai',['mutu'=>$mutu,'inst'=>$inst , 'ptl'=>$ptl, 'mikro'=>$mikro]);
    }
    public function formulirLvlAStore(Request $request){
        $data = Formulirlvla :: where('induk_kode',$request->induk_kode)->first();
        if($data){
            session () ->flash('unsuccess','Kode Induk suda ada');
            return $this->formulirLvlA();
            // return back();
        }else{
            $formlvla = new Formulirlvla();
            $formlvla-> induk_kode  = $request->induk_kode;
            $formlvla->user_id     = Auth::user()->id;
            $formlvla->save();
            session () ->flash('success','Data berhasil disimpan');
            return $this->formulirLvlA();
            // return back();
        }
    }
    public function formulirLvlB($id){
        $induk = Formulirlvla :: where('id',$id)->first();
        $data = Formulirlvlb :: where('induk_kode',$induk->induk_kode)->get();
        return view('sudoku.formulir.lvlbv',['lvlb'=>$data,'lvla'=>$induk->induk_kode,'id'=>$induk->id]);
    }
    public function formulirLvlBInput($id){
        $induk = Formulirlvla :: where('id',$id)->first();
        return view('sudoku.formulir.lvlbi',['lvla'=>$induk->induk_kode,'id'=>$induk->id]);
    }
    public function formulirLvlBStore(Request $request){
        $request -> validate([
            'induk_kode' => ['required'],
            'form_kode' => ['required'],
            'judul' => ['required'],
            'tgl_terbit' => ['required'],
            'file' => ['required'],
        ]);
        $data = Formulirlvlb :: where('formulir_kode',$request->form_kode)->first();
        if($data){
            session () ->flash('unsuccess','Kode Formulir Kerja suda ada');
            return $this->formulirLvlA();

        }else{
        $lvlb = new Formulirlvlb();
        $lvlb-> induk_kode      = $request->induk_kode;
        $lvlb-> formulir_kode   = $request->form_kode;
        $lvlb-> judul_sop       = $request->judul;
        $lvlb-> user_id         = Auth::user()->id;
    
        if($request->file!= ''){        
            $path = public_path().'/storage/formulir/';
            //upload new file
            $file1 = $request->file;
            $filename1 = "/storage/formulir/".time().$file1->getClientOriginalName();
            $file1->move($path, $filename1);
            $lvlb->file = $filename1;

        }
        $status = $lvlb->save();
        $new_id = $lvlb->id;
            if($status){
                $rev = new Formulirlvlc();
                $rev -> formulir_kode  = $new_id;
                $rev->tgl_terbit        = $request->tgl_terbit;
                $rev->waktu             = 1;
                $rev->revisi            = 1;
                $rev->user_id           = Auth::user()->id;
                $rev->save();
                session () ->flash('success','Data berhasil disimpan');
                return $this->formulirLvlA();
            }else{
                session () ->flash('unsuccess','Data gagal disimpan');
                return $this->formulirLvlA();
            }
        }
    }
    public function formulirLvlBEdit($id){
        $data = Formulirlvlb::where('id',$id)->first();
        return view('sudoku.formulir.lvlbe',['data'=>$data]);
    }
    public function formulirLvlBUpdate(Request $request, $id){
        $request -> validate([
            'kode' =>  'required',
            'nama' => 'required'
            
        ]);
        $data1 = Formulirlvlb :: where('formulir_kode','=', $request->kode)->Where('judul_sop','=',$request->nama)->first(); 
        if($data1){
            session () ->flash('unsuccess','Kode atau judul Formulir telah ada sebelumnya');
            return back();
        }else{
            $lvla = Formulirlvlb ::findOrFail($id);
            $lvla -> formulir_kode = $request->kode;
            $lvla -> judul_sop = $request->nama;
            $sts_a = $lvla -> save();
            if($sts_a){
                session () ->flash('success','Data Sukses Diedit');
                return $this->formulirLvlA();
            }else{
                session () ->flash('unsuccess','Data Gagal Diedit');
                return $this->formulirLvlA();
            }
        }
    }
    public function formulirLvlC($id){
        $lvlc = Formulirlvlc :: where('formulir_kode','=',$id)->get();
        $data = Formulirlvlb :: where('id',$id)->first('formulir_kode');
        return view('sudoku.formulir.lvlcv',['lvlc'=>$lvlc,'proses_id'=>$id,'kode'=>$data]);
    }
    public function formulirLvlCInput($id){
        $data = Formulirlvlb::where('id',$id)->first();
        return view('sudoku.formulir.lvlci',['proses_id'=>$id,'kode'=>$data]);
    }
    public function formulirLvlCStore(Request $request, $id){
        $request -> validate([
            'tgl_terbit' => 'required',
            'file' => 'mimes:pdf'
        ]);

        $lvlc = new Formulirlvlc();
        $lvlc -> user_id        = Auth::user()->id;
        $lvlc -> formulir_kode  = $id;
        $lvlc -> tgl_terbit     = $request->tgl_terbit;
        $lvlc -> waktu          = $request->waktu;

        // get max value revisi
        $data = Formulirlvlc :: where('formulir_kode','=',$id)->get();
        $maxrev =  $data -> max('revisi');

        $lvlc -> revisi     = $maxrev + 1;
        $status = $lvlc ->save();

        if($status){
            if($request->file!= ''){  
                $path = public_path().'/storage/formulir/';

                $inst = Formulirlvlb :: where('id', '=', $id)->first();
                if($inst->file && file_exists(public_path().$inst->file)){
                    unlink(public_path().$inst->file);
                }
                
                $file1 = $request->file;
                $filename1 = "/storage/formulir/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $inst->file = $filename1;
                $inst->save();
                session () ->flash('success','Data berhasil disimpan');
                return $this->formulirLvlA();

            }else{
                session () ->flash('unsuccess','File pdf tidak ditemukan');
                return $this->formulirLvlA();
            }
        }else{
            session () ->flash('unsuccess','Input data gagal');
            return $this->formulirLvlA();
        }
    }
    public function lvlADestroy($id){
        $induk_kode = Formulirlvla :: where('id',$id)->first('induk_kode');

        $data = Formulirlvla :: findOrFail($id); 
        $status = $data->delete();
        // $status = true;
        if($status){
            $form_kode = Formulirlvlb ::where('induk_kode', $induk_kode->induk_kode)->get('id');
            if(!$form_kode->isEmpty()){
                $file = Formulirlvlb ::where('induk_kode', $induk_kode->induk_kode)->get('file');
                foreach($file as $item){
                    if($item->file && file_exists(public_path().$item->file)){
                        unlink(public_path().$item->file);
                    }
                }
                $status2 = Formulirlvlb ::where('induk_kode', $induk_kode->induk_kode)->delete();
                // $status2 = true;
                if($status2){
                    $status3 = Formulirlvlc ::whereIn('formulir_kode', $form_kode)->delete();
                    if($status3){
                        session () ->flash('success','Data berhasil dihapus');
                        return $this->formulirLvlA();
                    }else{
                        session () ->flash('unsuccess','Delete data revisi gagal');
                        return $this->formulirLvlA();
                    }
                }else{
                    session () ->flash('unsuccess','Delete data formulir gagal');
                    return $this->formulirLvlA();
                }
            }else{
                session () ->flash('success','Data berhasil dihapus');
                return $this->formulirLvlA();
            }
        }else{
            session () ->flash('unsuccess','Delete data Induk Gagal');
            return $this->formulirLvlA();
        }
    }
    public function lvlBDestroy($id){
        $data = Formulirlvlb :: findOrFail($id); 
        if($data->file && file_exists(public_path().$data->file)){
            unlink(public_path().$data->file);
        }
        $status2 = $data->delete();
        if($status2){
            $status3 = Formulirlvlc ::where('formulir_kode', $id)->delete();
            if($status3){
                session () ->flash('success','Data berhasil dihapus');
                return $this->formulirLvlA();
            }else{
                session () ->flash('unsuccess','Delete data revisi gagal');
                return $this->formulirLvlA();
            }
        }else{
            session () ->flash('unsuccess','Delete data Formulir gagal');
            return $this->formulirLvlA();
        }
    }
    public function lvlCDestroy($id){
        $status3 = Formulirlvlc ::where('id', $id)->delete();
        if($status3){
            session () ->flash('success','Data berhasil dihapus');
            return $this->formulirLvlA();
        }else{
            session () ->flash('unsuccess','Delete data revisi gagal');
            return $this->formulirLvlA();
        }
    }
    public function view_file($id){
        $data = Formulirlvlb::where('id',$id)->first('file');
        return view('sudoku.priview_file',['data'=>$data]);
    }
     public function editRevisi($id,){
        $rev = Formulirlvlc :: where('id',$id)->first();
        return view('sudoku.formulir.lvlcedit',['id'=>$rev]);
    }
    public function updateRevisi(Request $request, $id){
        $request -> validate([
            'tgl_terbit' => 'required',
            'no_rev' => 'required',
        ]);
        $lvlc = Formulirlvlc :: where('id',$id)->first();
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
 