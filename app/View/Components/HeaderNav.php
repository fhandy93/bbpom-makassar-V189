<?php

namespace App\View\Components;

use App\Models\Post;
use Carbon\Carbon;
use App\Models\Visitorcounter;
use Illuminate\View\Component;

class HeaderNav extends Component
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
        $dateS = Carbon::now()->startOfMonth()->subMonth(6);
        $dateE = Carbon::now()->startOfMonth();
        $post = Post::join('post_view', 'posts.id', '=', 'post_view.post_id')
                    ->whereBetween('posts.created_at',[$dateS,$dateE])
                    ->selectRaw('posts.*, count(post_view.id) as viewCount')
                    ->groupBy('posts.id')
                    ->orderBy('viewCount','DESC')
                    ->take(5)
                    ->get();
        return view('components.header-nav',['pop'=>$post]);
    }
}
