<?php

namespace Database\Factories;

use App\Models\PetOwner;
use Illuminate\Database\Eloquent\Factories\Factory;

class PetOwnerFactory extends Factory{

    protected $model=PetOwner::class;


    public function definition()
    {
        return [
            'display_name'=>$this->faker->name,
            'gender'=>$this->faker->randomElement(array('Male','Female','Other')),
            'telephone'=>strval($this->faker->numberBetween($min = 1000000, $max = 2000000)),
        ];
    }
}
