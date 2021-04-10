<?php

namespace Database\Seeders;

use App\Models\PetType;
use Illuminate\Database\Seeder;

class PetTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'id' => '1' ,
                'type' => 'dog',
            ],
            [
                'id' => '2' ,
                'type' => 'cat',
            ],
        ];

        PetType::insert($types);
    }
}
