<?php

namespace Database\Seeders;

use App\Enums\AppointmentStatusType;
use App\Models\AppointmentStatus;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
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
                'type'=> AppointmentStatusType::PENDING
            ],
            [
                'id' => '2' ,
                'type'=> AppointmentStatusType::APPROVED
            ],
            [
                'id' => '3' ,
                'type'=> AppointmentStatusType::REJECTED
            ],
            [
                'id' => '4' ,
                'type'=> AppointmentStatusType::PAYMENT_PENDING
            ],
            [
                'id' => '5' ,
                'type'=> AppointmentStatusType::IN_PROGRESS
            ],
            [
                'id' => '6' ,
                'type'=> AppointmentStatusType::DONE
            ],
        ];

        AppointmentStatus::insert($types);
    }
}
