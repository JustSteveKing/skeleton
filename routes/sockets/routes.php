<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel(
    'App.Models.User.{id}',
    static fn (User $user, int $id): bool => (int) $user->getKey() === $id,
);
