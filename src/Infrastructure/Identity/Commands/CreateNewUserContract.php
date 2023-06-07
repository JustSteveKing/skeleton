<?php

declare(strict_types=1);

namespace Infrastructure\Identity\Commands;

use App\Http\Payloads\V1\Auth\RegistrationPayload;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

interface CreateNewUserContract
{
    public function handle(RegistrationPayload $payload): Model|User|null;
}
