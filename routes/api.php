<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotpressController;

Route::post('/botpress/products', [BotpressController::class, 'searchProducts']);
// Route::post('/botpress/list-products', [BotpressController::class, 'getProducts']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

