<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user()?->fresh('role');

        if ($user && $user->role?->name === 'Customer') {

            return redirect()->route('customer.setup');
        }

        if ($user && ($user->hasRole('Administrator') || $user->hasRole('Employee'))) {

            // Session::put('redirect_after_verification', route('company.welcome'));

            // dd(session()->get('redirect_after_verification'));


            return redirect()->route('company.welcome');
        }

        return redirect(RouteServiceProvider::redirectToByRole($user));
    }
}
