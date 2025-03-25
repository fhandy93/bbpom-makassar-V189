<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(){
        $logs = Log :: orderBy('log_date', 'desc')->get();
        return view('log.logview', ['logs' => $logs]);
    }
    public function destroy(){
        Log::truncate();
    }
    public function show($id){
        $log = Log :: where ('id',$id)->first();
        dd($log);
    }
}