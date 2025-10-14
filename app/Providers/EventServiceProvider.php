<?php

namespace App\Providers;

use Illuminate\Auth\Events\Logout;
use App\Listeners\RedirectAfterLogout;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Logout::class => [
            RedirectAfterLogout::class,
        ],
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
