<?php

namespace App\Providers;

use App\Models\Toko;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('components.layouts.beranda-layout', function ($view) {
            $view->with('tokos', Toko::all());
        });
    }
}
