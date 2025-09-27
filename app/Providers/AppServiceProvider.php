<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
        $factory->add('default', [
            'path' => resource_path('svg'),
            'prefix' => 'icon',
        ]);
    }
}
