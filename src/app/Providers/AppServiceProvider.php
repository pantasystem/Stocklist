<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Home;
use App\Observers\HomeObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Home::observe(HomeObserver::class);
    }
}
