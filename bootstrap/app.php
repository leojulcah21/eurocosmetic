<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware as MiddlewareApp;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => MiddlewareApp\RoleMiddleware::class,
            'employee_type' => MiddlewareApp\EmployeeTypeMiddleware::class,
            'guest.is.client' => MiddlewareApp\EnsureGuestIsClient::class,
        ]);
        $middleware->trustHosts([
            '127.0.0.1',
            'localhost',
            'asin-oklahoma-opinions-rainbow.trycloudflare.com',
            '*.asin-oklahoma-opinions-rainbow.trycloudflare.com'
        ]);
        $middleware->validateCsrfTokens(except: [
            'mp-debug',
            'mp-test',
            'mp/create',
            'mp/process',
            'mp/webhook',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
