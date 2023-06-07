<?php

declare(strict_types=1);

namespace App\Http\Resources\V1;

use App\Http\Resources\DateResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read User $resource
 */
final class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'role' => $this->resource->role->value,
            'created' => new DateResource(
                resource: $this->resource->created_at,
            ),
        ];
    }
}
