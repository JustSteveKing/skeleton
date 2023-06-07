<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\CarbonInterface;
use Domains\Identity\Enums\Role;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property-read string $id
 * @property-read string $name
 * @property-read string $email
 * @property-read string $password
 * @property-read Role $role
 * @property-read CarbonInterface $email_verified_at
 * @property-read CarbonInterface $updated_at
 * @property-read CarbonInterface $created_at
 */
final class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasUlids;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'role' => Role::class,
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
