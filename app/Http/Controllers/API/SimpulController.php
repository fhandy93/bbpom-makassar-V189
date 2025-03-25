<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ujiparameter;
use App\Models\Ujikategory;
use App\Models\Ujisubkat;
use App\Models\Transuji;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SimpulController extends Controller
{
    public function index(){
        try{
            $kat = Ujikategory :: count();
            $katpangan = Ujikategory :: where('type',1)->count();
            $katkos = Ujikategory :: where('type',2)->count();
            $katobat = Ujikategory :: where('type',3)->count();
            $katot = Ujikategory :: where('type',4)->count();
            $sub = Ujisubkat :: count();
            $par = Ujiparameter :: count();
            $counts = [
                         'kat'=>$kat,
                         'katpangan'=>$katpangan,
                         'katkos'=>$katkos,
                         'katobat'=>$katobat,
                         'katot'=>$katot,
                         'sub'=>$sub,
                         'par'=>$par
                ];
          
            
            return response()->json(['status' => 'sukses']+$counts,200);
        }catch (Exception $e) {
            Log::error('Error in get index', ['error' => $e->getMessage()]);
            // Response dengan status code 500 (Internal Server Error)
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
        
    }
    public function param($id){
        
        try{
            $par = Ujiparameter :: join('trans_uji','uji_parameter.id','=', 'trans_uji.parameter_id') 
                            ->where('trans_uji.sub_id',$id)->get();
            $sub = Ujisubkat :: where('id',$id)->first(['kat_id','nm_sub_kategory']);
            $kat = Ujikategory :: where('id',$sub->kat_id)->first(['nm_kategory','type']);
        
            if (empty($par || $sub || $kat)) {
                return response()->json([
                    'status' => 'success',
                    'data' => [],
                    'message' => 'No items found.',
                ], 200);
            }
        
            return response()->json(['status'=>'success','par'=>$par,'sub'=>$sub,'kat'=>$kat],200);
            
        }catch (Exception $e) {
            Log::error('Error in search API', ['error' => $e->getMessage()]);
            // Response dengan status code 500 (Internal Server Error)
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }

    }
    public function kategori($id){
        if($id=='pangan'){
            $commo = 1;
        }else if($id=='kosmetik'){
            $commo = 2;
        }else if($id=='obat'){
            $commo = 3;
        }else if($id=='obat-bahan-alam'){
            $commo = 4;
        }
        $countkat =  Ujikategory :: where('type',$commo)->count();
        
        $data = Ujikategory :: where('type',$commo)->get();
        // $count = count(Ujipangansubkat ::get());
        $count = array();
        $countpar = array();
        
        foreach($data as $item){
            $total = count($sub = Ujisubkat :: where('kat_id',$item->id)->get('id'));
            array_push($count,$total);
            $total3 = 0;
            foreach($sub as $sb){
                $total2 = count(Transuji::where('sub_id',$sb->id)->get('id'));
                $total3 = $total3 + $total2;
            }
            // echo $sub;
            array_push($countpar,$total3);
        }   
        
        
        return response()->json(['data'=>$data,'sub'=>$count, 'par'=>$countpar, 'countkat'=>$countkat]);
    }
    public function subKat($id){
        $header = Ujikategory :: where('id',$id)->first();
        $data = Ujisubkat :: where('kat_id',$id)->get();

        $countkat = count($sub = Ujisubkat :: where('kat_id',$id)->get('id'));

            $total3 = 0;
            foreach($sub as $sb){
                $total2 = count(Transuji::where('sub_id',$sb->id)->get('id'));
                $total3 = $total3 + $total2;
            }
           $total3 ;

        $count = array();
        foreach($data as $item){
            $total = count(Transuji :: where('sub_id',$item->id)->get('id'));
            array_push($count,$total);
        }
        
        return response()->json(['data'=>$data,
                                  'header'=>$header,
                                  'par'=>$count, 
                                  'countpar'=>$total3,
                                  'countkat'=>$countkat
                                 ],200);
    }
    public function katPanganSearch(Request $req){
        
         Log::info('Received search request', ['query' => $req->input('query')]);
         
        try {
              $validator = Validator::make($req->all(), [
                'query' => 'required|min:2',
            ]);
        
            if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
            }
            $query = $req->input('query');
             $data = Ujikategory :: where('nm_kategory', 'LIKE', "%{$query}%")
                    ->orWhere('descript', 'LIKE', "%{$query}%")
                    ->get();
        
            if ($data->isEmpty()) {
                return response()->json([
                'status' => 'success',
                'data' => [],
                'message' => 'No results found.',
                ], 200);
            }      
        
            // Kembalikan response
            return response()->json([
                'status' => 'success',
                'data' => $data,
                ], 200);
            
        }catch (Exception $e) {
            
            Log::error('Error in search API', ['error' => $e->getMessage()]);
            // Response dengan status code 500 (Internal Server Error)
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
            
        }
    }
    public function searchSub(Request $req){
        Log::info('Received search request', ['jenis' => $req->input('jenis'),'comodity' => $req->input('comodity')]);
        
        try{
            $validator = Validator::make($req->all(), [
                'jenis' => 'required|min:2',
                'comodity' => 'required|integer',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors()->first(),
                ], 400);
            }
            
            $kat = Ujikategory::where('type', $req->input('comodity'))->pluck('id');
            
            if ($kat->isEmpty()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Kategori tidak ditemukan.',
                    'data' => [],
                ], 200);
            }
            
            $data = Ujisubkat::with(['uji_kategory'])
            ->whereIn('kat_id', $kat)
            ->where('nm_sub_kategory', 'LIKE', "%{$req->input('jenis')}%")
            ->withCount('transuji')
            ->get();
            
             if ($data->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data sub kategori tidak ditemukan.',
                'data' => [],
            ], 200);
            }
            
            return response()->json([
                'status' => 'success',
                'data' => $data,
                'count' => $data->count(),
                'countpar' => $data->sum('transuji_count')
                ], 200);
        }catch (Exception $e) {
            Log::error('Terjadi kesalahan pada API searchSub', ['error' => $e->getMessage()]);

            // Response dengan status code 500 (Internal Server Error)
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
        
    }
}
