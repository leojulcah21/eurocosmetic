<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotpressController;
use App\Http\Controllers\MercadoPagoController as PagoController;
use App\Http\Controllers\Operations\ProductController;
use App\Http\Controllers\Sales\OrderController;
use App\Models\Order;

// =======================================
// RUTAS PÚBLICAS
// =======================================
Route::get('/', [ProductController::class, 'indexCustomer'])->name('home');
Route::get('/cart', [ProductController::class, 'indexCart'])->name('cart.index');
Route::post('/cart/add', [ProductController::class, 'add'])->name('cart.add');
Route::post('cart/remove', [ProductController::class, 'removeFromCart'])->name('cart.remove');

Route::post('/crear-orden-desde-carrito', [OrderController::class, 'crearOrdenDesdeCarrito'])
    ->name('orders.create-from-cart');
Route::get('/crear-preferencia/{order}', [PagoController::class, 'crearPreferencia']);
Route::post('/procesar-pago', [PagoController::class, 'procesarPago']);
Route::post('/mercadopago/webhook', [PagoController::class, 'webhook'])->name('mp.webhook');

Route::get('/debug-host', function () {
    return request()->getHost();
});

require __DIR__.'/company.php';
require __DIR__.'/customer.php';
