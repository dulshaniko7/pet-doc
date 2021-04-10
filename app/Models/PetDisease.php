<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetDisease extends Model
{
    use HasFactory;

    protected $table = 'pet_diseases';

    protected $fillable = ['pet_id', 'disease'];

    public function pet()
    {
        return $this->belongsTo('App\Models\Pet', 'pet_id');
    }
}
