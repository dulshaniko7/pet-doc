<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HospitalSchedule extends Model
{
    protected $table = 'hospital_schedules';
    protected $primaryKey = 'id';
    protected $fillable = ['hospital_doctor_id', 'time_from', 'time_to', 'date_id'];

    /**
     * @var int
     */

    public function doctor()
    {
        return $this->belongsTo(HospitalDoctor::class, 'hospital_doctor_id');
    }

    public function date()
    {
        return $this->belongsTo(Date::class, 'id');
    }
}
