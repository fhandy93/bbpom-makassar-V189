<?php

namespace App\View\Components;

use App\Models\Layanan;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\URL;

class MainDashboard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $url = URL::current();
        $data = Layanan :: get();
        $count = $data->count();
        return view('components.main-dashboard',['position'=>$url,'data'=>$count]);
    }
}
