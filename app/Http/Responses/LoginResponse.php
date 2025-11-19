<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        if ($user && $user->hasRole("Customer")) {
            try {
                Http::withHeaders([
                    'Authorization' => 'Bearer ' . config('services.botpress.api_key'),
                    'X-Botpress-Bot-Id' => config('services.botpress.bot_id'),
                    'Content-Type' => 'application/json',
                ])->post('https://api.botpress.cloud/v1/chat/users', [
                    'userId'   => $user->id,
                    'fullName' => $user->name,
                    'email'    => $user->email,
                ]);
            } catch (\Exception $e) {
                Log::error("Error enviando usuario a Botpress: " . $e->getMessage());
            }

        }

        $redirect = RouteServiceProvider::redirectToByRole($user);

        return redirect()->intended($redirect);
    }
}
