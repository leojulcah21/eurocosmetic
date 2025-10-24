<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

class CustomAuthenticatedSessionController extends AuthenticatedSessionController
{
    /**
     * Sobrescribe el cierre de sesión para guardar el rol antes del logout.
     */
    public function destroy(Request $request): LogoutResponseContract
    {
        $user = Auth::user();

        if ($user) {
            // Obtenemos el rol desde la relación
            $roleName = $user->role ? $user->role->name : 'client';
            Log::info("🚪 Guardando rol antes de logout: {$roleName}");

            // Pasamos el rol al request ANTES de cerrar sesión
            $request->merge(['last_role' => $roleName]);
        }

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Log::info("👋 Sesión cerrada correctamente.");

        return app(LogoutResponseContract::class);
    }
}
