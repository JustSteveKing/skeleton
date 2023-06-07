<?php

declare(strict_types=1);

namespace App\Providers;

use Domains\Identity\BindingServiceProvider as IdentityServiceProvider;
use Illuminate\Support\ServiceProvider;

final class BindingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(
            provider: IdentityServiceProvider::class,
        );
    }
}
