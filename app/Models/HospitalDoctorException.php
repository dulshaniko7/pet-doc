<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalDoctorException extends Model
{
    use HasFactory;

    protected $table = 'hospital_doctor_exceptions';
    protected $primaryKey = 'id';
    protected $fillable = ['hospital_doctor_id', 'date', 'time_from', 'time_to'];

    public function doctor()
    {
        return $this->belongsTo('app\Models\HospitalDoctor', 'hospital_doctor_id');
    }

    public function date()
    {
        return $this->hasOne('app\Models\Date', 'id');
    }
}
