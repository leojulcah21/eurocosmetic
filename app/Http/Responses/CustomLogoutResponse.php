<?php

namespace App\Http\Responses;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class CustomLogoutResponse implements LogoutResponseContract
{
    /**
     * Redirige según el rol del usuario después del logout
     */
    public function toResponse($request)
    {
        $role = $request->input('last_role', 'client'); // usamos el rol pasado en el request
        Log::info("🚪 Rol recuperado tras logout: {$role}");

        if (in_array($role, ['admin', 'employee'])) {
            Log::info("🏢 Redirigiendo a /login/company");
            return redirect('/login/company');
        }

        Log::info("🏠 Redirigiendo a /");
        return redirect('/');
    }
}
