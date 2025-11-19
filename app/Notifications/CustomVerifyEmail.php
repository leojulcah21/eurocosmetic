<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmail extends BaseVerifyEmail
{
    protected function verificationUrl($notifiable)
    {
        // Dominio FIJO por el que quieres que *siempre* pase la verificación
        $domain = rtrim(config('app.url'), '/'); // lee APP_URL automáticamente

        // Generamos el link firmado normalmente
        $temporarySignedUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );

        // Reemplazamos el dominio local por el dominio que QUEREMOS usar
        return preg_replace(
            '#^https?://[^/]+#',
            $domain,
            $temporarySignedUrl
        );
    }
}
