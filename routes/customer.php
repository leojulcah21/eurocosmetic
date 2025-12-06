<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Customers\CustomeController;
use App\Http\Controllers\Operations\ProductController;

Route::middleware(['guest.is.client'])->group(function () {
    Route::view('/login', 'auth.authentication')->name('login');
    Route::view('/register', 'auth.authentication')->name('register');
});

Route::get('/products', [ProductController::class, 'indexCustomer'])->name('products');

// Route::get('/orders', [ProductController::class, 'ordersCustomer'])->name('orders');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {

        Route::get('/setup-profile', [CustomeController::class, 'setup'])->name('setup');
        Route::post('/setup-profile', [CustomeController::class, 'store'])->name('store');
        Route::get('/orders', [ProductController::class, 'ordersCustomer'])->name('orders');
    });
