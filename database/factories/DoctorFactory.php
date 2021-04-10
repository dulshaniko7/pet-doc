<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory{

    protected $model=Doctor::class;

    public function definition()
    {
        return [
            'display_name'=>$this->faker->name,
            'registration_no'=>strval($this->faker->numberBetween($min = 100000, $max = 200000)),
            'clinic_address'=>$this->faker->address,
            'gender'=>$this->faker->randomElement(array('Male','Female','Other')),
            'petdoc_id'=>strval($this->faker->numberBetween($min = 100000, $max = 200000)),
            'rate'=>$this->faker->numberBetween($min = 1000, $max = 10000),
        ];
    }
}
