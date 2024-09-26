<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isa extends Model
{
    use HasFactory;
    protected $fillable = ['num_dja','isa_original_id ','version','num_dja_original'];

    // Método para crear un nuevo reingreso
    public function crearReingreso(array $data)
    {
    // Buscar la versión más alta actual para esta isa
    $ultimaVersion = $this->reingresos()->max('version');
    
    // Si no hay versiones anteriores, empieza con la versión 1
    $nuevaVersion = $ultimaVersion ? $ultimaVersion + 1 : 1;

    // Guardar el num_dja original en el reingreso
    $num_dja_original = $this->num_dja;
    
    // Generar el nuevo num_dja con la versión incrementada
    $nuevoNumDja = $this->num_dja . '-' . $nuevaVersion;

        // Valores por defecto para los campos que no son nulos
        $valoresPorDefecto = [
            'lugar_proced' => 'Lugar de procedencia por defecto',
            'fecha_ingreso' => 'Fecha de ingreso por defecto',
            'num_dj' => 'Número de DJ por defecto',
            'fecha_inicio' => 'Fecha de inicio por defecto',
            'fojas' => 'Fojas por defecto',
            'tipo_denun' => 'Tipo de denuncia por defecto',
            'fecha_movimiento' => 'Fecha de movimiento por defecto',
            'destino_pase' => 'Destino de pase por defecto',
            'observaciones' => 'Observaciones por defecto',
        ];

        // Combinar los datos proporcionados con los valores por defecto
        $datosCompletos = array_merge($valoresPorDefecto, $data);
    //   dd($datosCompletos); // Para verificar el contenido de $datosCompletos
        return $this->reingresos()->create([
            'num_dja' => $nuevoNumDja,
            'num_dja_original' => $num_dja_original,
            'isa_original_id' => $this->id,
            'version' => $nuevaVersion,
            'lugar_proced' => $datosCompletos['lugar_proced'],
            'fecha_ingreso' => $datosCompletos['fecha_ingreso'],
            'num_dj' => $datosCompletos['num_dj'],
            'fecha_inicio' => $datosCompletos['fecha_inicio'],
            'fojas' => $datosCompletos['fojas'],
            'tipo_denun' => $datosCompletos['tipo_denun'],
            'fecha_movimiento' => $datosCompletos['fecha_movimiento'],
            'destino_pase' => $datosCompletos['destino_pase'],
            'observaciones' => $datosCompletos['observaciones'],
        ]);
    }    
    
    public function infractors(){

        return $this->belongsToMany(Infractor::class)->withTimestamps();
    }

     // Relación con la isa original (si es un reingreso)
     public function isaOriginal()
     {
         return $this->belongsTo(Isa::class, 'isa_original_id');
     }

    // Relación con los reingresos (versiones posteriores)
    public function reingresos()
    {
        return $this->hasMany(Isa::class, 'isa_original_id');
    }

    public function motivos(){

        return $this->belongsToMany(Motivo::class)->withTimestamps();
    }

    public function tipo_denuncias(){

        return $this->belongsToMany(TipoDenuncia::class)->withTimestamps();
    }
}
