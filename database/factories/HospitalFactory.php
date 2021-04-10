<?php

namespace Database\Factories;

use App\Models\Hospital;
use Illuminate\Database\Eloquent\Factories\Factory;

class HospitalFactory extends Factory{

    protected $model=Hospital::class;

    public function definition()
    {
        return [
            'display_name'=>$this->faker->company,
            'registration_no'=>strval($this->faker->numberBetween($min = 100000, $max = 200000)),
            'address'=>$this->faker->address,
            'petdoc_id'=>strval($this->faker->numberBetween($min = 100000, $max = 200000)),
            'rate'=>$this->faker->numberBetween($min = 1000, $max = 10000),
        ];
    }
}
