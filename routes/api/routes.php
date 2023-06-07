<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', static fn () => ['ping' => 'pong']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
