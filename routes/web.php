<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employees\EmployeeController;
use App\Http\Controllers\Employees\SellerController;
use App\Http\Controllers\Employees\WarehouseManagerController;

// =======================================
// RUTAS PÚBLICAS
// =======================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

// =======================================
// RUTAS PROTEGIDAS
// =======================================
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:admin'])
    ->prefix('company')
    ->name('company.')
    ->group(function () {
        Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
        Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');

        // CRUD de vendedores
        Route::prefix('employees/sellers')->name('employees.sellers.')->group(function () {
            Route::get('/code', [SellerController::class, 'nuevoCodigo'])->name('newCode');
            Route::get('/', [SellerController::class, 'index'])->name('index');
            Route::get('/create', [SellerController::class, 'create'])->name('create');
            Route::post('/', [SellerController::class, 'store'])->name('store');
            Route::get('/{seller}/edit', [SellerController::class, 'edit'])->name('edit');
            Route::put('/{seller}', [SellerController::class, 'update'])->name('update');
            Route::delete('/{seller}', [SellerController::class, 'destroy'])->name('destroy');
        });

                // CRUD de vendedores
        Route::prefix('employees/whs_managers')->name('employees.whs-managers.')->group(function () {
            Route::get('/code', [WarehouseManagerController::class, 'nuevoCodigo'])->name('newCode');
            Route::get('/', [WarehouseManagerController::class, 'index'])->name('index');
            Route::get('/create', [WarehouseManagerController::class, 'create'])->name('create');
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
