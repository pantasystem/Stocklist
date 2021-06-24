<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Home;
use App\Observers\HomeObserver;
use App\Stock;
use App\Observers\StockObserver;

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
        Stock::observe(StockObserver::class);
    }
}
