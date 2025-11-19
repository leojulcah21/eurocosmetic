<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotpressController;

// =======================================
// RUTAS PÚBLICAS
// =======================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/debug-host', function () {
    return request()->getHost();
});

Route::middleware(['auth'])->get('/userCustomer', [BotpressController::class, 'getUserCustomer']);

require __DIR__.'/company.php';
require __DIR__.'/customer.php';
