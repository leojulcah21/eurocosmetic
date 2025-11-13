<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BotpressService;

class BotpressController extends Controller
{
    public function handle(Request $request, BotpressService $botpressService)
    {
        return response()->json([
            'reply' => $botpressService->processMessage($request->input('message')),
        ]);
    }
}
