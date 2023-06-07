<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Auth;

use App\Http\Requests\V1\Auth\RegistrationRequest;
use App\Http\Resources\V1\UserResource;
use Domains\Identity\Exceptions\RegistrationFailedException;
use Illuminate\Contracts\Support\Responsable;
use Infrastructure\Identity\Commands\CreateNewUserContract;
use JustSteveKing\Launchpad\Http\Responses\ModelResponse;
use Throwable;
use Treblle\Tools\Http\Enums\Status;

final readonly class RegistrationController
{
    public function __construct(
        private CreateNewUserContract $command,
    ) {}

    public function __invoke(RegistrationRequest $request): Responsable
    {
        try {
            $user = $this->command->handle(
                payload: $request->payload(),
            );
        } catch (Throwable $exception) {
            throw new RegistrationFailedException(
                message: 'Failed to register new user',
                code: $exception->getCode(),
                previous: $exception,
            );
        }

        return new ModelResponse(
            data: new UserResource(
                resource: $user,
            ),
            status: Status::CREATED,
        );
    }
}
