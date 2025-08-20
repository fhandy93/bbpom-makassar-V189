<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Infopomkat;
use App\Models\InfopomLearQuest;
use App\Models\Infopomqna;
use App\Models\InfopomInfoWeb;
use App\Models\InfopomVisitor;
use App\Models\InfopomWebHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InfopomController extends Controller
{
    public function qnaUmum(){
        $data = Infopomqna ::where('kategori_id',1)->get();
        return response()->json(['qna'=>$data]);
    }
    public function qnadetail(){
        $qna = Infopomkat :: with(['qnas:id,tanya,jawab,kategori_id'])->select('id','title','nm_kategori')->get();
        return response()->json(['qna'=>$qna]);
    }
    public function learning($kat, $id){
        $data = InfopomLearQuest ::where('kategori_id',$kat)->where('parent_answers_id',$id)->get();
        return response()->json(['qna'=>$data]);
    }
    public function infoWeb(){
        $data = InfopomInfoWeb :: get(['id','title','desc','url']);
        return response()->json(['info'=>$data]);
    } 
    public function webHeader($id){
        $data = InfopomWebHeader :: where('header',$id)->get(['id','header','title']);
        return response()->json(['info'=>$data]);
    }
    public function visitor(Request $request){
       $dt = Carbon::now()->toDateString();
        $view = InfopomVisitor :: where('ip_addres','=',$request ->ip_address)
                                ->whereDate('created_at','=',$dt)
                                ->first();
        if(!$view){
            InfopomVisitor::create([
            'ip_addres' => $request ->ip_address,
            'agent' => $request ->agent,
            ]);
        }
        $data = $request ->ip_address;
        $data2 = $request ->agent;
        return response()->json(['ip' => $data,'agent'=>$data2]);
    }
}
