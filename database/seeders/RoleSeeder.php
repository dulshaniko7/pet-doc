<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => '1' ,
                'name' => 'super-admin',
                'guard_name' => 'web'
            ],
            [
                'id' => '2' ,
                'name' => 'admin',
                'guard_name' => 'web'
            ],
            [
                'id' => '3' ,
                'name' => 'doctor',
                'guard_name' => 'web'
            ],
            [
                'id' => '4' ,
                'name' => 'hospital',
                'guard_name' => 'web'
            ],
            [
                'id' => '5' ,
                'name' => 'pet-owner',
                'guard_name' => 'web'
            ],
        ];

        Role::insert($roles);
    }
}
