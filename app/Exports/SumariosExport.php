<?php

namespace App\Exports;

use App\Models\Sumario;
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
        return Sumario::with('motivos')
        ->whereBetween('fecha_ingreso', [$this->startDate , $this->endDate])
        ->get(); // Cargar sumarios con sus motivos relacionados y rangos de fechas
    }

    public function headings(): array
    {
        return [
            'Sumario ID',
            'N°DJA',
            'N°DJ',
            'MOTIVO',
            'LEGAJO',
            'INFRACTOR',
            'TIPO DENUNCIA',
            'FECHA INGRESO',
            'INFRACCION',
                       
        ];
    }
    
    public function map($sumario): array
    {
        $rows = [];

        foreach ($sumario->motivos as $motivo) {
            $rows[] = [
                $sumario->id,
                $sumario->num_dja,
                $sumario->num_dj,
                $motivo->nombre_mot,
                $sumario->fecha_ingreso,
            ];
        }

        return $rows;
    }
}
