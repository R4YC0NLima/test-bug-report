<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $name
 * @property mixed $email
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property mixed $admin
 */
class UserResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id'            => (integer) $this->id,
            'name'          => (string) $this->name,
            'admin'         => (boolean) $this->admin,
            'email'         => (string) $this->email,
            'created_at'    => (string) $this->created_at,
            'updated_at'    => (string) $this->updated_at,
        ];
    }
}
