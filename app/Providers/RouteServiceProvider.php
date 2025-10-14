<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Redirección según el rol del usuario.
     */
    public static function redirectToByRole($user)
    {
        if (!$user) {
            return '/';
        }

        if ($user->hasRole('admin') || $user->hasRole('employee')) {
            return '/dashboard';
        }

        if ($user->hasRole('client')) {
            return '/';
        }

        // Si no tiene ningún rol reconocido
        return '/dashboard';
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Aquí podrías registrar rutas adicionales si lo necesitas
    }
}
