<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

// =======================================
// AUTH COMPANY (público)
// =======================================

Route::prefix('company')->group(function () {
    Route::get('/login', fn () => view('auth.company.login'))->name('company.login');
    Route::get('/register', fn () => view('auth.company.register'))->name('company.register');
});


// =======================================
// RUTAS PRIVADAS COMPANY
// =======================================
Route::get('/company', [CompanyController::class, 'index'])
    ->middleware(['role:Administrator,Employee'])
    ->name('company.welcome');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified', 'role:Administrator,Employee'])
    ->prefix('company')
    ->name('company.')
    ->group(function () {

        // Importas las rutas internas
        require __DIR__.'/company/admin.php';
        require __DIR__.'/company/employee.php';
    });
