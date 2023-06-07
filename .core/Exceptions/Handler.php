<?php

declare(strict_types=1);

namespace Core\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

final class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(
            reportUsing: function (Throwable $exception) {
                //
            },
        );
    }
}
