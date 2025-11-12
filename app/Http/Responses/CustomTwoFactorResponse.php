<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\TwoFactorLoginResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class CustomTwoFactorResponse implements TwoFactorLoginResponse
{
    public function toResponse($request)
    {
        $user = $request->user();

        $redirect = RouteServiceProvider::redirectToByRole($user);

        return redirect()->intended($redirect);
    }
}
