<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class EmployeeTypeMiddleware
{
    public function handle(Request $request, Closure $next, string $type): Response
    {
        /** @var User|null $user */
        $user = $request->user();

        // Validar rol employee
        if (!$user || !$user->hasRole('Employee')) {
            abort(403, 'No autorizado.');
        }

        // Validar tipo de empleado
        if (!$user->employee || $user->employee->employee_type !== $type) {
            abort(403, 'No tienes permiso para esta sección.');
        }

        return $next($request);
    }
}
