<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Transnotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifyController extends Controller
{
    public function index(){
        $usertype = Auth::user()->is_permission;
        $data = Notification::where('received', '=', 13)->orWhere('received', '=', $usertype)->take(5)->latest()->get();
        return view('notify.notif_list',['notify'=>$data]);
    }
    public function show($id){
        $userid = Auth::user()->id;
        Transnotif::where([['notif_id','=',$id],['user_id','=',$userid]]) -> update(['read' => 1]);
        $data = Notification::where('id',$id)->first();
        return view('notify.notif_detail',['notify'=>$data]);
    }
}
