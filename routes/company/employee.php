<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operations\OrderController;

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
            Route::prefix('customer/orders')->name('customer.orders.')->group(function () {
                Route::get('/', [OrderController::class, 'index'])->name('index');
                Route::get('/show-order-status', [OrderController::class, 'show'])->name('show-order');
                Route::put('/update', [OrderController::class, 'updateStatus'])->name('update-status');
                Route::delete('/delete', [OrderController::class, 'index'])->name('delete');
            });
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
