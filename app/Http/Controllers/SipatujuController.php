<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SipatujuController extends Controller
{
    public function index(){
        return view('sipatuju.index');
    }
}
