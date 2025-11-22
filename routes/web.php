<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotpressController;
use App\Http\Controllers\MercadoPagoController as PagoController;
use App\Http\Controllers\Operations\ProductController;
use App\Models\Order;

// =======================================
// RUTAS PÚBLICAS
// =======================================
Route::get('/', [ProductController::class, 'indexCustomer'])->name('home');
Route::get('/cart', [ProductController::class, 'indexCart'])->name('cart.index');
Route::post('/cart/add', [ProductController::class, 'add'])->name('cart.add');

Route::get('/debug-host', function () {
    return request()->getHost();
});

Route::get('/orden/{order}/pagar', function(Order $order) {
    return view('blog.orders.index', compact('order'));
})->name('orders.pay');

Route::get('/crear-preferencia/{order}', [PagoController::class, 'crearPreferencia']);
Route::post('/procesar-pago', [PagoController::class, 'procesarPago']);
Route::post('/mercadopago/webhook', [PagoController::class, 'webhook'])->name('mp.webhook');


require __DIR__.'/company.php';
require __DIR__.'/customer.php';
