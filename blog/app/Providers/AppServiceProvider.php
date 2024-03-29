<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;    // Day 2-4
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
    public function boot(): void
    {
        // Day 2-4
        Paginator::useBootstrap();
    }
}
