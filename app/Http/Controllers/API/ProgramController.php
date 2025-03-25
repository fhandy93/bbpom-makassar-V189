<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Http\Resources\ProgramResource;
use App\Models\Sappai;
use App\Models\Kuisioner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sappai ::latest()->get();
        return response()->json(ProgramResource::collection($data));
    }
    

    public function sample($id)
    {
         $program = Sappai::where('user_id','=',$id)->get();
        if (is_null($program)) {
            return response()->json('Data not found', 404); 
        }
        return response()->json(ProgramResource::collection($program));
    }
     public function detail($id,$idn)
    {
        $program = Sappai:: join('kuisioner','kuisioner.user_id','=', 'sample.user_id')
        ->where('sample.user_id','=',$id)->where('sample.kode','=',$idn)
        ->get();
              
        if ($program->isEmpty()) {
            return response()->json(['erorr'=>'Data not found']); 
        }else{
            return response()->json(ProgramResource::collection($program));
        }
    }
    
    
    
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required',
            'usia' => 'required',
            'jk' => 'required',
            'hp' => 'required',
            'instansi' => 'required',
            'user_id' => 'required',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors());       
        }
        $isi = Kuisioner::where('user_id', $request->user_id)->first();
        if($isi != null){
            return response()->json(['status' => 'isi']); 
        }else{
        Kuisioner::create([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'usia' => $request->usia,
            'jk' => $request->jk,
            'hp' => $request->hp,
            'p1' => $request->p1,
            'p2' => $request->p2,
            'instansi' => $request->instansi,
            'p3' => $request->p3,
            'p4' => $request->p4,
            'p5' => $request->p5,
            'p6' => $request->p6,
            'p7' => $request->p7,
            'p8' => $request->p8,
            'p9' => $request->p9,
            'p10' => $request->p10,
            'p11' => $request->p11,
            'p12' => $request->p12,
            'p13' => $request->p13,
            'p14' => $request->p14,
            'p15' => $request->p15,
            'p16' => $request->p16,
            'p17' => $request->p17,
            'p18' => $request->p18,
            'p19' => $request->p19,
         ]);
        
        return response()->json(['status' => 'sukses']);
        }
    }

   public function loadData($id){
        $program = Sappai::where('user_id','=',$id)->get();
        $jumlah = count($program);
        $program2 = Sappai::where('user_id','=',$id)->where('tahap','=', 4)->get();
        $jumlah_selesai = count($program2);
        if (is_null($program)) {
            return response()->json('Data not found', 404); 
        }else{
            return response()->json(['jumlah_sample' => $jumlah,
                                     'jumlah_selesai' => $jumlah_selesai]); 
        }
    }

}