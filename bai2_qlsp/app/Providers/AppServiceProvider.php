<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// 1. Chỉ import class Paginator ở đây
use Illuminate\Pagination\Paginator;

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
        // 2. Gọi hàm useBootstrapFive() bên trong hàm boot
        Paginator::useBootstrapFive();
    }
}