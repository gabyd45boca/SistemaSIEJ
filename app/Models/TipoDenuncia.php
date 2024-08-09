<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDenuncia extends Model
{
    use HasFactory;

    protected $table = "tipo_denuncias";

    protected $fillable = ['nombre_tipoDen'];


    public function sumarios(){

        return $this->belongsToMany(Sumario::class)->withTimestamps();
    }
}
