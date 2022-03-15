<?php

namespace App\Exports;

use App\Models\Molde;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MoldesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Molde::all();
    }

    public function headings(): array
    {
        return[
            'id',
            'Numero',            
            'Ubicación almacen',
            'Ubicación actual',            
            'Versión actual',
            'Descripción',
            'Estado',
            'Estado Texto',
            'Cavidades',
            'Comentario',
        ];
    }
}
