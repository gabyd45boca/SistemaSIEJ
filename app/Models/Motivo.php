<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    use HasFactory;

    protected $table = "motivos";

    protected $fillable = ['nombre_mot'];

    public function sumarios(){

        return $this->belongsToMany(Sumario::class)->withTimestamps();
    }

    public function sumarisimas(){

        return $this->belongsToMany(Sumarisima::class)->withTimestamps();
    }

    public function isas(){

        return $this->belongsToMany(Isa::class)->withTimestamps();
    }

    public function sanciones(){

        return $this->belongsToMany(Sancione::class)->withTimestamps();
    }
}
