<?php

declare(strict_types=1);

namespace App\Http\Payloads\V1\Auth;

use Domains\Identity\Enums\Role;

final readonly class RegistrationPayload
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public Role   $role,
    ) {}

    /**
     * @return array<string,string|Role>
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => $this->role,
        ];
    }

    /**
     * @param array{name:string,email:string,password:string,role:Role} $data
     * @return RegistrationPayload
     */
    public static function fromArray(array $data): RegistrationPayload
    {
        return new RegistrationPayload(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
            role: $data['role'],
        );
    }
}
