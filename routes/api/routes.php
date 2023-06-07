<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', static fn () => ['ping' => 'pong']);

Route::middleware('auth:sanctum')->get('/user', fn (Request $request) => $request->user());
