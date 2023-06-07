<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', static fn () => ['ping' => 'pong'])->name('ping');
