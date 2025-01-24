<?php

namespace App\Exports;

use App\Models\Sumarisima;
use App\Models\Infractor;
use App\Models\TipoDenuncia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomQuery;

class SumarisimasExport implements FromCollection, WithHeadings, WithMapping
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
        return Sumarisima::with('motivos','infractors')
        ->whereBetween('fecha_ingreso', [$this->startDate , $this->endDate])
        ->get(); // Cargar sumarisimas con sus motivos relacionados y rangos de fechas
    }

    public function headings(): array
    {
        return [
            //DATA TABLE
            'SUMARISIMA ID',
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
    
    public function map($sumarisima): array
    {
        $rows = [];

        foreach ($sumarisima->motivos as $motivo) {
            foreach ($sumarisima->infractors as $infractor) {
               
                    $rows[] = [
                        //DATA TABLE
                        $sumarisima->id,
                        $sumarisima->num_dj,
                        $sumarisima->num_dj_original,

                       
                        $infractor->leg_pers_inf,
                        $infractor->apellido_inf,
                        $infractor->nombre_inf,
                        $motivo->nombre_mot,

                        $sumarisima->lugar_proced,
                        $sumarisima->fecha_ingreso,  
                        $sumarisima->fecha_inicio,
                        $sumarisima->fojas,
                        $sumarisima->tipo_denuncia,
                        $sumarisima->primera_interv,
                        $sumarisima->fecha_pase,
                        $sumarisima->observaciones,
                        $sumarisima->lugar_pase,
                        //DIRECCION GRAL ASUNTOS JUDICIALES
                        $sumarisima->apellido_nombre_DGAJ,
                        $sumarisima->leg_pers_DGAJ,
                        $sumarisima->dependen_DGAJ,
                        $sumarisima->jerarquia_DGAJ,
                        $sumarisima->fecha_reingreso_DGAJ,
                        $sumarisima->obs_reingreso_DGAJ,
                        $sumarisima->opinion_cierre_DGAJ,
                        $sumarisima->fecha_pase_DGAJ,
                        $sumarisima->lugar_pase_DGAJ,
                        $sumarisima->obs_pase_DGAJ,
                        //ASESORIA LETRADA
                        $sumarisima->apellido_nombre_AL,
                        $sumarisima->leg_pers_AL,
                        $sumarisima->dependen_AL,
                        $sumarisima->jerarquia_AL,
                        $sumarisima->reg_interno_AL,
                        $sumarisima->fecha_mov_procAL,
                        $sumarisima->destin_proceden_AL,
                        $sumarisima->sugerencia_AL,
                        $sumarisima->obs_proced_AL,
                        $sumarisima->fecha_mov_paseAL,
                        $sumarisima->destin_pase_AL,
                        $sumarisima->obs_pase_AL,
                        //ASESORIA SEGURIDAD GENERAL
                        $sumarisima->apellido_nombre_SS,
                        $sumarisima->leg_pers_SS,
                        $sumarisima->dependen_SS,
                        $sumarisima->jerarquia_SS,
                        $sumarisima->reg_interno_SS,
                        $sumarisima->fecha_proced_SS,
                        $sumarisima->lugar_proceden_SS,
                        $sumarisima->sugerencia_SS,
                        $sumarisima->obs_proced_SS,
                        $sumarisima->fecha_pase_SS,
                        $sumarisima->lugar_pase_SS,
                        $sumarisima->obs_pase_SS,
                        //DIRECCION GRAL RR. HH.
                        $sumarisima->apellido_nombre_DGRRHH,
                        $sumarisima->leg_pers_DGRRHH,
                        $sumarisima->dependen_DGRRHH,
                        $sumarisima->jerarquia_DGRRHH,
                        $sumarisima->reg_interno_DGRRHH,
                        $sumarisima->fecha_mov_proceDGRRHH,
                        $sumarisima->destin_proceden_DGRRHH,
                        $sumarisima->resol_final_DGRRHH,
                        $sumarisima->obs_proced_DGRRHH,
                        $sumarisima->concluido_DGRRHH,
                        $sumarisima->DGRRHH_N°,
                        $sumarisima->fecha_notificacion,
                        $sumarisima->created_at,
                        $sumarisima->updated_at,

                    ];
                    
            }    
        }

        return $rows;
    }
}
