<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::post('register', RegistrationController::class)->name('register');
