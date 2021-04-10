<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';

    protected $fillable = ['date', 'name_saved', 'name_original'];

    public function user()
    {
        return $this->belongsTo('app\Models\Appointment');
    }
}
