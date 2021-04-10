<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalAppointment extends Model
{
    use HasFactory;

    protected $table = 'hospital_appointments';
    protected $primaryKey = 'id';
    protected $fillable = ['pet_id', 'hospital_id', 'pet_owner_id', 'doctor_id', 'status_id', 'address', 'note', 'appointment_time', 'report'];


    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital', 'hospital_id', 'hospital_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\AppointmentStatus', 'status_id');
    }

    public function pets()
    {
        return $this->belongsTo('App\Models\Pet', 'pet_id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\HospitalDoctor', 'doctor_id');
    }

    public function pet_owner()
    {
        return $this->belongsTo(PetOwner::class, 'pet_owner_id', 'pet_owner_id');
    }

}
