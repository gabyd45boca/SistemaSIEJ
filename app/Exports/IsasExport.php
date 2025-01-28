<?php

namespace App\Exports;

use App\Models\Isa;
use App\Models\Infractor;
use App\Models\TipoDenuncia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithCustomQuery;

class IsasExport implements FromCollection, WithHeadings, WithMapping
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
        return Isa::with('motivos','infractors')
        ->whereBetween('fecha_ingreso', [$this->startDate , $this->endDate])
        ->get(); // Cargar isas con sus motivos relacionados y rangos de fechas
    }

    public function headings(): array
    {
        return [
            //DATA TABLE
            'SUMARIO ID',
            'N°DJA',
            'N°DJA ORIGINAL',
            'N°DJ',
            'MOTIVO',
            'LEGAJO',
            'APELLIDO INFRACTOR',
            'NOMBRE INFRACTOR',
            'TIPO DENUNCIA',    
            'FECHA INGRESO',
            'INFRACCION',
            //////////////////
            'LUGAR PROCEDENCIA',
            'FECHA INICIO',
            'FOJAS',
            'DESLINDAR RESPONSABILIDAD',
            'FECHA PASE',
            'LUGAR PASE',
            'OBSERVACIONES PASE',
            'ELEVADO POR INSTRUCCION',
            'OPINION SEDE INSTRUCTORA',
            'COVERSION CONVALIDAR',
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
            'FECHA CREACION ISA',
            'FECHA MODIFICACION ISA',
                   
        ];
    }
    
    public function map($isa): array
    {
        $rows = [];

        foreach ($isa->motivos as $motivo) {
            foreach ($isa->infractors as $infractor) {
               
                    $rows[] = [
                        //DATA TABLE
                        $isa->id,
                        $isa->num_dja,
                        $isa->num_dja_original,
                        $isa->num_dj,
                        $motivo->nombre_mot,
                        $infractor->leg_pers_inf,
                        $infractor->apellido_inf,
                        $infractor->nombre_inf,
                        $isa->tipo_denun,
                        $isa->fecha_ingreso,  
                    
                        //////////////////
                        $isa->lugar_proced,
                        $isa->fecha_inicio,
                        $isa->fojas,
                        $isa->deslindar_resp,
                        $isa->fecha_movimiento,
                        $isa->destino_pase,
                        $isa->observaciones,
                        $isa->elevado_por_instruccion,
                        $isa->opinion_sede_inst,
                        $isa->conversion_convalid,

                        //ASUNTOS INTERNO
                        $isa->apellido_nombre_DAI,
                        $isa->leg_pers_DAI,
                        $isa->dependen_DAI,
                        $isa->jerarquia_DAI,
                        $isa->reg_interno_DAI,
                        $isa->fecha_mov_proceDAI,
                        $isa->destin_proceden_DAI,
                        $isa->obs_proced_DAI,
                        $isa->sugerencia_DAI,
                        $isa->fecha_elev_inst_DAI,
                        $isa->fecha_mov_paseDAI,
                        $isa->destin_pase_DAI,
                        $isa->obs_pase_DAI,
                        $isa->concluido_DAI,
                        //DIRECCION GRAL ASUNTOS JUDICIALES
                        $isa->apellido_nombre_DGAJ,
                        $isa->leg_pers_DGAJ,
                        $isa->dependen_DGAJ,
                        $isa->jerarquia_DGAJ,
                        $isa->fecha_mov_proceDGAJ,
                        $isa->destin_proced_DGAJ,
                        $isa->sugerencia_DGAJ,
                        $isa->obs_proced_DGAJ,
                        $isa->fecha_mov_destDGAJ,
                        $isa->destin_pase_DGAJ,
                        $isa->obs_pase_DGAJ,
                        $isa->concluido_DGAJ,
                        //ASESORIA LETRADA
                        $isa->apellido_nombre_AL,
                        $isa->leg_pers_AL,
                        $isa->dependen_AL,
                        $isa->jerarquia_AL,
                        $isa->reg_interno_AL,
                        $isa->fecha_mov_procAL,
                        $isa->destin_proceden_AL,
                        $isa->sugerencia_AL,
                        $isa->obs_proced_AL,
                        $isa->fecha_mov_paseAL,
                        $isa->destin_pase_AL,
                        $isa->obs_pase_AL,
                        $isa->concluido_AL,
                        //DIRECCION GRAL RR. HH.
                        $isa->apellido_nombre_DGRRHH,
                        $isa->leg_pers_DGRRHH,
                        $isa->dependen_DGRRHH,
                        $isa->jerarquia_DGRRHH,
                        $isa->reg_interno_DGRRHH,
                        $isa->fecha_mov_proceDGRRHH,
                        $isa->destin_proceden_DGRRHH,
                        $isa->resol_final_DGRRHH,
                        $isa->obs_proced_DGRRHH,
                        $isa->fecha_mov_paseDGRRHH,
                        $isa->destin_pase_DGRRHH,
                        $isa->obs_pase_DGRRHH,
                        $isa->concluido_DGRRHH,
                        $isa->DGRRHH_N°,
                        $isa->fecha_notificacion,
                        $isa->created_at,
                        $isa->updated_at,
                    ];
                    
            }    
        }

        return $rows;
    }
}
