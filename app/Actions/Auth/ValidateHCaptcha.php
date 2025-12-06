<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class ValidateHCaptcha
{
    public function __invoke()
    {
        $token = request('h-captcha-response');

        $response = Http::asForm()->post(env('HCAPCHA_VERIFY_URL'),
            [
                'secret' => env('HCAPTCHA_SECRET_KEY'),
                'response' => $token,
                'remoteip' => request()->ip()
            ]
        )->json();

        if (!($response['success'] ?? false)) {
            throw ValidationException::withMessages([
                'captcha' => 'La verificación hCaptcha falló. Inténtalo nuevamente.'
            ]);
        }
    }
}
