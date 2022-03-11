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
            'molde_id'=>$row[1],
            'numero'=>$row[2],
            'descripcion'=>$row[3],                         
            'ubicacion'=>$row[4],                         
            'estado'=>$row[5],
            'estadoTexto'=>$row[6],
            'cavidades'=>$row[7],
            'comentario'=>$row[8],
            'fotoPieza'=>$row[9],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
