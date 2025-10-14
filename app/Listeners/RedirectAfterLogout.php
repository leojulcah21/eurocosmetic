<?php

namespace App\Listeners;


use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Session;

class RedirectAfterLogout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        $role = $event->user->role->name ?? 'client';
        cookie()->queue('last_role', $role, 1); // dura 1 minuto
    }
}
