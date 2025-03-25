<?php

namespace App\Http\Controllers;

use App\Models\Formulirlvla;
use App\Models\Formulirlvlb;
use App\Models\Instrumenlvla;
use App\Models\Instrumenlvlb;
use App\Models\Instrumenlvlc;
use App\Models\Mutulvla;
use App\Models\Ptllvla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstrumenController extends Controller
{
    public function istrumenLvlA(){
        $mutu = Instrumenlvla :: get();
        return view('sudoku.instruksi-kerja.lvlav',['mutu'=>$mutu]);
    }
    public function istrumenLvlAInput(){
        $data = Instrumenlvla :: get('mutu_kode');
        $mutu = Mutulvla :: whereNotIn('mutu_kode', $data)->get('mutu_kode');
        $ptl  = Ptllvla :: whereNotIn('ptl_kode', $data)->get('ptl_kode');
        return view('sudoku.instruksi-kerja.lvlai',['mutu'=>$mutu, 'ptl'=>$ptl]);
    }
    public function istrumenLvlAStore(Request $request){
        $data = Instrumenlvla :: where('mutu_kode',$request->mutu_kode)->first();
        if($data){
            session () ->flash('unsuccess','Kode Mutu Lab. Induk suda ada');
            return $this->istrumenLvlA();
            // return back();
        }else{
            $instlvla = new Instrumenlvla();
            $instlvla-> mutu_kode  = $request->mutu_kode;
            $instlvla->user_id     = Auth::user()->id;
            $instlvla->save();
            session () ->flash('success','Data berhasil disimpan');
            return $this->istrumenLvlA();
            // return back();
        }
    }
    public function istrumenLvlB($id){
        $mutu = Instrumenlvla :: where('id',$id)->first();
        $data = Instrumenlvlb :: where('mutu_kode',$mutu->mutu_kode)->get();
        return view('sudoku.instruksi-kerja.lvlbv',['lvlb'=>$data,'lvla'=>$mutu->mutu_kode,'id'=>$mutu->id]);
    }
    public function istrumenLvlBInput($id){
        $mutu = Instrumenlvla :: where('id',$id)->first();
        return view('sudoku.instruksi-kerja.lvlbi',['lvla'=>$mutu->mutu_kode,'id'=>$mutu->id]);
    }
    public function instrumenLvlBStore(Request $request){
        $request -> validate([
            'mutu_kode' => ['required'],
            'ins_kode' => ['required'],
            'judul' => ['required'],
            'tgl_terbit' => ['required'],
            'file' => ['required'],
        ]);
        $data = Instrumenlvlb :: where('instrumen_kode',$request->ins_kode)->first();
        if($data){
            session () ->flash('unsuccess','Kode Instrumen Kerja suda ada');
            return $this->istrumenLvlA();

        }else{
        $lvlb = new Instrumenlvlb();
        $lvlb-> mutu_kode       = $request->mutu_kode;
        $lvlb-> instrumen_kode  = $request->ins_kode;
        $lvlb-> judul_sop       = $request->judul;
        $lvlb-> user_id         = Auth::user()->id;
    
        if($request->file!= ''){        
            $path = public_path().'/storage/instrumen-kerja/';
            //upload new file
            $file1 = $request->file;
            $filename1 = "/storage/instrumen-kerja/".time().$file1->getClientOriginalName();
            $file1->move($path, $filename1);
            $lvlb->file = $filename1;

        }
        $status = $lvlb->save();
        $new_id = $lvlb->id;
            if($status){
                $rev = new Instrumenlvlc();
                $rev -> instrumen_kode  = $new_id;
                $rev->tgl_terbit        = $request->tgl_terbit;
                $rev->waktu             = 1;
                $rev->revisi            = 1;
                $rev->user_id           = Auth::user()->id;
                $rev->save();
                session () ->flash('success','Data berhasil disimpan');
                return $this->istrumenLvlA();
            }else{
                session () ->flash('unsuccess','Data gagal disimpan');
                return $this->istrumenLvlA();
            }
        }
    }
    public function instrumenLvlC($id){
        $lvlc = Instrumenlvlc :: where('instrumen_kode','=',$id)->get();
        $data = Instrumenlvlb :: where('id',$id)->first('instrumen_kode');
        return view('sudoku.instruksi-kerja.lvlcv',['lvlc'=>$lvlc,'proses_id'=>$id,'kode'=>$data]);
    }
    public function instrumenLvlCInput($id){
        $data = Instrumenlvlb::where('id',$id)->first();
        return view('sudoku.instruksi-kerja.lvlci',['proses_id'=>$id,'kode'=>$data]);
    }
    public function instrumenLvlCStore(Request $request, $id){
       
        $request -> validate([
            'tgl_terbit' => 'required',
            'file' => 'mimes:pdf'
        ]);

        $lvlc = new Instrumenlvlc();
        $lvlc -> user_id        = Auth::user()->id;
        $lvlc -> instrumen_kode = $id;
        $lvlc -> tgl_terbit     = $request->tgl_terbit;
        $lvlc -> waktu          = $request->waktu;

        // get max value revisi
        $data = Instrumenlvlc :: where('instrumen_kode','=',$id)->get();
        $maxrev =  $data -> max('revisi');

        $lvlc -> revisi     = $maxrev + 1;
        $status = $lvlc ->save();

        if($status){
            if($request->file!= ''){  
                $path = public_path().'/storage/instrumen-kerja/';

                $inst = Instrumenlvlb :: where('id', '=', $id)->first();
                if($inst->file && file_exists(public_path().$inst->file)){
                    // unlink(public_path().$inst->file);
                }
                
                $file1 = $request->file;
                $filename1 = "/storage/instrumen-kerja/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $inst->file = $filename1;
                $inst->save();
                session () ->flash('success','Data berhasil disimpan');
                return $this->istrumenLvlA();

            }else{
                session () ->flash('unsuccess','File pdf tidak ditemukan');
                return $this->istrumenLvlA();
            }
        }else{
            session () ->flash('unsuccess','Input data gagal');
            return $this->istrumenLvlA();
        }
    }
    public function lvlADestroy($id){
        $kode_mutu = Instrumenlvla :: where('id',$id)->first('mutu_kode');

        $data = Instrumenlvla :: findOrFail($id); 
        $status = $data->delete();
        // $status = true;
        if($status){
            $ins_kode = Instrumenlvlb ::where('mutu_kode', $kode_mutu->mutu_kode)->get('id');
            if(!$ins_kode->isEmpty()){
                $file = Instrumenlvlb ::where('mutu_kode', $kode_mutu->mutu_kode)->get('file');
                foreach($file as $item){
                    if($item->file && file_exists(public_path().$item->file)){
                        // unlink(public_path().$item->file);
                    }
                }
                $status2 = Instrumenlvlb ::where('mutu_kode', $kode_mutu->mutu_kode)->delete();
                // $status2 = true;
                if($status2){
                    $status3 = Instrumenlvlc ::whereIn('instrumen_kode', $ins_kode)->delete();
                    if($status3){
                        session () ->flash('success','Data berhasil dihapus');
                        return $this->istrumenLvlA();
                    }else{
                        session () ->flash('unsuccess','Delete data revisi gagal');
                        return $this->istrumenLvlA();
                    }
                }else{
                    session () ->flash('unsuccess','Delete data intruksi gagal');
                    return $this->istrumenLvlA();
                }
            }else{
                session () ->flash('success','Data berhasil dihapus');
                return $this->istrumenLvlA();
            }
        }else{
            session () ->flash('unsuccess','Delete data Induk Gagal');
            return $this->istrumenLvlA();
        }
    }
    public function lvlBDestroy($id){
        $data = Instrumenlvlb :: findOrFail($id); 
        if($data->file && file_exists(public_path().$data->file)){
            // unlink(public_path().$data->file);
        }
        $status2 = $data->delete();
        if($status2){
            $status3 = Instrumenlvlc ::where('instrumen_kode', $id)->delete();
            if($status3){
                session () ->flash('success','Data berhasil dihapus');
                return $this->istrumenLvlA();
            }else{
                session () ->flash('unsuccess','Delete data revisi gagal');
                return $this->istrumenLvlA();
            }
        }else{
            session () ->flash('unsuccess','Delete data intruksi gagal');
            return $this->istrumenLvlA();
        }
    }
    public function instruksiLvlBEdit($id){
        $data = Instrumenlvlb::where('id',$id)->first();
        return view('sudoku.instruksi-kerja.lvlbe',['data'=>$data]);
    }
    public function instruksiLvlBUpdate(Request $request, $id){
        $request -> validate([
            'kode' =>  'required',
            'nama' => 'required'
            
        ]);
        $data1 = Instrumenlvlb :: where('instrumen_kode','=', $request->kode)->Where('judul_sop','=',$request->nama)->first(); 
        if($data1){
            session () ->flash('unsuccess','Kode atau judul Instruksi Kerja telah ada sebelumnya');
            return back();
        }else{
            $lvla = Instrumenlvlb ::findOrFail($id);
            $lvladefault = $lvla->instrumen_kode;
            $lvla -> instrumen_kode = $request->kode;
            $lvla -> judul_sop = $request->nama;
            $sts_a = $lvla -> save();
            if($sts_a){
                $data2 = Formulirlvla :: where('induk_kode','=',$lvladefault)->get(['id','induk_kode']);
                $numItems = count($data2);
                $i = 0;
                if(!$data2->isEmpty()){
                    foreach ($data2 as $item1){
                        $lvlb = Formulirlvla ::findOrFail($item1->id);
                        $lvlb -> induk_kode = $request->kode;
                        $sts_b = $lvlb -> save();
                        if($sts_b){
                            $data3 = Formulirlvlb :: where('induk_kode','=',$lvladefault)->get(['id','formulir_kode','induk_kode']);
                            if($data3){
                                foreach ($data3 as $item3){
                                    $lvle = Formulirlvlb ::findOrFail($item3->id);
                                    $lvle -> induk_kode = $request->kode;
                                    $lvle -> save();
                                }
                            }
                        }
                        if(++$i === $numItems) {
                            session () ->flash('success','Data Sukses Diedit');
                            return $this->istrumenLvlA();
                        }
                    }
                }else{
                    session () ->flash('success','Data Sukses Diedit');
                    return $this->istrumenLvlA();
                }
            }else{
                session () ->flash('unsuccess','Data Gagal Diedit');
                return $this->istrumenLvlA();
            }
        }
    }
    public function lvlCDestroy($id){
            $status3 = Instrumenlvlc ::where('id', $id)->delete();
            if($status3){
                session () ->flash('success','Data berhasil dihapus');
                return $this->istrumenLvlA();
            }else{
                session () ->flash('unsuccess','Delete data revisi gagal');
                return $this->istrumenLvlA();
            }
    }
    public function view_file($id){
        $data = Instrumenlvlb::where('id',$id)->first('file');
        return view('sudoku.priview_file',['data'=>$data]);
    }
    public function editRevisi($id,){
        $rev = Instrumenlvlc :: where('id',$id)->first();
        return view('sudoku.instruksi-kerja.lvlcedit',['id'=>$rev]);
    }
    public function updateRevisi(Request $request, $id){
        $request -> validate([
            'tgl_terbit' => 'required',
            'no_rev' => 'required',
        ]);
        $lvlc = Instrumenlvlc :: where('id',$id)->first();
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
