<?php

namespace App\Http\Controllers;

use App\Models\Adaja;
use App\Models\Notification;
use App\Models\Siyapp;
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

        $post['post'] = User::get('id');
        $post['post1'] = User::whereMonth('created_at', '=', $month)-> whereYear('created_at', '=', $year)->get('id');
      // $post['post2'] = Visitorcounter::get('id');
        $post['post2'] = Visitorcounter::whereMonth('created_at', '=', $month)-> whereYear('created_at', '=', $year)->get('id');
        $post['post3'] = Visitorcounter::whereDate('created_at', '=', $date)->get('id');
        $post['post4'] = Siyapp::get('id');
        $post['post5'] = Siyapp::whereMonth('created_at', '=', $month)-> whereYear('created_at', '=', $year)->get('id');
        $post['post6'] = Ulpk::get('id');
        $post['post7'] = Ulpk::whereMonth('created_at', '=', $month)-> whereYear('created_at', '=', $year)->get('id');
        return view('home', compact('post'));
    }
}
