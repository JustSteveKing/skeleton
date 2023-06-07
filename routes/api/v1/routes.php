<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', static fn () => ['ping' => 'pong'])->name('ping');

Route::prefix('auth')->as('auth:')->group(
    base_path('routes/api/v1/auth.php'),
);
