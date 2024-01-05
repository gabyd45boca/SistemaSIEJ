<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infractor extends Model
{
    use HasFactory;

    protected $table = "infractors";

    protected $fillable = ['apellido_nombre_inf'];

    public function sumarios(){

        return $this->belongsToMany(Sumario::class)->withTimestamps();
    }

    public function sumarisimas(){

        return $this->belongsToMany(Sumarisima::class)->withTimestamps();
    }
}
