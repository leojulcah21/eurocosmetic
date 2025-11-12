<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Log;
use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class CustomLogoutResponse implements LogoutResponseContract
{
    /**
     * Redirige según el rol del usuario después del logout
     */
    public function toResponse($request)
    {
        $role = $request->input('last_role', 'Client'); // usamos el rol pasado en el request
        Log::info("🚪 Rol recuperado tras logout: {$role}");

        if (in_array($role, ['Administrator', 'Employee'])) {
            Log::info("🏢 Redirigiendo a /company/login");
            return redirect('/company/login');
        }

        Log::info("🏠 Redirigiendo a /");
        return redirect()->route('home');
    }
}
