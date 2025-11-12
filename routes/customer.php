<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Customers\CustomeController;

Route::middleware(['guest.is.client'])->group(function () {
    Route::view('/login', 'auth.authentication')->name('login');
    Route::view('/register', 'auth.authentication')->name('register');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {

        Route::get('/setup-profile', [CustomeController::class, 'setup'])->name('setup');
        Route::post('/setup-profile', [CustomeController::class, 'store'])->name('store');
    });
