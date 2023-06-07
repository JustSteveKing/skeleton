<?php

declare(strict_types=1);

namespace Domains\Identity\Command;

use App\Http\Payloads\V1\Auth\RegistrationPayload;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Infrastructure\Identity\Commands\CreateNewUserContract;
use JustSteveKing\Launchpad\Database\Portal;
use Throwable;

final readonly class CreateNewUser implements CreateNewUserContract
{
    /**
     * @param Portal $database
     */
    public function __construct(
        private Portal $database,
    ) {}

    /**
     * @param RegistrationPayload $payload
     * @return Model|User|null
     * @throws Throwable
     */
    public function handle(RegistrationPayload $payload): Model|User|null
    {
        return $this->database->transaction(
            callback: fn () => User::query()->create(
                attributes: $payload->toArray(),
            ),
        );
    }
}
