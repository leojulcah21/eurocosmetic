<?php

use Illuminate\Support\Facades\Route;

// =======================================
// RUTAS PÚBLICAS
// =======================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

// =======================================
// RUTAS PROTEGIDAS
// =======================================
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // RUTAS ADMIN Y EMPLEADO
    Route::middleware('role:admin,employee')->group(function () {
        Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
        //Route::get('/employee/home', fn() => view('employee.home'))->name('employee.home');
    });

    Route::middleware('role:client')->group(function () {
        Route::get('/e', fn() => view('welcome'))->name('home');;
    });
});

// =======================================
// AUTENTICACIÓN PERSONALIZADA
// =======================================


// Login para clientes
Route::get('/login/client', function () {
    return view('auth.authentication');
})->name('login.client');

Route::get('/register/client', function () {
    return view('auth.authentication');
})->name('register.client');

// Login para admins/empleados
Route::get('/login/company', function () {
    return view('auth.company.login');
})->name('login.company');
