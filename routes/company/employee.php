<?php

use Illuminate\Support\Facades\Route;

// ========================================
// EMPLEADOS
// ========================================
Route::middleware(['role:Employee'])->group(function () {

    // Vendedor
    Route::middleware(['employee_type:seller'])
        ->prefix('seller')
        ->name('seller.')
        ->group(function () {
            Route::get('/dashboard', fn() => 'Panel vendedor')->name('dashboard');
        });

    // Jefe de almacén
    Route::middleware(['employee_type:warehouse_manager'])
        ->prefix('warehouse-manager')
        ->name('warehouse-manager.')
        ->group(function () {
            Route::get('/dashboard', fn() => 'Panel jefe almacén')->name('dashboard');
        });

    // Repartidor
    Route::middleware(['employee_type:courier'])
        ->prefix('courier')
        ->name('courier.')
        ->group(function () {
            Route::get('/dashboard', fn() => 'Panel courier')->name('dashboard');
        });
});
