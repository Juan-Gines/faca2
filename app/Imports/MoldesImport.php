<?php

namespace App\Imports;

use App\Models\Molde;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class MoldesImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[0]!=""){
            return new Molde([
                'numero'=>$row[1],
                'descripcion'=>$row[2],                                
                'ubicacionReal'=>$row[3],
                'ubicacionActual'=>$row[4],
                'versionActual'=>$row[5],                
                'estado'=>$row[6],
                'estadoTexto'=>$row[7],
                'cavidades'=>$row[8],
                'comentario'=>$row[9],
            ]);
        }       
        
    }    

    public function startRow(): int
    {
        return 2;
    }
}
