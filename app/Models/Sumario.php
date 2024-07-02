<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sumario extends Model
{
    use HasFactory;

    public function infractors(){

        return $this->belongsToMany(Infractor::class)->withTimestamps();
    }

    public function motivos(){

        return $this->belongsToMany(Motivo::class)->withTimestamps();
    }
}
