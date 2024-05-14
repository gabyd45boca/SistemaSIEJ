<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sancione extends Model
{
    use HasFactory;

    public function infractors(){

        return $this->belongsToMany(Infractor::class)->withTimestamps();
    }
}
