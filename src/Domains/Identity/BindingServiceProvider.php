<?php

declare(strict_types=1);

namespace Domains\Identity;

use Domains\Identity\Command\CreateNewUser;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Identity\Commands\CreateNewUserContract;

final class BindingServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function provides(): array
    {
        return [
            CreateNewUserContract::class,
        ];
    }

    public function register(): void
    {
        $this->app->bind(
            abstract: CreateNewUserContract::class,
            concrete: CreateNewUser::class,
        );
    }
}
