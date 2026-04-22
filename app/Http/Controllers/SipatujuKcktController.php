<?php

namespace App\Http\Controllers;

use App\Models\SITujuAlat;
use App\Models\SITujuBaku;
use App\Models\SITujuLodLoq;
use App\Models\SITujuPustaka;
use App\Models\SITujuZatuji;
use Illuminate\Http\Request;

class SipatujuKcktController extends Controller
{
    public function index(){
        $uji = SITujuZatuji :: get();
        $merek = SITujuAlat :: select('merek')
                ->distinct()
                ->orderBy('merek')
                ->get();
        // $pustaka = SITujuPustaka :: get();
        return view('sipatuju.kckt.form-kckt',['uji'=>$uji,'merek'=>$merek]);
    }
    public function getPustaka($id){
        $pustaka = SITujuPustaka::where('uji_id', $id)->get();
        return response()->json($pustaka);
    }
    public function getDetailPustaka($id)
    {   
        $pustaka = SITujuPustaka::find($id);
        return response()->json($pustaka);
    }
    public function getTipeSeri($merek)
    {
        $data = SITujuAlat::where('merek', $merek)->get();
        return response()->json($data);
    }
    public function getNoKontrolByUji($uji_id)
    {
        $data = SITujuBaku::select('id', 'no_kontrol')
                    ->where('uji_id', $uji_id)
                    ->get();

        return response()->json($data);
    }
    public function getDetailBaku($id)
    {
        $data = SITujuBaku::find($id);
        return response()->json($data);
    }
    public function getParameterUji($id_uji)
    {
        $data = SITujuLodLoq::where('uji_id', $id_uji)->get();

        if (!$data) {
            return response()->json(null);
        }

        return response()->json($data);
    }


}
