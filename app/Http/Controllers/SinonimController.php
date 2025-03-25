<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Reagensia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SinonimController extends Controller
{
    public function index(){
        return view('sinonim.index');
    }
    public function inventory(){
        return view ('sinonim.bidang');
    }
    public function inventorystore(Request $request){
        $validator = Validator::make($request->all(), [
            "nama"      => "required",  
            "ket"  => "required"
        ]);
        $post               = new Bidang();
        $post->nama         = $request->nama;
        $post->ket          = $request->ket;
        $post->save();
        return back()->with('succes', 'Data berhasil diinput');
    }
    public function inventoryview(){
        $data = Bidang :: get();
        return view ('sinonim/bidangv',['bidang'=> $data]);
    }
    public function inventorydelete($id){
        $bidang = Bidang::findOrFail($id);
        $bidang->delete();

        return redirect()->back()->with('success','Data moved to trash');
    }
   
}
