<?php

namespace App\Http\Resources\API\v1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public $collects = User::class;

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
