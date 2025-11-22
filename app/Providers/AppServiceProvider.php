<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use BladeUI\Icons\Factory as IconFactory;
use MercadoPago\MercadoPagoConfig;

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
        if (str_contains(Request::getHost(), 'anymore-suit-maternity-rational.trycloudflare.com')) {
            URL::forceScheme('https');
        }

        // Directiva genérica para roles
        Blade::if('role', function (...$roles) {
            $user = Auth::guard()->user();
            return $user && $user->role && in_array($user->role->name, $roles);
        });

        // Directiva para tipo de empleado
        Blade::if('employeeType', function (string $type) {
            /** @var User|null $user */
            $user = Auth::guard()->user();

            return $user
                && $user->role
                && $user->role->name === 'Employee'
                && $user->employee
                && $user->employee->employee_type === $type;
        });

        // Registrar íconos
        $factory->add('default', [
            'path' => resource_path('svg'),
            'prefix' => 'icon',
        ]);

        MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));
    }
}
