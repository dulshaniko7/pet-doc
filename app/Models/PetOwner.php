<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetOwner extends Model
{
    use HasFactory;

    protected $table = 'pet_owners';
    protected $primaryKey = 'id';
    protected $fillable = ['pet_owner_id', 'display_name', 'gender', 'telephone', 'first_name', 'last_name', 'address', 'city'];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function pets()
    {
        return $this->hasMany(Pet::class, 'pet_owner_id');
    }

    public function hospital_appointments()
    {
        return $this->hasMany(HospitalAppointment::class, 'pet_owner_id');
    }

    public function payment_data()
    {
        return $this->hasMany(PaymentData::class, 'pet_owner_id');
    }
}
