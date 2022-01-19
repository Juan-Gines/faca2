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
                'numero'=>$row[0],
                'nombre'=>$row[1],
                'ubicacionReal'=>$row[2],
                'estado'=>'light',
                'estadoTexto'=>'Desconocido'
            ]);
        }       
        
    }    

    public function startRow(): int
    {
        return 7;
    }
}
