<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    protected $table = 'doctor_schedules';
    protected $primaryKey = 'id';
    protected $fillable = ['doctor_id', 'date', 'time_from', 'time_to'];

    public function doctor()
    {
        return $this->belongsTo('app\Models\Doctor', 'doctor_id', 'doctor_id');
    }
}
