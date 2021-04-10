<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';
    protected $primaryKey = 'id';
    protected $fillable = ['doctor_id', 'display_name', 'registration_no', 'clinic_address', 'gender', 'petdoc_id', 'rate', 'image', 'status', 'about', 'bank_account', 'branch', 'specialization'];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'doctor_id');
    }

    public function schedule()
    {
        return $this->hasMany('App\Models\DoctorSchedule', 'doctor_id');
    }

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment', 'doctor_id');
    }

    public function treatments()
    {
        return $this->hasMany('App\Models\Treatment', 'doctor_id');
    }
}
