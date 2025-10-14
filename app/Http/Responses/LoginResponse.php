<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use App\Providers\RouteServiceProvider;

class LoginResponse implements LoginResponseContract
{
    /**
     * Redirige al usuario después del inicio de sesión según su rol.
     */
    public function toResponse($request)
    {
        $user = $request->user();

        $redirect = RouteServiceProvider::redirectToByRole($user);

        return redirect()->intended($redirect);
    }
}
