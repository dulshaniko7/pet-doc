<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    protected $fillable = ['pet_id', 'status_id', 'address', 'note', 'appointment_time', 'report'];


    public function status()
    {
        return $this->belongsTo('App\Models\AppointmentStatus', 'status_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'doctor_id');
    }

    public function pets()
    {
        return $this->belongsTo('App\Models\Pet', 'pet_id');
    }


}
