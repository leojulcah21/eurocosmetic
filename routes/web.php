<?php

use Illuminate\Support\Facades\Route;

// =======================================
// RUTAS PÚBLICAS
// =======================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

require __DIR__.'/company.php';
require __DIR__.'/customer.php';
