<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetType extends Model
{
    protected $table = 'pet_types';
    protected $primaryKey = 'id';
    protected $fillable = ['type'];

}
