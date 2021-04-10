<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pets';
    protected $primaryKey = 'id';
    protected $fillable = ['pet_owner_id', 'pet_type', 'name', 'height', 'weight', 'age', 'breed', 'birth_day', 'colour', 'blood_group', 'image', 'note'];

    protected $with = ['pet_type'];

    public function pet_owner()
    {
        return $this->belongsTo('App\Models\PetOwner', 'pet_owner_id', 'pet_owner_id');
    }

    public function pet_type()
    {
        return $this->belongsTo('App\Models\PetType', 'pet_type');
    }

    public function pet_disease()
    {
        return $this->hasMany('App\Models\PetDisease', 'pet_id');
    }
}
