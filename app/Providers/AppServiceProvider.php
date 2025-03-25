<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Bmnbarang;
use App\Observers\BarangObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
         // set the public path to this directory
         $this->app->bind('path.public', function() {
             return base_path().'/public_html';
         });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Bmnbarang::observe(BarangObserver::class);
    }
    

}
