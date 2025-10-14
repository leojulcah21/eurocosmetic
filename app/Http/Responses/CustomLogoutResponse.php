<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;
use Illuminate\Support\Facades\Cookie;

class CustomLogoutResponse implements LogoutResponseContract
{
    public function toResponse($request)
    {
        $role = Cookie::get('last_role', 'client');

        if (in_array($role, ['admin', 'employee'])) {
            return redirect('/login/company');
        }

        return redirect('/');
    }
}
