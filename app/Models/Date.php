<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $table = 'dates';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function hospital_doctor()
    {
        return $this->belongsTo('app\Models\HospitalDoctor', 'id');
    }

    public function hospital_exception()
    {
        return $this->belongsTo('app\Models\HospitalDoctorException', 'id');
    }

    public function hospital_shedule()
    {
        return $this->hasMany(HospitalSchedule::class, 'date_id');
    }

    public function doctor_shedule()
    {
        return $this->hasMany(DoctorSchedule::class, 'date_id');
    }
}
