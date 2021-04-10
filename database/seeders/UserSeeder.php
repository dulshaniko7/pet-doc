<?php

namespace Database\Seeders;

use App\Enums\AppointmentStatusType;
use App\Enums\RoleType;
use App\Models\AppointmentStatus;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\PetOwner;
use App\Models\PetType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $superUser = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'password' => Hash::make('123456'),
        ]);

        $superUser->assignRole(RoleType::SUPER_ADMIN);

        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
        ]);

        $adminUser->assignRole(RoleType::ADMIN);

    }
}
