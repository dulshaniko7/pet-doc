<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $table = 'hospitals';
    protected $primaryKey = 'id';
    protected $fillable = ['hospital_id', 'display_name', 'registration_no', 'petdoc_id', 'rate', 'address', 'image', 'about', 'bank_account', 'branch'];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo('app\Models\User', 'hospital_id');
    }

    public function hospital_doctors()
    {
        return $this->hasMany('App\Models\HospitalDoctor', 'hospital_id');
    }
}
