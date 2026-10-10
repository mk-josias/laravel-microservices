<?php

use App\Models\Notification;
use Foundation\Iam\Auth\GatewayTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Reached only through the gateway, which authenticated the client and signed X-Identity.
Route::get('/notifications', function (Request $request) {
    $userId = (new GatewayTokens((string) env('GATEWAY_SECRET')))->validate((string) $request->header('X-Identity'));

    abort_if($userId === null, 401);

    return Notification::query()->where('user_id', $userId)->pluck('type');
});
