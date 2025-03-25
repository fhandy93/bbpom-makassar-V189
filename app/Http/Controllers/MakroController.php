<?php

namespace App\Http\Controllers;

use App\Models\Formulirlvla;
use App\Models\Formulirlvlb;
use App\Models\Makrolvla;
use App\Models\Makrolvlb;
use App\Models\Makrolvlc;
use App\Models\Makrolvld;
use App\Models\Makrolvle;
use App\Models\Mikrolvla;
use App\Models\Mikrolvlb;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MakroController extends Controller
{
    public function makroLvlA(){
        $lvla = Makrolvla::get();
        return view('sudoku.sop-makro.lvlav',['lvla'=>$lvla]);
    }
    public function makroLvlAInput(){
        return view('sudoku.sop-makro.lvlai');
    }
    public function makroLvlAStore(Request $request){

        // echo $request->nama; 
        // $request -> validate([
        //     'kode' =>  'required|unique:sudoku_makro_lvl_a,kode_proses,' . $request->kode,
        //     'nama' => 'required|unique:sudoku_makro_lvl_a,nm_proses,' . $request->nama
            
        // ]);
        $data = Makrolvla :: where('kode_proses','=',$request->kode)->orWhere('nm_proses','=',$request->nama)->first(); 
        if($data){
            session () ->flash('unsuccess','Kode Peta atau Nama Peta Proses bisinis telah ada');
            return back();
        }else{
         
            try{
                
                $peta               = new Makrolvla();
                $peta->kode_proses  = $request->kode;
                $peta->nm_proses    = $request->nama;
                $peta->user_id      = Auth::user()->id;
                $peta->save();

            
                session () ->flash('success','Data Berhasil Diinput');
                return back();
            }catch(\Exception $e){
                session () ->flash('unsuccess',$e->getMessage());
                return back();
            }
        }
    }
    public function makroLvlADestroy($id){
        $data = Makrolvla::where('id',$id)->first();
        $status = $data -> delete();


        // if($status){
        //     $lvlb = Makrolvlb :: where('id',$id)->first();
        // }
        session () ->flash('success','Data Berhasil Dihapus');
        return back();
    }
    public function makroLvlAEdit($id){
        $data = Makrolvla::where('id',$id)->first();
        return view('sudoku.sop-makro.lvlae',['data'=>$data]);
    }
    public function makroLvlAUpdate(Request $request, $id){
        $request -> validate([
            'kode' =>  'required',
            'nama' => 'required'
            
        ]);
        $data1 = Makrolvla :: where('kode_proses','=',$request->kode)->Where('nm_proses','=',$request->nama)->first(); 
        if($data1){
            session () ->flash('unsuccess','Kode atau Nama Peta Proses bisnis telah ada sebelumnya');
            return back();
        }else{
            $lvla     = Makrolvla::findOrFail($id);
            $lvladefault = $lvla -> kode_proses;
            $lvla -> kode_proses = $request->kode;
            $lvla -> nm_proses = $request->nama; 
            $sts_a = $lvla -> save();
            if($sts_a){
                $data2 = Makrolvlb :: where('proses_id',$id)->get(['id','proses_id','kode_sub_pro']);
                $numItems = count($data2);
                $i = 0;
                if(!$data2->isEmpty()){
                    foreach ($data2 as $item1){
                        $lvlb = Makrolvlb ::findOrFail($item1->id);
                        $lvlb -> kode_sub_pro = $request->kode.Str :: substr($lvlb -> kode_sub_pro, 6); 
                        $sts_b = $lvlb ->save();
                        
                        if($sts_b){
                            $no1 = $item1->id;
                            $data3 = Makrolvlc :: where('sub_proses_id','=',$no1)->get(['id','sub_proses_id','kode_peta']);
                            if(!$data3->isEmpty()){
                                foreach ($data3 as $item2){
                                    $lvlc = Makrolvlc ::findOrFail($item2->id);
                                    $lvlc -> kode_peta = $request->kode.Str :: substr($lvlc -> kode_peta, 6); 
                                    $sts_c = $lvlc -> save();
        
                                    if($sts_c){
                                        $no2 = $item2->id;
                                        $data4 = Makrolvld :: where('peta_id','=',$no2)->get(['id','peta_id','kode_sop']);
                                        if(!$data4->isEmpty()){
                                            foreach ($data4 as $item3){
                                                $lvld = Makrolvld ::findOrFail($item3->id);
                                                $lvld -> kode_sop = $request->kode.Str :: substr($lvld -> kode_sop, 6); 
                                                $sts_d = $lvld -> save();
                                                
                                                if($sts_d){
                                                    $no3 = $lvladefault.Str :: substr($lvld -> kode_sop, 6); 
                                                    $data5 = Mikrolvla :: where('kode_makro','=',$no3)->get(['id','kode_makro']);
                                                    if(!$data5->isEmpty()){
                                                        foreach ($data5 as $item4){
                                                            $lvle = Mikrolvla ::findOrFail($item4->id);
                                                            $lvle -> kode_makro = $request->kode.Str :: substr($lvld -> kode_sop, 6); 
                                                            $sts_e = $lvle -> save();
                                                            
                                                            if($sts_e){
                                                                $data6 = Mikrolvlb :: where('kode_makro','=',$no3)->get(['id','kode_makro','kode_mikro']);
                                                                if(!$data6->isEmpty()){
                                                                    foreach ($data6 as $item5){
                                                                        $lvlf = Mikrolvlb ::findOrFail($item5->id);
                                                                        $lvlf -> kode_mikro = $request->kode.Str :: substr($lvlf -> kode_mikro, 6); 
                                                                        $lvlf -> kode_makro = $request->kode.Str :: substr($lvld -> kode_sop, 6); 
                                                                        $sts_f = $lvlf -> save();
                                                                        
                                                                        if($sts_f){
                                                                            $no4 = $lvladefault.Str :: substr($lvlf -> kode_mikro, 6);
                                                                            $data7 = Formulirlvla :: where('induk_kode','=',$no4)->get(['id','induk_kode']);
                                                                            if(!$data7->isEmpty()){
                                                                                foreach ($data7 as $item6){
                                                                                    $lvlg = Formulirlvla ::findOrFail($item6->id);
                                                                                    $lvlg -> induk_kode = $request->kode.Str :: substr($lvlf -> kode_mikro, 6);
                                                                                    $sts_g = $lvlg -> save();
                        
                                                                                    if($sts_g){
                                                                                        $data8 = Formulirlvlb :: where('induk_kode','=',$no4)->get(['id','formulir_kode','induk_kode']);
                                                                                        foreach ($data8 as $item7){
                                                                                            $lvlh = Formulirlvlb ::findOrFail($item7->id);
                                                                                            $lvlh -> induk_kode = $request->kode.Str :: substr($lvlf -> kode_mikro, 6);
                                                                                            $sts_h = $lvlh -> save();
                                                                                        }
                                                                                        if($sts_h){
                                                                                            // session () ->flash('success','Data Sukses Diedit');
                                                                                            // return $this->makroLvlA();
                                                                                        }  
                                                                                    }
                                                                                }
                                                                            }else{
                                                                                // session () ->flash('success','Data Level B (SOP Makro) dan Level C (SOP Mikro)  sukses diedit');
                                                                                // return $this->makroLvlA();
                                                                            }
                                                                        }
                                                                    }
                                                                }else{
                                                                    // session () ->flash('success','Data Level B (SOP Makro) dan Level C (SOP Mikro)  sukses diedit');
                                                                    // return $this->makroLvlA();
                                                                }
                                                            }
                                                        }
                                                    }else{
                                                        // session () ->flash('success','Data level B (SOP Makro) sukses diedit');
                                                        // return $this->makroLvlA();
                                                    }
                                                }
                                            }
                                        }else{
                                            // session () ->flash('success','Data Peta Proses Bisnis, Sub Proses bisnis dan Peta Lintas Fungsi sukses diedit');
                                            // return $this->makroLvlA();
                                        }
                                    }
                                }
                            }else{
                                // session () ->flash('success','Data Peta Proses Bisnis dan Sub Proses bisnis sukses diedit');
                                // return $this->makroLvlA();
                            }
                        }
                        if(++$i === $numItems) {
                            session () ->flash('success','Data Sukses Diedit');
                            return $this->makroLvlA();
                        }
                    }
                }else{
                    session () ->flash('success','Data Sukses Diedit');
                    return $this->makroLvlA();
                }
            }else{
                session () ->flash('unsuccess','Data Gagal Diedit');
                return $this->mikroLvlA();
            }  
        }   
    }
    public function makroLvlB($id){
        $lvlb = Makrolvlb::where('proses_id', '=', $id)->get();
        return view('sudoku.sop-makro.lvlbv',['lvlb'=>$lvlb,'proses_id'=>$id]);
    }
    public function makroLvlBInput($id){
        $data = Makrolvla::where('id',$id)->first('kode_proses');
        return view('sudoku.sop-makro.lvlbi',['proses_id'=>$id,'kode'=>$data]);
    }
    public function makroLvlBStore(Request $request, $id){
         $data = Makrolvlb :: where('kode_sub_pro','=',$request->kode)->orWhere('nm_sub_pro','=',$request->nama)->first(); 
        if($data){
            session () ->flash('unsuccess','Kode atau Nama sub Proses bisinis telah ada');
            return back();
        }else{
            try{
            
                $peta               = new Makrolvlb();
                $peta->proses_id    = $id;
                $peta->kode_sub_pro = $request->kode;
                $peta->nm_sub_pro   = $request->nama;
                $peta->user_id      = Auth::user()->id;
                $peta->save();
                session () ->flash('success','Data Berhasil Diinput');
                return back();
            }catch(\Exception $e){
                session () ->flash('unsuccess',$e->getMessage());
                return back();
            }
        }
    }
    public function makroLvlBDestroy($id){
        $data = Makrolvlb::where('id',$id)->first();
        $status = $data -> delete();
      
        session () ->flash('success','Data Berhasil Dihapus');
        return back();
    }
    public function makroLvlBEdit($id){
        $data = Makrolvlb::where('id',$id)->first();
        return view('sudoku.sop-makro.lvlbe',['data'=>$data]);
    }
    public function makroLvlBUpdate(Request $request, $id){
        $request -> validate([
            'kode' =>  'required',
            'nama' => 'required'
            
        ]);
        $data1 = Makrolvlb :: where('kode_sub_pro','=',$request->kode_peta.'.'.$request->kode)->Where('nm_sub_pro','=',$request->nama)->first(); 
        if($data1){
            session () ->flash('unsuccess','Kode atau Nama Sub Proses bisnis telah ada sebelumnya');
            return back();
        }else{
            $lvladefault = $request->kode_peta.'.';
            $lvlb = Makrolvlb ::findOrFail($id);
            $lvladefault = $lvlb->kode_sub_pro;
            $lvlb -> kode_sub_pro = $request->kode_peta.'.'.$request->kode; 
            $lvlb -> nm_sub_pro = $request->nama;
            $sts_b = $lvlb ->save();
            
            if($sts_b){
                $data2 = Makrolvlc :: where('sub_proses_id','=',$id)->get(['id','sub_proses_id','kode_peta']);
                $numItems = count($data2);
                $i = 0;
                if(!$data2->isEmpty()){
                    foreach ($data2 as $item1){
                        $lvlc = Makrolvlc ::findOrFail($item1->id);
                        $lvlc -> kode_peta = $request->kode_peta.'.'.$request->kode.Str :: substr($lvlc -> kode_peta, 9); 
                        $sts_c = $lvlc -> save();
    
                        if($sts_c){
                            $no1 = $item1->id;
                            $data3 = Makrolvld :: where('peta_id','=',$no1)->get(['id','peta_id','kode_sop']);
                            if(!$data3->isEmpty()){
                                foreach ($data3 as $item2){
                                    $lvld = Makrolvld ::findOrFail($item2->id);
                                    $lvld -> kode_sop = $request->kode_peta.'.'.$request->kode.Str :: substr($lvld -> kode_sop, 9); 
                                    $sts_d = $lvld -> save();
                                    
                                    if($sts_d){
                                        $no2 = $lvladefault.Str :: substr($lvld -> kode_sop, 9); 
                                        $data4 = Mikrolvla :: where('kode_makro','=',$no2)->get(['id','kode_makro']);
                                        if(!$data4->isEmpty()){
                                            foreach ($data4 as $item3){
                                                $lvle = Mikrolvla ::findOrFail($item3->id);
                                                $lvle -> kode_makro = $request->kode_peta.'.'.$request->kode.Str :: substr($lvld -> kode_sop, 9); 
                                                $sts_e = $lvle -> save();
                                                
                                                if($sts_e){
                                                    $data5 = Mikrolvlb :: where('kode_makro','=',$no2)->get(['id','kode_makro','kode_mikro']);
                                                    if(!$data5->isEmpty()){
                                                        foreach ($data5 as $item4){
                                                            $lvlf = Mikrolvlb ::findOrFail($item4->id);
                                                            $lvlf -> kode_mikro = $request->kode_peta.'.'.$request->kode.Str :: substr($lvlf -> kode_mikro, 9); 
                                                            $lvlf -> kode_makro = $request->kode_peta.'.'.$request->kode.Str :: substr($lvld -> kode_sop, 9); 
                                                            $sts_f = $lvlf -> save();
                                                            
                                                            if($sts_f){
                                                                $no3 = $lvladefault.Str :: substr($lvlf -> kode_mikro, 9);
                                                                $data6 = Formulirlvla :: where('induk_kode','=',$no3)->get(['id','induk_kode']);
                                                                if(!$data6->isEmpty()){
                                                                    foreach ($data6 as $item5){
                                                                        $lvlg = Formulirlvla ::findOrFail($item5->id);
                                                                        $lvlg -> induk_kode = $request->kode_peta.'.'.$request->kode.Str :: substr($lvlf -> kode_mikro, 9); 
                                                                        $sts_g = $lvlg -> save();
                    
                                                                        if($sts_g){
                                                                            $data7 = Formulirlvlb :: where('induk_kode','=',$no3)->get(['id','formulir_kode','induk_kode']);
                                                                            foreach ($data7 as $item6){
                                                                                $lvlh = Formulirlvlb ::findOrFail($item6->id);
                                                                                $lvlh -> induk_kode = $request->kode_peta.'.'.$request->kode.Str :: substr($lvlf -> kode_mikro, 9); 
                                                                                $sts_h = $lvlh -> save();
                                                                            }
                                                                            if($sts_h){
                                                                                // session () ->flash('success','Data Sukses Diedit');
                                                                                // return $this->makroLvlA();
                                                                            }
                                                                        }
                                                                    }
                                                                }else{
                                                                    // session () ->flash('success','Data Level B (SOP Makro) dan Level C (SOP Mikro)  sukses diedit');
                                                                    // return $this->makroLvlA();
                                                                }
                                                            }
                                                        }
                                                    }else{
                                                        // session () ->flash('success','Data Level B (SOP Makro) dan Level C (SOP Mikro)  sukses diedit');
                                                        // return $this->makroLvlA();
                                                    }
                                                }
                                            }
                                        }else{
                                            // session () ->flash('success','Data level B (SOP Makro) sukses diedit');
                                            // return $this->makroLvlA();
                                        }
                                    }
                                }
                            }else{
                                // session () ->flash('success','Data Sub Proses bisnis dan Peta Lintas Fungsi sukses diedit');
                                // return $this->makroLvlA();
                            }  
                        }
                        if(++$i === $numItems) {
                            session () ->flash('success','Data Sukses Diedit');
                            return $this->makroLvlA();
                        }
                    }
                }else{
                     session () ->flash('success','Data Sukses Diedit');
                    return $this->makroLvlA();
                }
            }else{
                session () ->flash('unsuccess','Data Gagal Diedit');
                return $this->mikroLvlA();
            } 
        }   
    }
    public function makroLvlC($id){
        $lvlc = Makrolvlc::where('sub_proses_id', '=', $id)->get();
        return view('sudoku.sop-makro.lvlcv',['lvlc'=>$lvlc,'proses_id'=>$id]);
    }
    public function makroLvlCInput($id){
        $data = Makrolvlb::where('id',$id)->first('kode_sub_pro');
        return view('sudoku.sop-makro.lvlci',['proses_id'=>$id,'kode'=>$data]);
    }
    public function makroLvlCStore(Request $request, $id){
      
        
         $data = Makrolvlc :: where('kode_peta','=',$request->kode)->orWhere('nm_peta','=',$request->nama)->first(); 
        if($data){
            session () ->flash('unsuccess','Kode atau Nama Peta telah ada');
            return back();
        }else{
            try{
               
                $peta               = new Makrolvlc();
                $peta->sub_proses_id    = $id;
                $peta->kode_peta        = $request->kode;
                $peta->nm_peta          = $request->nama;
                $peta->user_id          = Auth::user()->id;
                $peta->save();
                session () ->flash('success','Data Berhasil Diinput');
                return back();
            }catch(\Exception $e){
                session () ->flash('unsuccess',$e->getMessage());
                return back();
            }
        }
    }
    public function makroLvlCDestroy($id){
        try{
            $data = Makrolvlc::where('id',$id)->first();
            $data -> delete();
          
            session () ->flash('success','Data Berhasil Dihapus');
            return back();
        }catch(\Exception $e){
            session () ->flash('unsuccess',$e->getMessage());
            return back();
        }
      
    }
    public function makroLvlCEdit($id){
        $data = Makrolvlc::where('id',$id)->first();
        return view('sudoku.sop-makro.lvlce',['data'=>$data]);
    }
    public function makroLvlCUpdate(Request $request, $id){
        $request -> validate([
            'kode' =>  'required',
            'nama' => 'required'
            
        ]);
        $data1 = Makrolvlc :: where('kode_peta','=',$request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode)->Where('nm_peta','=',$request->nama)->first(); 
        if($data1){
            session () ->flash('unsuccess','Kode atau Nama Peta Lintas Fungsi telah ada sebelumnya');
            return back();
        }else{

            $lvlc = Makrolvlc ::findOrFail($id);
            $lvladefault = $lvlc->kode_peta;
            $lvlc -> kode_peta = $request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode; 
            $lvlc -> nm_peta = $request->nama;
            $sts_c = $lvlc -> save();

            if($sts_c){
                $data2 = Makrolvld :: where('peta_id','=',$id)->get(['id','peta_id','kode_sop']);
                $numItems = count($data2);
                $i = 0;
                if(!$data2->isEmpty()){
                    foreach ($data2 as $item1){
                        $lvld = Makrolvld ::findOrFail($item1->id);
                        $lvld -> kode_sop = $request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode.Str :: substr($lvld -> kode_sop, 16); 
                        $sts_d = $lvld -> save();
                        
                        if($sts_d){
                            $no1 = $lvladefault.Str :: substr($lvld -> kode_sop, 16); 
                            $data3 = Mikrolvla :: where('kode_makro','=',$no1)->get(['id','kode_makro']);
                            if(!$data3->isEmpty()){
                                foreach ($data3 as $item2){
                                    $lvle = Mikrolvla ::findOrFail($item2->id);
                                    $lvle -> kode_makro = $request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode.Str :: substr($lvld -> kode_sop, 16); 
                                    $sts_e = $lvle -> save();
                                    
                                    if($sts_e){
                                        $data4 = Mikrolvlb :: where('kode_makro','=',$no1)->get(['id','kode_makro','kode_mikro']);
                                        if(!$data4->isEmpty()){
                                            foreach ($data4 as $item3){
                                                $lvlf = Mikrolvlb ::findOrFail($item3->id);
                                                $lvlf -> kode_mikro = $request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode.Str :: substr($lvlf -> kode_mikro, 16); 
                                                $lvlf -> kode_makro = $request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode.Str :: substr($lvld -> kode_sop, 16); 
                                                $sts_f = $lvlf -> save();
                                                
                                                if($sts_f){
                                                    $no2 = $lvladefault.Str :: substr($lvlf -> kode_mikro, 16);
                                                    $data5 = Formulirlvla :: where('induk_kode','=',$no2)->get(['id','induk_kode']);
                                                    if(!$data4->isEmpty()){
                                                        foreach ($data5 as $item4){
                                                            $lvlg = Formulirlvla ::findOrFail($item4->id);
                                                            $lvlg -> induk_kode = $request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode.Str :: substr($lvlf -> kode_mikro, 16); 
                                                            $sts_g = $lvlg -> save();
                
                                                            if($sts_g){
                                                                $data6 = Formulirlvlb :: where('induk_kode','=',$no2)->get(['id','formulir_kode','induk_kode']);
                                                                foreach ($data6 as $item5){
                                                                    $lvlh = Formulirlvlb ::findOrFail($item5->id);
                                                                    $lvlh -> induk_kode = $request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode.Str :: substr($lvlf -> kode_mikro, 16); 
                                                                    $sts_h = $lvlh -> save();
                                                                }
                                                                if($sts_h){
                                                                    // session () ->flash('success','Data Sukses Diedit');
                                                                    // return $this->makroLvlA();
                                                                }
                                                            }
                                                        }
                                                    }else{
                                                        // session () ->flash('success','Data Level B (SOP Makro) dan Level C (SOP Mikro)  sukses diedit');
                                                        // return $this->makroLvlA();
                                                    } 
                                                }
                                            }
                                        }else{
                                            // session () ->flash('success','Data Level B (SOP Makro) dan Level C (SOP Mikro)  sukses diedit');
                                            // return $this->makroLvlA();
                                        }   
                                    }
                                }
                            }else{
                                // session () ->flash('success','Data level B (SOP Makro) sukses diedit');
                                // return $this->makroLvlA();
                            }
                        }
                        if(++$i === $numItems) {
                            session () ->flash('success','Data Sukses Diedit');
                            return $this->makroLvlA();
                        }
                    }
                }else{
                    session () ->flash('success','Data Sukses Diedit');
                    return $this->makroLvlA();
                }
            }else{
                session () ->flash('unsuccess','Data Gagal Diedit');
                return $this->mikroLvlA();
            }
        }   
    }
    public function makroLvlD($id){
        $lvld = Makrolvld :: where('peta_id','=',$id)->get();
        // $lvle = Makrolvle :: where('sop_id','=',)
        return view('sudoku.sop-makro.lvldv',['lvld'=>$lvld,'proses_id'=>$id]);
    }
    public function makroLvlDInput($id){
        $data = Makrolvlc::where('id',$id)->first('kode_peta');
        return view('sudoku.sop-makro.lvldi',['proses_id'=>$id,'kode'=>$data]);
    }
    public function makroLvlDStore(Request $request, $id){
       
         $data = Makrolvld :: where('kode_sop','=',$request->kode)->orWhere('judul_sop','=',$request->nama)->first(); 
        if($data){
            session () ->flash('unsuccess','Kode atau Judul SOP Makro telah ada');
            return back();
        }else{
            try{
                $makro                   = new Makrolvld();
                $makro->peta_id          = $id;
                $makro->kode_sop         = $request->kode;
                $makro->judul_sop        = $request->nama;
                $makro->user_id          = Auth::user()->id;
    
                if($request->filepdf!= ''){        
                    $path = public_path().'/storage/sop-makro/';
    
                    //upload new file
                    $file1 = $request->filepdf;
                    $filename1 = "/storage/sop-makro/".time().$file1->getClientOriginalName();
                    $file1->move($path, $filename1);
                    $makro->file = $filename1;
        
                }
    
                $makro->save();
                $new_id = $makro->id;
    
                // Save Revisi
                $dt = \Carbon\Carbon::now();
                $rev = new Makrolvle();
                $rev -> sop_id      = $new_id;
                $rev->tgl_terbit    = $request->tgl_terbit;
                $rev->waktu         = 1;
                $rev->revisi        = 1;
                $rev->user_id       = Auth::user()->id;
                $rev->save();
    
    
                session () ->flash('success','Data Berhasil Diinput');
                return back();
            }catch(\Exception $e){
                session () ->flash('unsuccess',$e->getMessage());
                return back();
            }
        }
    }
    public function view_file($id){
        $data = Makrolvld::where('id',$id)->first('file');
        return view('sudoku.priview_file',['data'=>$data]);
    }
    public function makroLvlDDestroy($id){
        try{
            $data = Makrolvld::where('id',$id)->first();
            $status = $data -> delete();
            if($status){
                $data2 = Makrolvle::where('sop_id','=', $id)->first();
                $status2 = $data2 -> delete();
                if($status2){
                    if($data->file && file_exists(public_path().$data->file)){
                        // unlink(public_path().$data->file);
                    }
                }
            }
            session () ->flash('success','Data Berhasil Dihapus');
            return back();
        }catch(\Exception $e){
            session () ->flash('unsuccess',$e->getMessage());
            return back();
        }
    }
    public function makroLvlDEdit($id){
        $data = Makrolvld::where('id',$id)->first();
        return view('sudoku.sop-makro.lvlde',['data'=>$data]);
    }
    public function makroLvlDUpdate(Request $request, $id){
        $request -> validate([
            'kode' =>  'required',
            'nama' => 'required'
            
        ]);
        $data1 = Makrolvld :: where('kode_sop','=',$request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode_lintas.'/'.$request->kode)->Where('judul_sop','=',$request->nama)->first(); 
        if($data1){
            session () ->flash('unsuccess','Kode atau Judul SOP Makro telah ada sebelumnya');
            return back();
        }else{

            $lvld = Makrolvld ::findOrFail($id);
            $lvladefault = $lvld->kode_sop;
            $lvld -> kode_sop = $request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode_lintas.'/'.$request->kode; 
            $lvld -> judul_sop = $request->nama;
            $sts_d = $lvld -> save();
            
            if($sts_d){
                $data2 = Mikrolvla :: where('kode_makro','=', $lvladefault)->get(['id','kode_makro']);
                $numItems = count($data2);
                $i = 0;
                if(!$data2->isEmpty()){
                    foreach ($data2 as $item1){
                        $lvle = Mikrolvla ::findOrFail($item1->id);
                        $lvle -> kode_makro = $request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode_lintas.'/'.$request->kode; 
                        $sts_e = $lvle -> save();
                        
                        if($sts_e){
                            $data3 = Mikrolvlb :: where('kode_makro','=',$lvladefault)->get(['id','kode_makro','kode_mikro']);
                            if(!$data3->isEmpty()){
                                foreach ($data3 as $item2){
                                    $lvlf = Mikrolvlb ::findOrFail($item2->id);
                                    $lvlf -> kode_mikro = $request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode_lintas.'/'.$request->kode.Str :: substr($lvlf -> kode_mikro, 23); 
                                    $lvlf -> kode_makro = $request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode_lintas.'/'.$request->kode; 
                                    $sts_f = $lvlf -> save();
                                    
                                    if($sts_f){
                                        $no1 = $lvladefault.Str :: substr($lvlf -> kode_mikro, 23);
                                        $data4 = Formulirlvla :: where('induk_kode','=',$no1)->get(['id','induk_kode']);
                                        if(!$data4->isEmpty()){
                                            foreach ($data4 as $item3){
                                                $lvlg = Formulirlvla ::findOrFail($item3->id);
                                                $lvlg -> induk_kode = $request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode_lintas.'/'.$request->kode.Str :: substr($lvlf -> kode_mikro, 23); 
                                                $sts_g = $lvlg -> save();

                                                if($sts_g){
                                                    $data5 = Formulirlvlb :: where('induk_kode','=',$no1)->get(['id','formulir_kode','induk_kode']);
                                                    foreach ($data5 as $item4){
                                                        $lvlh = Formulirlvlb ::findOrFail($item4->id);
                                                        $lvlh -> induk_kode = $request->kode_peta.'.'.$request->kode_sub.'/'.$request->kode_lintas.'/'.$request->kode.Str :: substr($lvlf -> kode_mikro, 23); 
                                                        $sts_h = $lvlh -> save();
                                                    }
                                                    if($sts_h){
                                                        // session () ->flash('success','Data Sukses Diedit');
                                                        // return $this->makroLvlA();
                                                    }
                                                }
                                            }
                                        }else{
                                            // session () ->flash('success','Data Level B (SOP Makro) dan Level C (SOP Mikro)  sukses diedit');
                                            // return $this->makroLvlA();
                                        }
                                    }
                                }
                            }else{
                                // session () ->flash('success','Data Level B (SOP Makro) dan Level C (SOP Mikro)  sukses diedit');
                                // return $this->makroLvlA();
                            }
                        }
                        if(++$i === $numItems) {
                            session () ->flash('success','Data Sukses Diedit');
                            return $this->makroLvlA();
                        }
                    }
                }else{
                    session () ->flash('success','Data Sukses Diedit');
                    return $this->makroLvlA();
                }
            }else{
                session () ->flash('unsuccess','Data Gagal Diedit');
                return $this->mikroLvlA();
            } 
            
        }   
    }
    public function makroLvlE($id){
        $lvle = Makrolvle :: where('sop_id','=',$id)->get();
        $data = Makrolvld::where('id',$id)->first('kode_sop');
        return view('sudoku.sop-makro.lvlev',['lvle'=>$lvle,'proses_id'=>$id,'kode'=>$data]);
    }
    public function makroLvlEInput($id){
        $data = Makrolvld::where('id',$id)->first();
        return view('sudoku.sop-makro.lvlei',['proses_id'=>$id,'kode'=>$data]);
    }
    public function makroLvlEStore(Request $request, $id){
        // try{
            $request -> validate([
                'tgl_terbit' => 'required',
                'filepdf' => 'mimes:pdf'
            ]);
        // }catch(\Exception $e){
        //     session () ->flash('unsuccess',$e->getMessage());
        //     return back();
        // }
        $lvle = new Makrolvle();
        $lvle -> user_id    = Auth::user()->id;
        $lvle -> sop_id     = $id;
        $lvle -> tgl_terbit = $request->tgl_terbit;
        $lvle -> waktu      = $request->waktu;

        // get max value revisi
        $data = Makrolvle :: where('sop_id','=',$id)->get();
        $maxrev =  $data -> max('revisi');

        $lvle -> revisi     = $maxrev + 1;
        $status = $lvle ->save();

        if($status){
            if($request->filepdf!= ''){  
                $path = public_path().'/storage/sop-makro/';

                $makro = Makrolvld :: where('id', '=', $id)->first();
                if($makro->file && file_exists(public_path().$makro->file)){
                    // unlink(public_path().$makro->file);
                }
                
                $file1 = $request->filepdf;
                $filename1 = "/storage/sop-makro/".time().$file1->getClientOriginalName();
                $file1->move($path, $filename1);
                $makro->file = $filename1;
                $makro->save();
                session () ->flash('success','Data berhasil disimpan');
                return back();

            }else{
                session () ->flash('unsuccess','File pdf tidak ditemukan');
                return back();
            }
        }else{
            session () ->flash('unsuccess','Input data gagal');
            return back();
        }
    }
    public function editRevisi($id,){
        $rev = Makrolvle :: where('id',$id)->first();
        return view('sudoku.sop-makro.lvleedit',['id'=>$rev]);
    }
    public function updateRevisi(Request $request, $id){
        $request -> validate([
            'tgl_terbit' => 'required',
            'no_rev' => 'required',
        ]);
        $lvlc = Makrolvle :: where('id',$id)->first();
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
