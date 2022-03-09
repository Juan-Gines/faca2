<?php

namespace App\Imports;

use App\Models\Referencia;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ReferenciasImports implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Referencia([
            'molde_id'=>$row[0],
            'numero'=>$row[1],
            'descripcion'=>$row[2],                         
            'estado'=>$row[6],
            'estadoTexto'=>$row[7],
            'cavidades'=>$row[8],
            'comentario'=>$row[9],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
