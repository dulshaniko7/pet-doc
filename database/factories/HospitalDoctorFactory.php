<?php

namespace Database\Factories;

use App\Models\HospitalDoctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class HospitalDoctorFactory extends Factory{

    protected $model=HospitalDoctor::class;

    public function definition()
    {
        return [
            'display_name'=>$this->faker->name,
            'registration_no'=>strval($this->faker->numberBetween($min = 100000, $max = 200000)),
            'phone'=>strval($this->faker->numberBetween($min = 1000000, $max = 2000000)),
            'address'=> $this->faker->address,
            'gender'=>$this->faker->randomElement(array('Male','Female','Other')),
        ];
    }
}
