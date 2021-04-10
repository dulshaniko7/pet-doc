<?php

namespace App\Http\Resources\API\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class Hospital extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->hospital_id,
            'name' => $this->user->name,
            'email' => $this->user->email,
            'phone' => $this->user->phone,
            'about' => $this->about,
            'address' => $this->user->address,
            'display_name' => $this->display_name,
            'registration_no' => $this->registration_no,
            'clinic_address' => $this->clinic_address,
            'petdoc_id' => $this->petdoc_id,
            'rate' => $this->rate,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
