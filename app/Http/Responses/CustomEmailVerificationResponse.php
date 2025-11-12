<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\VerifyEmailResponse as VerifyEmailResponseContract;
use Illuminate\Support\Facades\Session;

class CustomEmailVerificationResponse implements VerifyEmailResponseContract
{
    public function toResponse($request)
    {
        // Si el listener dejó una ruta en sesión, usamos esa
        $redirectTo = Session::pull('redirect_after_verification', route('profile.show'));

        return redirect($redirectTo);
    }
}
