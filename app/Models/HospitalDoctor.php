<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalDoctor extends Model
{
    use HasFactory;

    protected $table = 'hospital_doctors';
    protected $primaryKey = 'id';
    protected $fillable = ['hospital_id', 'display_name', 'registration_no', 'phone', 'address', 'gender', 'status', 'about', 'bank_account', 'branch', 'specialization','type','visit_rate','bank','account_name'];
    protected $with = ['hospital'];


    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital', 'hospital_id', 'hospital_id');
    }

    public function schedule()
    {
        return $this->hasMany('App\Models\HospitalSchedule', 'hospital_doctor_id');
    }


    public function appointments()
    {
        return $this->hasMany('App\Models\HospitalAppointment', 'doctor_id');
    }



}
