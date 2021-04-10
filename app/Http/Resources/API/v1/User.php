<?php

namespace App\Http\Resources\API\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'access_token' => $this->when(isset($this->access_token), $this->access_token),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
