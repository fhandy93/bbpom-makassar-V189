<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Petugas;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
 
    public function kurang(){
        $title = "Kurang Puas";
        $skala = 1;
        $petugas = Petugas :: get(['id','nama','foto']);
        $surveyor = Layanan ::whereDate('created_at', '=', date('Y-m-d'))->get(['id','nama']);
        return view('survey.index',['title'=>$title,'petugas'=>$petugas,'surveyor'=>$surveyor,'skala'=>$skala]);
    }
    public function cukPuas(){
        $title = "Cukup Puas";
        $skala = 2;
        $petugas = Petugas :: get(['id','nama','foto']);
        $surveyor = Layanan ::whereDate('created_at', '=', date('Y-m-d'))->get(['id','nama']);
        return view('survey.index',['title'=>$title,'petugas'=>$petugas,'surveyor'=>$surveyor,'skala'=>$skala]);
    }
    public function puas(){
        $title = "Puas";
        $skala = 3;
        $petugas = Petugas :: get(['id','nama','foto']);
        $surveyor = Layanan ::whereDate('created_at', '=', date('Y-m-d'))->get(['id','nama']);
        return view('survey.index',['title'=>$title,'petugas'=>$petugas,'surveyor'=>$surveyor,'skala'=>$skala]);
    }
    public function sanPuas(){
        $title = "Sangat Puas";
        $skala = 4;
        $petugas = Petugas :: get(['id','nama','foto']);
        $surveyor = Layanan ::whereDate('created_at', '=', date('Y-m-d'))->get(['id','nama']);
        return view('survey.index',['title'=>$title,'petugas'=>$petugas,'surveyor'=>$surveyor,'skala'=>$skala]);
    }
    public function picture($id){
        $pic = Petugas :: where('id','=',$id)->first();
        return response()->json($pic);
    
    }
    public function store(Request $req){
        $req->validate([
            'surveyor' => 'required',
            'petugas' => 'required',
            'skala' => 'required',
            'kesigapan' => 'required',
            'sikap' => 'required',
            'tampilan' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ],
        [
            'surveyor.required' => 'Nama Surveyor harus dipilih!',
            'petugas.required' => 'Nama Petugas harus dipilih!',
            'kesigapan.required' => 'Kesigapan Petugas harus dipilih!',
            'sikap.required' => 'Sikap Petugas harus dipilih!',
            'tampilan.required' => 'Penampilan Petugas harus dipilih!',
            'g-recaptcha-response.required' => 'Google Captcha harus diisi!'
        ]);
        
        echo $lay = Survey :: where('layanan_id','=',$req->surveyor)->first('id');
        if($lay){
            session () ->flash('unsuccess','Nama surveyor telah melakukan survey, silakan melakukan survey dengan memilih nama surveyor yang tepat !!');
            return back();
        }else{
            $surv                    = new Survey();
            $surv->layanan_id        = $req->surveyor;
            $surv->petugas_id        = $req->petugas;    
            $surv->skala_survey      = $req->skala;  
            $surv->tampilan          = $req->tampilan;
            $surv->sikap             = $req->sikap;
            $surv->kesigapan         = $req->kesigapan;
            $status = $surv->save();   
            if($status){
                session () ->flash('success','Survey Berhasil diinput');
                $data = Layanan :: whereMonth('created_at', '=', date('m'))->get('id');
                $count = $data->count();
                return view('welcome',['data'=>$count]);
            }else{
                $message = 'Survey Unsuccessful !';
                return view('error',['message'=>$message]);
            }
        }
       
    }
}
