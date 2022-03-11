<?php

namespace App\Exports;

use App\Models\Referencia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReferenciasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Referencia::all();
    }
    public function headings(): array
    {
        return[
            'id',
            'Molde_id',
            'numero',
            'Descripción',
            'Ubicación almacen',            
            'Estado',
            'Estado Texto',
            'Cavidades',
            'Comentario',
            'fotoPieza',
        ];
    }
}
