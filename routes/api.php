<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotpressController;
use App\Http\Controllers\MercadoPagoController;

Route::post('/botpress/products', [BotpressController::class, 'searchProducts']);

Route::post('/mp/webhook', [MercadoPagoController::class, 'handle'])->name('mp.webhook');
// Route::post('/botpress/list-products', [BotpressController::class, 'getProducts']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

