<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $fillable = ['num_orden_exp','expediente_original_id ','version','num_orden_exp_original','procedencia_exp','fecha_ingreso_exp',
    'origen_exp','fojas_exp','tipo_exp','extracto_exp','iniciador_exp','fecha_salida_exp','destino_exp','observaciones_exp'];

      // Método para crear un nuevo reingreso
      public function crearReingreso(array $data)
      {
         // Buscar la versión más alta actual para este sumario
         $ultimaVersion = $this->reingresos()->max('version');
         
         // Si no hay versiones anteriores, empieza con la versión 1
         $nuevaVersion = $ultimaVersion ? $ultimaVersion + 1 : 1;
      
         // Guardar el num_dja original en el reingreso
         $num_orden_exp_original = $this->num_orden_exp;
        
         // Generar el nuevo num_dja con la versión incrementada
         $nuevoNum_orden_exp  = $this->num_orden_exp . '-' . $nuevaVersion;
      
          // Valores por defecto para los campos que no son nulos
          $valoresPorDefecto = [
              'procedencia_exp' => 'Lugar de procedencia por defecto',
              'fecha_ingreso_exp' => 'Fecha de ingreso por defecto',
              'origen_exp' => 'Origen del expediente por defecto',
              'fojas_exp' => 'Fojas por defecto',
              'tipo_exp' => 'tipo de denuncia por defecto',
              'extracto_exp' => 'Extracto por defecto',
              'iniciador_exp' => 'Persona que inicia el expediente por defecto',
              'fecha_salida_exp' => 'Fecha de salida por defecto',
              'destino_exp' => 'Destino de pase por defecto',
              'observaciones_exp' => 'Observaciones por defecto',
          ];
      
          // Combinar los datos proporcionados con los valores por defecto
          $datosCompletos = array_merge($valoresPorDefecto, $data);
     //   dd($datosCompletos); // Para verificar el contenido de $datosCompletos
          return $this->reingresos()->create([
              'num_orden_exp' => $nuevoNum_orden_exp,
              'num_orden_exp_original' => $num_orden_exp_original,
              'expediente_original_id' => $this->id,
              'version' => $nuevaVersion,
              'procedencia_exp' => $datosCompletos['procedencia_exp'],
              'fecha_ingreso_exp' => $datosCompletos['fecha_ingreso_exp'],
              'origen_exp' => $datosCompletos['origen_exp'],
              'fojas_exp' => $datosCompletos['fojas_exp'],
              'tipo_exp' => $datosCompletos['tipo_exp'],
              'extracto_exp' => $datosCompletos['extracto_exp'],
              'iniciador_exp' => $datosCompletos['iniciador_exp'],
              'fecha_salida_exp' => $datosCompletos['fecha_salida_exp'],
              'destino_exp' => $datosCompletos['destino_exp'],
              'observaciones_exp' => $datosCompletos['observaciones_exp'],
          ]);
     }

     // Relación con el expedientes original (si es un reingreso)
     public function expedienteOriginal()
     {
         return $this->belongsTo(Expediente::class, 'expediente_original_id');
     }
 
     // Relación con los reingresos (versiones posteriores)
     public function reingresos()
     {
         return $this->hasMany(Expediente::class, 'expediente_original_id');
     }
    
}
