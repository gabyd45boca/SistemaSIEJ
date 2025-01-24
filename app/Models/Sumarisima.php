<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Sumarisima extends Model
{
    use HasFactory;

    protected $fillable = ['num_dj','sumarisima_original_id ','version','num_dj_original','lugar_proced','fecha_ingreso',
                          'fecha_inicio','fojas','primera_interv','fecha_pase','tipo_denuncia','lugar_pase','observaciones'];

     // Método para crear un nuevo reingreso
     public function crearReingreso(array $data)
     {
        // Buscar la versión más alta actual para este sumario
        $ultimaVersion = $this->reingresos()->max('version');
        
        // Si no hay versiones anteriores, empieza con la versión 1
        $nuevaVersion = $ultimaVersion ? $ultimaVersion + 1 : 1;
     
        // Guardar el num_dja original en el reingreso
        $num_dj_original = $this->num_dj;
       
        // Generar el nuevo num_dja con la versión incrementada
        $nuevoNumDj = $this->num_dj . '-' . $nuevaVersion;
     
         // Valores por defecto para los campos que no son nulos
         $valoresPorDefecto = [
             'lugar_proced' => 'Lugar de procedencia por defecto',
             'fecha_ingreso' => 'Fecha de ingreso por defecto',
             'num_dja' => 'Número de DJA por defecto',
             'fecha_inicio' => 'Fecha de inicio por defecto',
             'fojas' => 'Fojas por defecto',
             'primera_interv' => 'Pprimera intervencion por defecto',
             'tipo_denuncia' => 'Tipo de denuncia por defecto',
             'fecha_pase' => 'Fecha de pase por defecto',
             'observaciones' => 'Observaciones por defecto',
             'lugar_pase' => 'Lugar de pase por defecto',
         ];
     
         // Combinar los datos proporcionados con los valores por defecto
         $datosCompletos = array_merge($valoresPorDefecto, $data);
    //   dd($datosCompletos); // Para verificar el contenido de $datosCompletos
         return $this->reingresos()->create([
             'num_dj' => $nuevoNumDj,
             'num_dj_original' => $num_dj_original,
             'sumarisima_original_id' => $this->id,
             'version' => $nuevaVersion,

             'lugar_proced' => $datosCompletos['lugar_proced'],
             'fecha_ingreso' => $datosCompletos['fecha_ingreso'],
             //'num_dja' => $datosCompletos['num_dja'],
             'fecha_inicio' => $datosCompletos['fecha_inicio'],
             'fojas' => $datosCompletos['fojas'],
             'primera_interv' => $datosCompletos['primera_interv'],
             'tipo_denuncia' => $datosCompletos['tipo_denuncia'],
             'fecha_pase' => $datosCompletos['fecha_pase'],
             'observaciones' => $datosCompletos['observaciones'],
             'lugar_pase' => $datosCompletos['lugar_pase'],
         ]);
     }

      // Relación con el sumario original (si es un reingreso)
    public function sumarisimaOriginal()
    {
        return $this->belongsTo(Sumarisima::class, 'sumarisima_original_id');
    }

    // Relación con los reingresos (versiones posteriores)
    public function reingresos()
    {
        return $this->hasMany(Sumarisima::class, 'sumarisima_original_id');
    }
     
    public function infractors(){

        return $this->belongsToMany(Infractor::class)->withTimestamps();
    }

    public function motivos(){

        return $this->belongsToMany(Motivo::class)->withTimestamps();
    }
    
}
