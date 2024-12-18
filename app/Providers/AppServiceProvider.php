<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use App\Http\Middleware\RoleMiddleware;
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
        //
        Route::aliasMiddleware('role', RoleMiddleware::class);
        config(['app.locale' => 'id']);
	Carbon::setLocale('id');
    }
}
