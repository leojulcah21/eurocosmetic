<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use App\Providers\RouteServiceProvider;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * Redirige al usuario después del registro según su rol.
     */
    public function toResponse($request)
    {
        $user = $request->user();

        $redirect = RouteServiceProvider::redirectToByRole($user);

        return redirect()->intended($redirect);
    }
}
