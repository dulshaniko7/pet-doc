<?php

namespace Database\Seeders;

use App\Models\Date;
use Illuminate\Database\Seeder;

class DateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dates = [
            ['id' => '1', 'name' => 'monday'],
            ['id' => '2', 'name' => 'tuesday'],
            ['id' => '3', 'name' => 'wednesday'],
            ['id' => '4', 'name' => 'thursday'],
            ['id' => '5', 'name' => 'friday'],
            ['id' => '6', 'name' => 'saturday'],
            ['id' => '7', 'name' => 'sunday'],
        ];

        Date::insert($dates);
    }
}
