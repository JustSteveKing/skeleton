<?php

declare(strict_types=1);

namespace App\Http\Requests\V1\Auth;

use App\Http\Payloads\V1\Auth\RegistrationPayload;
use Domains\Identity\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

final class RegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'min:2',
                'max:255',
            ],
            'password' => [
                'required',
                Password::default(),
            ],
            'role' => [
                'nullable',
                Rule::enum(
                    type: Role::class,
                ),
            ],
        ];
    }

    public function payload(): RegistrationPayload
    {
        return RegistrationPayload::fromArray(
            data: [
                'name' => $this->string('name')->toString(),
                'email' => $this->string('email')->toString(),
                'password' => Hash::make(
                    value: $this->string('password')->toString(),
                ),
                'role' => $this->get(
                    key: 'role',
                ) ?? Role::USER,
            ],
        );
    }
}
