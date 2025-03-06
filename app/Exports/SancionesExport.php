<?php

namespace App\Exports;

use App\Models\Sancione;
use App\Models\Infractor;
use App\Models\TipoDenuncia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomQuery;

class SancionesExport implements FromCollection, WithHeadings, WithMapping
{
    protected $fechaInicial;
    protected $fechaFinal;

    public function __construct($fechaInicial, $fechaFinal)
    {
        $this->startDate  = $fechaInicial;
        $this->endDate  = $fechaFinal;
    }

    public function collection()
    {
        return Sancione::with('motivos','infractors')
        ->whereBetween('fecha_ingreso', [$this->startDate , $this->endDate])
        ->get(); // Cargar sanciones con sus motivos relacionados y rangos de fechas
    }

    public function headings(): array
    {
        return [
            //DATA TABLE
            'SANCION ID',
            'N°DJ',
            'N°DJ_ORGINAL',

            'LEGAJO',
            'APELLIDO INFRACTOR',
            'NOMBRE INFRACTOR',
            'MOTIVO',

            'LUGAR PROCEDENCIA',
            'FECHA INGRESO',
            'FECHA INICIO',
            'FOJAS',
            'TIPO DENUNCIA',    
            'PRIMERA INTERVENCION',
            'FECHA PASE',
            'OBSERVACIONES PASE',
            'LUGAR PASE',
            //DIRECCION GRAL ASUNTOS JUDICIALES
            'INSTRUCTOR D.G.A.JUDICIALES',
            'LEGAJO PERS. D.G.A.JUDICIALES',
            'DEPENDENCIA D.G.A.JUDICIALES',
            'JERARQUIA D.G.A.JUDICIALES',
            'FECHA PROCED D.G.A.JUDICIALES',
            'OBS PROCED D.G.A.JUDICIALES',
            'SUGERENCIA D.G.A.JUDICIALES',
            'FECHA PASE D.G.A.JUDICIALES',
            'LUGAR PASE D.G.A.JUDICIALES',
            'OBS PASE D.G.A.JUDICIALES',
            //ASESORIA LETRADA
            'INSTRUCTOR A.LETRADA',
            'LEGAJO PERS.  A.LETRADA',
            'DEPENDENCIA  A.LETRADA',
            'JERARQUIA  A.LETRADA',
            'REGISTRO INT  A.LETRADA',
            'FECHA PROCED  A.LETRADA',
            'LUGAR PROCED  A.LETRADA',
            'SUGERENCIA  A.LETRADA',
            'OBS PROCED  A.LETRADA',
            'FECHA PASE  A.LETRADA',
            'LUGAR PASE  A.LETRADA',
            'OBS PASE  A.LETRADA',
            //ASUNTOS INTERNO
            'INSTRUCTOR D. S. GRAL',
            'LEGAJO PERS. D. S. GRAL',
            'DEPENDENCIA D. S. GRAL',
            'JERARQUIA D. S. GRAL',
            'REGISTRO INT D. S. GRAL',
            'FECHA PROCED D. S. GRAL',
            'LUGAR PROCED D. S. GRAL',
            'SUGERENCIA D. S. GRAL',
            'OBS PROCED D. S. GRAL',
            'FECHA PASE D. S. GRAL',
            'LUGAR PASE D. S. GRAL',
            'OBS PASE D. S. GRAL',
            //DIRECCION GRAL RR. HH.
            'INSTRUCTOR D.G.RR.HUMANOS',
            'LEGAJO PERS.  D.G.RR.HUMANOS',
            'DEPENDENCIA  D.G.RR.HUMANOS',
            'JERARQUIA  D.G.RR.HUMANOS',
            'REGISTRO INT  D.G.RR.HUMANOS',
            'FECHA PROCED  D.G.RR.HUMANOS',
            'LUGAR PROCED  D.G.RR.HUMANOS',
            'RESOLUCION FINAL DGRRHH',
            'OBS PROCED  D.G.RR.HUMANOS',
            'CONCLUIDO  D.G.RR.HUMANOS',
            'RESOLUCION NRO D.G.RR.HUMANOS',
            'FECHA NOTIFICACION D.G.RR.HUMANOS',
            'FECHA CREACION SUMARISIMA',
            'FECHA MODIFICACION SUMARISIMA',
                             
        ];
    }
    
    public function map($sancion): array
    {
        $rows = [];

        foreach ($sancion->motivos as $motivo) {
            foreach ($sancion->infractors as $infractor) {
               
                    $rows[] = [
                        //DATA TABLE
                        $sancion->id,
                        $sancion->num_dj,
                        $sancion->num_dj_original,
                       
                        $infractor->leg_pers_inf,
                        $infractor->apellido_inf,
                        $infractor->nombre_inf,
                        $motivo->nombre_mot,

                        $sancion->lugar_proced,
                        $sancion->fecha_ingreso,  
                        $sancion->fecha_inicio,
                        $sancion->fojas,
                        $sancion->tipo_denuncia,
                        $sancion->primera_interv,
                        $sancion->fecha_pase,
                        $sancion->observaciones,
                        $sancion->lugar_pase,
                        //DIRECCION GRAL ASUNTOS JUDICIALES
                        $sancion->apellido_nombre_DGAJ,
                        $sancion->leg_pers_DGAJ,
                        $sancion->dependen_DGAJ,
                        $sancion->jerarquia_DGAJ,
                        $sancion->fecha_reingreso_DGAJ,
                        $sancion->obs_reingreso_DGAJ,
                        $sancion->opinion_cierre_DGAJ,
                        $sancion->fecha_pase_DGAJ,
                        $sancion->lugar_pase_DGAJ,
                        $sancion->obs_pase_DGAJ,
                        //ASESORIA LETRADA
                        $sancion->apellido_nombre_AL,
                        $sancion->leg_pers_AL,
                        $sancion->dependen_AL,
                        $sancion->jerarquia_AL,
                        $sancion->reg_interno_AL,
                        $sancion->fecha_mov_procAL,
                        $sancion->destin_proceden_AL,
                        $sancion->sugerencia_AL,
                        $sancion->obs_proced_AL,
                        $sancion->fecha_mov_paseAL,
                        $sancion->destin_pase_AL,
                        $sancion->obs_pase_AL,
                        //ASESORIA SEGURIDAD GENERAL
                        $sancion->apellido_nombre_SS,
                        $sancion->leg_pers_SS,
                        $sancion->dependen_SS,
                        $sancion->jerarquia_SS,
                        $sancion->reg_interno_SS,
                        $sancion->fecha_proced_SS,
                        $sancion->lugar_proceden_SS,
                        $sancion->sugerencia_SS,
                        $sancion->obs_proced_SS,
                        $sancion->fecha_pase_SS,
                        $sancion->lugar_pase_SS,
                        $sancion->obs_pase_SS,
                        //DIRECCION GRAL RR. HH.
                        $sancion->apellido_nombre_DGRRHH,
                        $sancion->leg_pers_DGRRHH,
                        $sancion->dependen_DGRRHH,
                        $sancion->jerarquia_DGRRHH,
                        $sancion->reg_interno_DGRRHH,
                        $sancion->fecha_mov_proceDGRRHH,
                        $sancion->destin_proceden_DGRRHH,
                        $sancion->resol_final_DGRRHH,
                        $sancion->obs_proced_DGRRHH,
                        $sancion->concluido_DGRRHH,
                        $sancion->DGRRHH_N°,
                        $sancion->fecha_notificacion,
                        $sancion->created_at,
                        $sancion->updated_at,

                    ];
                    
            }    
        }

        return $rows;
    }
}
