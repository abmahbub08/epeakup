<?php

namespace App\Providers;

use App\Order;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    	$pending_order = Order::where('status_id', 1)->orderby('created_at','desc')->get()->count();
        view()->share('pending_order', $pending_order);
    }
}
