<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceHost
{
    public function handle(Request $request, Closure $next)
    {
        // Forzar el host REAL de ngrok SÍ O SÍ
        $request->headers->set('host', parse_url(config('app.url'), PHP_URL_HOST));

        return $next($request);
    }
}
