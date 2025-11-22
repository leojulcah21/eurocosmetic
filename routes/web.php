<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotpressController;
use App\Http\Controllers\MercadoPagoController as PagoController;

// =======================================
// RUTAS PÚBLICAS
// =======================================
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/debug-host', function () {
    return request()->getHost();
});


Route::get('/crear-preferencia/{order}', [PagoController::class, 'crearPreferencia']);
Route::post('/procesar-pago', [PagoController::class, 'procesarPago']);
Route::post('/mercadopago/webhook', [PagoController::class, 'webhook'])->name('mp.webhook');

require __DIR__.'/company.php';
require __DIR__.'/customer.php';
