<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use BladeUI\Icons\Factory as IconFactory;

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
    public function boot(IconFactory $factory): void
    {
        // Directiva para administradores
        Blade::if('admin', function () {
            return Auth::check() && Auth::user()->role_id === 1;
        });

        // Directiva para empleados
        Blade::if('employee', function () {
            return Auth::check() && Auth::user()->role_id === 2;
        });

        // Directiva para clientes
        Blade::if('client', function () {
            return Auth::check() && Auth::user()->role_id === 3;
        });

        $factory->add('default', [
            'path' => resource_path('svg'),
            'prefix' => 'icon',
        ]);
    }
}
