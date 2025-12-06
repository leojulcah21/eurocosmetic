<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\MercadoPagoController;
use App\Http\Controllers\Operations\ProductController;
use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;


// =======================================
// RUTAS PÚBLICAS
// =======================================
Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/cart', [ProductController::class, 'indexCart'])->name('cart.index');
Route::post('/cart/add', [ProductController::class, 'add'])->name('cart.add');
Route::post('/cart/remove', [ProductController::class, 'removeFromCart'])->name('cart.remove');

Route::post('/mp/create', [MercadoPagoController::class, 'createPreference'])->name('mp.create');
Route::post('/mp/process', [MercadoPagoController::class, 'processPayment'])->name('mp.process');
Route::get('/mp/available-methods', [MercadoPagoController::class, 'availableMethods']);

Route::post('/mp-test', function () {
    $accessToken = env('MP_ACCESS_TOKEN');

    // Tarjeta de prueba oficial
    $cardData = [
        "card_number" => "4009175332806176", // Visa de prueba
        "expiration_month" => 11,
        "expiration_year" => 2030,
        "security_code" => "123",
        "cardholder" => [
            "name" => "APRO",
            "identification" => [
                "type" => "DNI",
                "number" => "12345678"
            ]
        ]
    ];

    // Paso 1: generar el token
    $tokenResponse = Http::withToken($accessToken)
        ->post('https://api.mercadopago.com/v1/card_tokens', $cardData);

    if (!$tokenResponse->ok()) {
        Log::error('Error generando card_token', ['body' => $tokenResponse->json()]);
        return response()->json(['error' => 'No se pudo generar el token', 'details' => $tokenResponse->json()], 500);
    }

    $cardToken = $tokenResponse->json()['id'];

    // Paso 2: crear el pago
    $paymentPayload = [
        "transaction_amount" => 100.00,
        "token" => $cardToken,
        "installments" => 1,
        "payment_method_id" => "visa",
        "issuer_id" => "12551",
        "payer" => [
            "email" => "test_user_123456@testuser.com"
        ],
        "metadata" => [
            "user_id" => 1,
            "cart" => [
                ["id" => 2, "quantity" => 1, "price" => 100.00]
            ]
        ]
    ];

    $paymentResponse = Http::withToken($accessToken)
        ->withHeaders([
            'X-Idempotency-Key' => uniqid('test_', true)
        ])
        ->post('https://api.mercadopago.com/v1/payments', $paymentPayload);

    if (!$paymentResponse->ok()) {
        Log::error('Error creando pago', ['body' => $paymentResponse->json()]);
        return response()->json(['error' => 'No se pudo crear el pago', 'details' => $paymentResponse->json()], 500);
    }

    return response()->json($paymentResponse->json());
});


Route::post('/mp-debug', function (Request $request) {
    $formData = $request->input('formData');

    $payload = [
        "transaction_amount" => $formData['transaction_amount'],
        "token" => $formData['token'],
        "installments" => $formData['installments'],
        "payment_method_id" => $formData['payment_method_id'],
        "issuer_id" => $formData['issuer_id'] ?? null,
        "payer" => [
            "email" => $formData['payer']['email'] ?? null
        ],
        "metadata" => [
            "user_id" => $request->input('user_id'),
            "cart" => $request->input('cart')
        ]
    ];

    Log::info('Token recibido', ['token' => $formData['token']]);

    $response = Http::withToken(env('MP_ACCESS_TOKEN'))
        ->withHeaders([
            'X-Idempotency-Key' => uniqid('payment_', true)
        ])
        ->post('https://api.mercadopago.com/v1/payments', $payload);

    Log::info('MP raw response', [
        'status' => $response->status(),
        'body' => $response->json() ?? $response->body(),
        'payload' => $payload
    ]);

    return response()->json([
        'status' => $response->status(),
        'body' => $response->json() ?? $response->body()
    ], $response->status());
});


Route::get('/fix-cart', function () {
    session()->forget('cart');
    session()->forget('cart_count');
    return 'Carrito reseteado';
});


Route::get('/debug-host', function () {
    return request()->getHost();
});

require __DIR__.'/company.php';
require __DIR__.'/customer.php';
