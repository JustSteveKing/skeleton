<?php

declare(strict_types=1);

namespace Core\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

final class BroadcastServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Broadcast::routes();
        require base_path('routes/sockets/routes.php');
    }
}
