<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = 'treatments';

    protected $fillable = ['pet_id', 'title', 'treatment'];

    public function treatments()
    {
        return $this->morphTo();
    }

    public function pets()
    {
        return $this->belongsTo('App\Models\Pet', 'pet_id');
    }
}

