<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use App\Providers\RouteServiceProvider;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user()?->fresh('role');

        // Redirección solo para el registro
        if ($user && $user->role_id && $user->role?->name === 'Customer') {
            return redirect()->route('customer.setup');
        }

        if ($user && ($user->hasRole('Administrator') || $user->hasRole('Employee'))) {
            return redirect()->route('company.welcome');
        }

        return redirect(RouteServiceProvider::redirectToByRole($user));
    }
}
