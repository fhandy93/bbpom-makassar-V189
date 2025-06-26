<?php

namespace App\Http\Controllers;

use App\Models\Adaja;
use App\Models\Layanan;
use App\Models\Notification;
use App\Models\Sikama;
use App\Models\Siyapp;
use App\Models\Smile;
use App\Models\SPPDOnline;
use App\Models\Transnotif;
use App\Models\Ulpk;
use App\Models\User;
use App\Models\Visitorcounter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
       
        $date = \Carbon\Carbon::now();
        $month =  $date->format('m');
        $year =  $date->format('Y');
        $totalLayanan = 0;
        $totalSiikma = 0;
        $totalSmile = 0;
        $totalSppd = 0;
        $post['post'] = User::get('id');
        $post['post1'] = User::whereMonth('created_at', '=', $month)-> whereYear('created_at', '=', $year)->get('id');
      // $post['post2'] = Visitorcounter::get('id');
        $post['post2'] = Visitorcounter::whereMonth('created_at', '=', $month)-> whereYear('created_at', '=', $year)->get('id');
        $post['post3'] = Visitorcounter::whereDate('created_at', '=', $date)->get('id');
        $post['post4'] = Siyapp::get('id');
        $post['post5'] = Siyapp::whereMonth('created_at', '=', $month)-> whereYear('created_at', '=', $year)->get('id');
        $post['post6'] = Ulpk::get('id');
        $post['post7'] = Ulpk::whereMonth('created_at', '=', $month)-> whereYear('created_at', '=', $year)->get('id');

        $countLayanan = [];
        $year = date('Y');

        for ($i = 1; $i <= 12; $i++) {
            $countLayanan[$i] = Layanan::whereYear('created_at', $year)
                                        ->whereMonth('created_at', $i)
                                        ->count();
            $totalLayanan += $countLayanan[$i];
        }

        $countSiikma = [];
        for ($i = 1; $i <= 12; $i++) {
            $countSiikma[$i] = Sikama::whereYear('created_at', $year)
                                        ->whereMonth('created_at', $i)
                                        ->count();
            $totalSiikma += $countSiikma[$i];
        }

        $countSmile = [];
        for ($i = 1; $i <= 12; $i++) {
            $countSmile[$i] = Smile::whereYear('created_at', $year)
                                        ->whereMonth('created_at', $i)
                                        ->count();
            $totalSmile += $countSmile[$i];
        }

        $countSppd = [];
        for ($i = 1; $i <= 12; $i++) {
            $countSppd[$i] = SPPDOnline::whereYear('created_at', $year)
                                        ->whereMonth('created_at', $i)
                                        ->count();
            $totalSppd += $countSppd[$i];
        }

        $countVisit = [];
        for ($i = 1; $i <= 12; $i++) {
            $countVisit[$i] = Visitorcounter::whereYear('created_at', $year)
                                        ->whereMonth('created_at', $i)
                                        ->count();
        }

        $confirmed = Siyapp::where('status', '=', 1)-> whereYear('created_at', '=', $year)->count();
        $unconfirmed = Siyapp::where('status', '=', 0)-> whereYear('created_at', '=', $year)->count();

    return view('home', compact('post','countLayanan', 'totalLayanan','countSiikma','totalSiikma','countSmile','totalSmile','countSppd','totalSppd','countVisit', 'confirmed', 'unconfirmed'));
    }
}
