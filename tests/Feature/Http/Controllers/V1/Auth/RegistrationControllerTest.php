<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Auth\RegistrationController;
use App\Models\User;
use Domains\Identity\Enums\Role;
use Illuminate\Testing\Fluent\AssertableJson;
use Treblle\Tools\Http\Enums\Status;
use function Pest\Laravel\postJson;

it('will return the correct response if validation fails', function (string $string): void {
    postJson(
        uri: action(RegistrationController::class),
        data: [],
    )->assertStatus(
        status: Status::UNPROCESSABLE_CONTENT->value
    )->assertJsonValidationErrorFor(
        key: 'name',
    )->assertJsonValidationErrorFor(
        key: 'email',
    )->assertJsonValidationErrorFor(
        key: 'password',
    );
})->with('strings')->group('auth');

it('will create a new user if validation passes', function (string $string): void {
    expect(
        User::query()->count(),
    )->toEqual(0);

    postJson(
        uri: action(RegistrationController::class),
        data: [
            'name' => $string,
            'email' => "{$string}@email.com",
            'password' => 'password',
        ],
    )->assertStatus(
        status: Status::CREATED->value
    )->assertJson(fn (AssertableJson $json) => $json
        ->where('name', $string)
        ->where('email', "{$string}@email.com")
        ->where('role', Role::USER->value)
        ->etc(),
    );

    expect(
        User::query()->count(),
    )->toEqual(1);
})->with('strings')->group('auth');
