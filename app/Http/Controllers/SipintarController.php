<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Petugas;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SipintarController extends Controller
{
    public function index(){
        for($i=1;$i<=12;$i++){
            ${"data$i"} = Layanan :: whereMonth('created_at', '=', $i)->whereYear('created_at', '=', date('Y'))->get('id');
            ${"count$i"} = ${"data$i"}->count();
            ${"survey$i"} = Survey :: whereMonth('created_at', '=', $i)->whereYear('created_at', '=', date('Y'))->get('id');
            ${"countsurvey$i"} = ${"survey$i"}->count();
        }
        $jsurvey = Survey :: whereYear('created_at', '=', date('Y'))->get('id');
         $totalSurveys = $jsurvey->count(); // Hitung total survei
        $kpuas = Survey :: whereYear('created_at', '=', date('Y'))->where('skala_survey','=', 1)->get('id');
        $cpuas = Survey :: whereYear('created_at', '=', date('Y'))->where('skala_survey','=', 2)->get('id');
        $puas = Survey :: whereYear('created_at', '=', date('Y'))->where('skala_survey','=', 3)->get('id');
        $spuas = Survey :: whereYear('created_at', '=', date('Y'))->where('skala_survey','=', 4)->get('id');
        $ckpuas = $totalSurveys > 0 ? ($kpuas->count() * 100) / $totalSurveys : 0;
        $ccpuas = $totalSurveys > 0 ? ($cpuas->count() * 100) / $totalSurveys : 0;
        $cpuass = $totalSurveys > 0 ? ($puas->count() * 100) / $totalSurveys : 0;
        $cspuas = $totalSurveys > 0 ? ($spuas->count() * 100) / $totalSurveys : 0;
        return view('sipintar.index',compact('count1',
                                             'count2',
                                             'count3',
                                             'count4',
                                             'count5',
                                             'count6',
                                             'count7',
                                             'count8',
                                             'count9',
                                             'count10',
                                             'count11',
                                             'count12',
                                            'countsurvey1',
                                            'countsurvey2',
                                            'countsurvey3',
                                            'countsurvey4',
                                            'countsurvey5',
                                            'countsurvey6',
                                            'countsurvey7',
                                            'countsurvey8',
                                            'countsurvey9',
                                            'countsurvey10',
                                            'countsurvey11',
                                            'countsurvey12',
                                            'ckpuas',
                                            'ccpuas',
                                            'cpuass',
                                            'cspuas'
                                            ));
    }
    public function dataTamu(){
        $datamu = Layanan :: whereYear('created_at', '=', date('Y'))
                            ->orderBy('created_at', 'DESC')
                            ->get(['id','nama','created_at','no_antrian','jns_layanan','hp']);
        return view('sipintar.tamuv',['data'=>$datamu]);
    }
    public function detailTamu($id){
        $datamu = Layanan :: where('id', '=', $id)->first();
        return view('sipintar.detail',['data'=>$datamu]);
    }
    public function dataTugas(){
        $data = Petugas :: get();
        return view('sipintar.petugasv',['data'=>$data]);
    }
    public function dataSurvey(){
        $data = Survey :: whereYear('created_at', '=', date('Y'))
                            ->orderBy('created_at', 'DESC')
                            ->get();
        return view('sipintar.surveyv',['data'=>$data]);
    }
    public function filterSurvey(Request $req){
        if($req->tahun == 'Pilih Tahun' && $req->bulan=='Pilih Bulan'){
            $data = Survey :: whereYear('created_at', '=', date('Y'))
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('sipintar.surveyv',['data'=>$data]);
        }else if($req->tahun == 'Pilih Tahun'){
            $data = Survey :: whereMonth('created_at', '=', $req->bulan)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('sipintar.surveyv',['data'=>$data]);
        }else if($req->bulan=='Pilih Bulan'){               
            $data = Survey :: whereYear('created_at', '=', $req->tahun)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('sipintar.surveyv',['data'=>$data]);
        }else{
            $data = Survey :: whereYear('created_at', '=', $req->tahun)
            ->whereMonth('created_at', '=', $req->bulan)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('sipintar.surveyv',['data'=>$data]);
        }
        
    }
    public function inputTugas(){
        return view('sipintar.petugasi');
    }
    public function storeTugas(Request $req){
        Validator::make($req->all(), [
            "nama"      => "required",
            "nip"      => "required",
        ]);

        $tugas = new Petugas();
        $tugas-> nama = $req->nama;
        $tugas-> nip = $req->nip;
        if($req->file){
            $path = public_path().'/storage/petugas-yanblik/';
            //upload new file
            $file1 = $req->file;
            $fileName = $file1->getClientOriginalName();
            $file1->move($path, $fileName);
            $tugas-> foto = 'https://bbpom-makassar.com/storage/petugas-yanblik/'.$fileName;
        }
        $status = $tugas->save();
        if($status){
            session () ->flash('success','Data Petugas berhasil diinput!');
            return $this->dataTugas();
        }else{
            session () ->flash('unsuccess','Data Petugas gagal diinput!');
            return $this->dataTugas();
        }
    }
    public function editTugas($id){
        $data = Petugas :: where('id','=',$id)->first();
        return view('sipintar.petugase',['data'=>$data]);
    }
    public function updateTugas(Request $req,$id){
        Validator::make($req->all(), [
            "nama"      => "required",
            "nip"      => "required",
        ]);

        $ptgs = Petugas ::findOrFail($id);
        
        
        $ptgs->nama = $req->nama;
        $ptgs->nip = $req->nip;
        if($req->file != ''){  
            $path = public_path().'/storage/petugas-yanblik/';

            if($ptgs->foto && file_exists(public_path().'/storage/petugas-yanblik/'.substr($ptgs->foto,51))){
                // echo "detect";
                unlink(public_path().'/storage/petugas-yanblik/'.substr($ptgs->foto,51));
            }else{
                session () ->flash('unsuccess','File foto tidak ditemukan');
                return $this->dataTugas();
            }
            //upload new file
            $file1 = $req->file;
            $fileName = $file1->getClientOriginalName();
            $file1->move($path, $fileName);
            $ptgs-> foto = 'https://bbpom-makassar.com/storage/petugas-yanblik/'.$fileName;
        }
        $status = $ptgs -> save();
        if($status){
            session () ->flash('success','File berhasil diedit !');
            return $this->dataTugas();
        }else{
            session () ->flash('unsuccess','File gagal diedit !');
            return $this->dataTugas();
        }

    }
    public function deleteTugas($id){
        $ptgs = Petugas ::findOrFail($id);
        // echo $ptgs->foto,51;
        if($ptgs->foto != ''){  

            if($ptgs->foto && file_exists(public_path().'/storage/petugas-yanblik/'.substr($ptgs->foto,51))){
                // echo "detect";
                unlink(public_path().'/storage/petugas-yanblik/'.substr($ptgs->foto,51));
            }else{
                session () ->flash('unsuccess','File foto tidak ditemukan');
                return $this->dataTugas();
            }
        }
        $status = $ptgs->delete();
        if($status){
            session () ->flash('success', 'Data berhasil dihapus');
            return $this->dataTugas();
        }else{
            session () ->flash('unsuccess', 'Data gagal dihapus');
            return $this->dataTugas();
        }
    }
    public function deleteTamu($id){
        $status= Layanan :: where('id','=',$id)->delete();
        if($status){
            return back()->with('success', 'Data berhasil dihapus');
        }else{
            return back()->with('unsuccess', 'Data gagal dihapus');
        }
    }
    public function filterTamu(Request $req){

        if($req->tahun == 'Pilih Tahun' && $req->bulan=='Pilih Bulan'){
            $datamu = Layanan :: whereYear('created_at', '=', date('Y'))
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('sipintar.tamuv',['data'=>$datamu]);
        }else if($req->tahun == 'Pilih Tahun'){
            $datamu = Layanan :: whereMonth('created_at', '=', $req->bulan)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('sipintar.tamuv',['data'=>$datamu]);
        }else if($req->bulan=='Pilih Bulan'){               
            $datamu = Layanan :: whereYear('created_at', '=', $req->tahun)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('sipintar.tamuv',['data'=>$datamu]);
        }else{
            $datamu = Layanan :: whereYear('created_at', '=', $req->tahun)
            ->whereMonth('created_at', '=', $req->bulan)
            ->orderBy('created_at', 'DESC')
            ->get();
            return view('sipintar.tamuv',['data'=>$datamu]);
        }
    }
        public function deleteSurvey($id){
        $status= Survey :: where('id','=',$id)->delete();
        if($status){
            return back()->with('success', 'Data berhasil dihapus');
        }else{
            return back()->with('unsuccess', 'Data gagal dihapus');
        }
    }
}
