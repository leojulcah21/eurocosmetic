<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Customer;
use App\Http\Controllers\BotpressController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/clientes/{id}', function ($id) {
    $customer = Customer::find($id);

    if (!$customer) {
        return response()->json([
            'status' => 'error',
            'message' => 'Cliente no encontrado'
        ], 404);
    }

    return response()->json([
        'status' => 'success',
        'data' => [
            'id' => $customer->id,
            'nombre' => $customer->user->name,
            'correo' => $customer->user->email,
            'telefono' => $customer->phone,
            'fecha_nacimiento' => $customer->birth_date,
            'tiene_salon' => $customer->has_salon,
            'salon' => $customer->business_name,
            'tipo_propiedad' => $customer->property_type,
        ]
    ]);
});

Route::post('/bot/handle', [BotpressController::class, 'handle']);
