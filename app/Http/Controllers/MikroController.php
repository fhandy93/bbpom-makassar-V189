<?php

namespace App\Http\Controllers;

use App\Models\Formulirlvla;
use App\Models\Formulirlvlb;
use App\Models\Makrolvld;
use App\Models\Mikrolvla;
use App\Models\Mikrolvlb;
use App\Models\Mikrolvlc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class MikroController extends Controller
{
    public function mikroLvlA(){
        
        $mikro = Mikrolvla :: get();
        return view('sudoku.sop-mikro.lvlav',['lvla'=>$mikro]);
    }
    public function mikroLvlAInput(){
        $mikro = Mikrolvla :: get('kode_makro');
        $makro = Makrolvld :: whereNotIn('kode_sop', $mikro)->get('kode_sop');
        return view('sudoku.sop-mikro.lvlai',['makro'=>$makro]);
    }
    public function mikroLvlAStore(Request $request){
        $data = Mikrolvla :: where('kode_makro',$request->makro_kode)->first();
        if($data){
            session () ->flash('unsuccess','Kode Makro Induk suda ada');
            return $this->mikroLvlA();
        }else{
            $mikrolvla = new Mikrolvla();
            $mikrolvla->kode_makro  = $request->makro_kode;
            $mikrolvla->user_id     = Auth::user()->id;
            $mikrolvla->save();
            session () ->flash('success','Data berhasil disimpan');
            return $this->mikroLvlA();
        }
        
    }
    public function mikroLvlB($kodea,$kode,$kodec){
        $makro = $kodea.'/'.$kode.'/'.$kodec;
        $data = Mikrolvlb :: where('kode_makro',$makro)->get();
        return view('sudoku.sop-mikro.lvlbv',['lvlb'=>$data,'lvla'=>$makro]);
    }
    public function mikroLvlBInput($kodea,$kode,$kodec){
        $makro = $kodea.'/'.$kode.'/'.$kodec;
        return view('sudoku.sop-mikro.lvlbi',['lvla'=>$makro]);
    }
    public function mikroLvlBStore(Request $request){
        $request -> validate([
            'makro_kode' => ['required'],
            'mikro_kode' => ['required'],
            'nama' => ['required'],
            'tgl_terbit' => ['required'],
            'file' => ['required'],
        ]);
        $data = Mikrolvlb :: where('kode_mikro',$request->mikro_kode)->first();
        if($data){
            session () ->flash('unsuccess','Kode Mikro suda ada');
            return $this->mikroLvlA();

        }else{
        $lvlb = new Mikrolvlb();
        $lvlb-> kode_makro  = $request->makro_kode;
        $lvlb-> judul_sop   = $request->nama;
        $lvlb-> kode_mikro  = $request->mikro_kode;
        $lvlb-> user_id     = Auth::user()->id;
    
        if($request->file!= ''){        
            $path = public_path().'/storage/sop-mikro/';
            //upload new file
            $file1 = $request->file;
            $filename1 = "/storage/sop-mikro/".time().$file1->getClientOriginalName();
            $file1->move($path, $filename1);
            $lvlb->file = $filename1;

        }
        $status = $lvlb->save();
        $new_id = $lvlb->id;
            if($status){
                $rev = new Mikrolvlc();
                $rev -> kode_mikro  = $new_id;
                $rev->tgl_terbit    = $request->tgl_terbit;
                $rev->waktu         = 1;
                $rev->revisi        = 1;
                $rev->user_id       = Auth::user()->id;
                $rev->save();
                session () ->flash('success','Data berhasil disimpan');
                return $this->mikroLvlA();
            }else{
                session () ->flash('unsuccess','Data gagal disimpan');
                return $this->mikroLvlA();
            }
        }
    }
    public function mikroLvlC($id){
        $lvlc = Mikrolvlc :: where('kode_mikro','=',$id)->get();
        $data = Mikrolvlb ::where('id',$id)->first('kode_mikro');
        return view('sudoku.sop-mikro.lvlcv',['lvlc'=>$lvlc,'proses_id'=>$id,'kode'=>$data]);
    }
    public function mikroLvlCInput($id){
        $data = Mikrolvlb::where('id',$id)->first();
        return view('sudoku.sop-mikro.lvlci',['proses_id'=>$id,'kode'=>$data]);
    }
    public function mikroLvlCStore(Request $request, $id){
       
        $request -> validate([
            'tgl_terbit' => 'required',
            'file' => 'mimes:pdf'
        ]);

        $lvlc = new Mikrolvlc();
        $lvlc -> user_id    = Auth::user()->id;
        $lvlc -> kode_mikro     = $id;
        $lvlc -> tgl_terbit = $request->tgl_terbit;
        $lvlc -> waktu      = $request->waktu;

        // get max value revisi
        $data = Mikrolvlc :: where('kode_mikro','=',$id)->get();
        $maxrev =  $data -> max('revisi');

        $lvlc -> revisi     = $maxrev + 1;
        $status = $lvlc ->save();

        if($status){
            if($request->file!= ''){  
                $path = public_path().'/storage/sop-mikro/';

                $mikro = Mikrolvlb :: where('id', '=', $id)->first();
                if($mikro->file && file_exists(public_path().$mikro->file)){
                    // unlink(public_path().$mikro->file);
                }
                
                $file1 = $request->file;
                $filename1 = "/storage/sop-mikro/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $mikro->file = $filename1;
                $mikro->save();
                session () ->flash('success','Data berhasil disimpan');
                return $this->mikroLvlA();

            }else{
                session () ->flash('unsuccess','File pdf tidak ditemukan');
                return $this->mikroLvlA();
            }
        }else{
            session () ->flash('unsuccess','Input data gagal');
            return $this->mikroLvlA();
        }
    }
    public function view_file($id){
        $data = Mikrolvlb::where('id',$id)->first('file');
        return view('sudoku.priview_file',['data'=>$data]);
        
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
    }
   public function lvlADestroy($id){
        $kode = Mikrolvla :: where('id',$id)->first('kode_makro');

        $data = Mikrolvla :: findOrFail($id); 
        $status = $data->delete();
        // $status = true;
        if($status){
            $mikro_kode = Mikrolvlb ::where('kode_makro', $kode->kode_makro)->get('id');
            if(!$mikro_kode->isEmpty()){
                $file = Mikrolvlb ::where('kode_makro', $kode->kode_makro)->get('file');
                foreach($file as $item){
                    if($item->file && file_exists(public_path().$item->file)){
                        // unlink(public_path().$item->file);
                    }
                }
                $status2 = Mikrolvlb ::where('kode_makro', $kode->kode_makro)->delete();
                // $status2 = true;
                if($status2){
                    $status3 = Mikrolvlc ::whereIn('kode_mikro', $mikro_kode)->delete();
                    if($status3){
                        session () ->flash('success','Data berhasil dihapus');
                        return $this->mikroLvlA();
                    }else{
                        session () ->flash('unsuccess','Delete data revisi gagal');
                        return $this->mikroLvlA();
                    }
                }else{
                    session () ->flash('unsuccess','Delete data mikro gagal');
                    return $this->mikroLvlA();
                }
            }else{
                session () ->flash('success','Data berhasil dihapus');
                return $this->mikroLvlA();
            }
        }else{
            session () ->flash('unsuccess','Delete data Induk gagal');
            return $this->mikroLvlA();
        }
    }
    public function lvlBDestroy($id){
        $data = Mikrolvlb :: findOrFail($id); 
        if($data->file && file_exists(public_path().$data->file)){
            unlink(public_path().$data->file);
        }
        $status2 = $data->delete();
        if($status2){
            $status3 = Mikrolvlc ::where('kode_mikro', $id)->delete();
            if($status3){
                session () ->flash('success','Data berhasil dihapus');
                return $this->mikroLvlA();
            }else{
                session () ->flash('unsuccess','Delete data revisi gagal');
                return $this->mikroLvlA();
            }
        }else{
            session () ->flash('unsuccess','Delete data intruksi gagal');
            return $this->mikroLvlA();
        }
    }
    public function lvlCDestroy($id){
        $status3 = Mikrolvlc ::where('id', $id)->delete();
        if($status3){
            session () ->flash('success','Data berhasil dihapus');
            return $this->mikroLvlA();
        }else{
            session () ->flash('unsuccess','Delete data revisi gagal');
            return $this->mikroLvlA();
        }
    }
    public function mikroLvlBEdit($id){
        $data = Mikrolvlb::where('id',$id)->first();
        return view('sudoku.sop-mikro.lvlbe',['data'=>$data]);
    }
    public function mikroLvlBUpdate(Request $request, $id){
        $request -> validate([
            'kode' =>  'required',
            'nama' => 'required'
            
        ]);
        $request->kode_makro.'/'.$request->kode;
        $data1 = Mikrolvlb :: where('kode_mikro','=', $request->kode_makro.'/'.$request->kode)->Where('judul_sop','=',$request->nama)->first(); 
        if($data1){
            session () ->flash('unsuccess','Kode atau Judul SOP Mikro telah ada sebelumnya');
            return back();
        }else{
            $lvlb = Mikrolvlb ::findOrFail($id);
            $lvladefault = $lvlb->kode_mikro;
            $lvlb -> kode_mikro = $request->kode_makro.'/'.$request->kode;
            $lvlb -> judul_sop = $request->nama;
            $sts_b = $lvlb -> save();
            if($sts_b){
                $data2 = Formulirlvla :: where('induk_kode','=',$lvladefault)->get(['id','induk_kode']);
                $numItems = count($data2);
                $i = 0;
                if(!$data2->isEmpty()){
                    foreach ($data2 as $item1){
                        $lvlc = Formulirlvla ::findOrFail($item1->id);
                        $lvlc -> induk_kode = $request->kode_makro.'/'.$request->kode;
                        $sts_c = $lvlc -> save();
                        if($sts_c){
                            $data3 = Formulirlvlb :: where('induk_kode','=',$lvladefault)->get(['id','formulir_kode','induk_kode']);
                            if($data3){
                                foreach ($data3 as $item2){
                                    $lvld = Formulirlvlb ::findOrFail($item2->id);
                                    $lvld -> induk_kode = $request->kode_makro.'/'.$request->kode;
                                    $lvld -> save();
                                }
                            }
                        }
                        if(++$i === $numItems) {
                            session () ->flash('success','Data Sukses Diedit');
                            return $this->mikroLvlA();
                        }
                    }
                }else{
                    session () ->flash('success','Data Sukses Diedit');
                    return $this->mikroLvlA();
                }
            }else{
                session () ->flash('unsuccess','Data Gagal Diedit');
                return $this->mikroLvlA();
            }
        }
    }
    public function editRevisi($id,){
        $rev = Mikrolvlc :: where('id',$id)->first();
        return view('sudoku.sop-mikro.lvlcedit',['id'=>$rev]);
    }
    public function updateRevisi(Request $request, $id){
        $request -> validate([
            'tgl_terbit' => 'required',
            'no_rev' => 'required',
        ]);
        $lvlc = Mikrolvlc :: where('id',$id)->first();
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
