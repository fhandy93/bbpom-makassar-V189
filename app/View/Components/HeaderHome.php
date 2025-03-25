<?php

namespace App\View\Components;

use App\Models\Notification;
use App\Models\Transnotif;
use Illuminate\Support\Facades\Auth;
use App\Models\Visitorcounter;
use Illuminate\View\Component;
use Carbon\Carbon;

class HeaderHome extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $dt = Carbon::now()->toDateString();
        $ip = request()->ip();
        $view = Visitorcounter :: where('ip_addres','=',$ip)
                                ->whereDate('created_at','=',$dt)
                                ->first();
        if(!$view){
            Visitorcounter::create([  
                'ip_addres' => $ip,
                'agent' => request()->userAgent()
            ]);
        }
        $userid = Auth::user()->id;
        $usertype = Auth::user()->is_permission;
        $usercreated = Auth::user()->created_at;
        $data = Notification::where('received', '=', 13)->orWhere('received', '=', $usertype)->get();
        if($data->count() > 0){
            foreach($data as $item){
                if($item->created_at>$usercreated){
                    $trans = Transnotif :: where('notif_id',$item->id)->where('user_id',$userid)->get();
                    if($trans->isEmpty()){
                    $notif                   = new Transnotif();
                    $notif->notif_id         =  $item->id;
                    $notif->user_id          =  Auth::user()->id;
                    $notif->save();
                    }
                }
                    $trans = Transnotif :: where('notif_id',1)->where('user_id',$userid)->get();
                    if($trans->isEmpty()){
                    $notif                   = new Transnotif();
                    $notif->notif_id         =  1;
                    $notif->user_id          =  Auth::user()->id;
                    $notif->save();
                    }
                
            }
        }

        $user = Auth::user()->id;
        $user_created = Auth::user()->created_at;
        $data = Transnotif::where('user_id', '=', $user)->Where('read', '=', 0)->Where('created_at', '>', $user_created)->get();
        return view('components.header-home',['notif'=>$data]);
    }
}
