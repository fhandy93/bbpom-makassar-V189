<?php

namespace App\Http\Controllers;
use App\Models\Layanan;
use App\Models\Survey;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function front(){
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
        $data = Layanan :: whereMonth('created_at', '=', date('m'))->get('id');
        $counttotal = $data->count();
        return view('welcome',compact('count1',
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
       'cspuas',
       'counttotal'
       ) );
    }
}
