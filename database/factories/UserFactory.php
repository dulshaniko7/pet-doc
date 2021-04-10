<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory{

    protected $model=User::class;


    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => strval($this->faker->numberBetween($min = 1000000, $max = 2000000)),
            'address' => $this->faker->address,
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(100),
        ];
    }
}
