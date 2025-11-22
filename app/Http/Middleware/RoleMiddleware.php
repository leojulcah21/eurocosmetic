<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User; // para ayudar a Intelephense
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @param  mixed    ...$roles
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        /** @var User|null $user */
        $user = $request->user();

        if (!$user || !$user->hasRole($roles)) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}
