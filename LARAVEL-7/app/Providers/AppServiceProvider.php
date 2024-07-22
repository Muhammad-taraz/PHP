<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register role middleware
        Route::aliasMiddleware('role', RoleMiddleware::class);
    }

    public function boot()
    {
        // Register middleware if needed
        $this->app['router']->aliasMiddleware('role', \App\Http\Middleware\RoleMiddleware::class);
    }
}
