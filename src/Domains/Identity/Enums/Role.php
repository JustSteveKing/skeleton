<?php

declare(strict_types=1);

namespace Domains\Identity\Enums;

enum Role: string
{
    case USER = 'user';

    case ADMIN = 'admin';
}
