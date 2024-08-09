<?php

namespace App\Exports;

use App\Models\Sumario;
use App\Models\Infractor;
use App\Models\TipoDenuncia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomQuery;

class SumariosExport implements FromCollection, WithHeadings, WithMapping
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
        return Sumario::with('motivos','infractors','tipo_denuncias')
        ->whereBetween('fecha_ingreso', [$this->startDate , $this->endDate])
        ->get(); // Cargar sumarios con sus motivos relacionados y rangos de fechas
    }

    public function headings(): array
    {
        return [
            //DATA TABLE
            'SUMARIO ID',
            'N°DJA',
            'N°DJ',
            'MOTIVO',
            'LEGAJO',
            'INFRACTOR',
            'TIPO DENUNCIA',    
            'FECHA INGRESO',
            'INFRACCION',
            //////////////////
            'LUGAR PROCEDENCIA',
            'FECHA INICIO',
            'FOJAS',
            'EXTRACTO',
            'FECHA PASE',
            'LUGAR PASE',
            'OBSERVACIONES PASE',
            //ASUNTOS INTERNO
            'INSTRUCTOR D. A. INTERNO',
            'LEGAJO PERS. D. A. INTERNO',
            'DEPENDENCIA D. A. INTERNO',
            'JERARQUIA D. A. INTERNO',
            'REGISTRO INT D. A .INTERNO',
            'FECHA PROCED D. A. INTERNO',
            'LUGAR PROCED D. A. INTERNO',
            'OBS PROCED D. A. INTERNO',
            'SUGERENCIA D. A. INTERNO',
            'FECHA ELEV INST D. A. INTERNO',
            'FECHA PASE D. A. INTERNO',
            'LUGAR PASE D. A. INTERNO',
            'OBS PASE D. A. INTERNO',
            'CONCLUIDO D. A. INTERNO',
            //DIRECCION GRAL ASUNTOS JUDICIALES
            'INSTRUCTOR D.G.A.JUDICIALES',
            'LEGAJO PERS. D.G.A.JUDICIALES',
            'DEPENDENCIA D.G.A.JUDICIALES',
            'JERARQUIA D.G.A.JUDICIALES',
            'FECHA PROCED D.G.A.JUDICIALES',
            'LUGAR PROCED D.G.A.JUDICIALES',
            'SUGERENCIA D.G.A.JUDICIALES',
            'OBS PROCED D.G.A.JUDICIALES',
            'FECHA PASE D.G.A.JUDICIALES',
            'LUGAR PASE D.G.A.JUDICIALES',
            'OBS PASE D.G.A.JUDICIALES',
            'CONCLUIDO D.G.A.JUDICIALES',
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
            'CONCLUIDO  A.LETRADA',
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
            'FECHA PASE  D.G.RR.HUMANOS',
            'LUGAR PASE  D.G.RR.HUMANOS',
            'OBS PASE  D.G.RR.HUMANOS',
            'CONCLUIDO  D.G.RR.HUMANOS',
            'RESOLUCION NRO D.G.RR.HUMANOS',
            'FECHA NOTIFICACION D.G.RR.HUMANOS',
            'FECHA CREACION SUMARIO',
            'FECHA MODIFICACION SUMARIO',
                   
        ];
    }
    
    public function map($sumario): array
    {
        $rows = [];

        foreach ($sumario->motivos as $motivo) {
            foreach ($sumario->infractors as $infractor) {
               
                    $rows[] = [
                        //DATA TABLE
                        $sumario->id,
                        $sumario->num_dja,
                        $sumario->num_dj,
                        $motivo->nombre_mot,
                        $infractor->leg_pers_inf,
                        $infractor->apellido_nombre_inf,
                        $sumario->tipo_denun,
                        $sumario->fecha_ingreso,  
                        $sumario->infraccion,
                        //////////////////
                        $sumario->lugar_proced,
                        $sumario->fecha_inicio,
                        $sumario->fojas,
                        $sumario->extracto,
                        $sumario->fecha_movimiento,
                        $sumario->destino_pase,
                        $sumario->observaciones,
                        //ASUNTOS INTERNO
                        $sumario->apellido_nombre_DAI,
                        $sumario->leg_pers_DAI,
                        $sumario->dependen_DAI,
                        $sumario->jerarquia_DAI,
                        $sumario->reg_interno_DAI,
                        $sumario->fecha_mov_proceDAI,
                        $sumario->destin_proceden_DAI,
                        $sumario->obs_proced_DAI,
                        $sumario->sugerencia_DAI,
                        $sumario->fecha_elev_inst_DAI,
                        $sumario->fecha_mov_paseDAI,
                        $sumario->destin_pase_DAI,
                        $sumario->obs_pase_DAI,
                        $sumario->concluido_DAI,
                        //DIRECCION GRAL ASUNTOS JUDICIALES
                        $sumario->apellido_nombre_DGAJ,
                        $sumario->leg_pers_DGAJ,
                        $sumario->dependen_DGAJ,
                        $sumario->jerarquia_DGAJ,
                        $sumario->fecha_mov_proceDGAJ,
                        $sumario->destin_proced_DGAJ,
                        $sumario->sugerencia_DGAJ,
                        $sumario->obs_proced_DGAJ,
                        $sumario->fecha_mov_destDGAJ,
                        $sumario->destin_pase_DGAJ,
                        $sumario->obs_pase_DGAJ,
                        $sumario->concluido_DGAJ,
                        //ASESORIA LETRADA
                        $sumario->apellido_nombre_AL,
                        $sumario->leg_pers_AL,
                        $sumario->dependen_AL,
                        $sumario->jerarquia_AL,
                        $sumario->reg_interno_AL,
                        $sumario->fecha_mov_procAL,
                        $sumario->destin_proceden_AL,
                        $sumario->sugerencia_AL,
                        $sumario->obs_proced_AL,
                        $sumario->fecha_mov_paseAL,
                        $sumario->destin_pase_AL,
                        $sumario->obs_pase_AL,
                        $sumario->concluido_AL,
                        //DIRECCION GRAL RR. HH.
                        $sumario->apellido_nombre_DGRRHH,
                        $sumario->leg_pers_DGRRHH,
                        $sumario->dependen_DGRRHH,
                        $sumario->jerarquia_DGRRHH,
                        $sumario->reg_interno_DGRRHH,
                        $sumario->fecha_mov_proceDGRRHH,
                        $sumario->destin_proceden_DGRRHH,
                        $sumario->resol_final_DGRRHH,
                        $sumario->obs_proced_DGRRHH,
                        $sumario->fecha_mov_paseDGRRHH,
                        $sumario->destin_pase_DGRRHH,
                        $sumario->obs_pase_DGRRHH,
                        $sumario->concluido_DGRRHH,
                        $sumario->DGRRHH_N°,
                        $sumario->fecha_notificacion,
                        $sumario->created_at,
                        $sumario->updated_at,


                    ];
                    
            }    
        }

        return $rows;
    }
}
