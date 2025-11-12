<?php

namespace App\Services;

use App\Models\Customer;

class BotpressService {
    public function processMessage($message)
    {
        $msg = strtolower(trim($message));

        if (str_contains($msg, 'negocio')) {
            $cliente = Customer::find(1); // por ahora, fijo o según auth
            return "Por supuesto, tu negocio es {$cliente->business_name}.";
        }

        if (str_contains($msg, 'ayuda')) {
            return "Claro, puedo ayudarte con lo relacionado a tu negocio, con su dirección. ¿Qué deseas consultar?";
        }

        return "Lo siento, no entendí tu mensaje. ¿Podrías reformularlo?";
    }
}
