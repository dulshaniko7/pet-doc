<?php

namespace App\Http\Resources\API\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class HospitalDoctor extends JsonResource
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
            'id' => $this->id,
            'hospital_id' => $this->hospital_id,
            'display_name' => $this->display_name,
            'registration_no' => $this->registration_no,
            'phone' => $this->phone,
            'about' => $this->about,
            'address' => $this->address,
            'gender' => $this->gender,
            'rate' => $this->rate,
            'hospital' => new Hospital($this->hospital),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
