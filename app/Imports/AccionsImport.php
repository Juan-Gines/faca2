<?php

namespace App\Imports;

use App\Models\Accion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AccionsImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $molde_id=null;

    public function __construct($molde_id)
    {
        $this->molde_id=$molde_id;
    }
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }

    public function lineaVacia($row){
        $vacio=true;
        foreach($row as $campo){
            if ($campo=="") $vacio= true;
            else{
                $vacio=false;
                break;
            }            
        }
        return $vacio;
    }
    public function model(array $row)
    {
        if(!$this->lineaVacia($row)){
            $fechaEntrada=($row[0]!="")?$this->transformDate($row[0]):null;
            $fechaSalida=($row[1]!="")?$this->transformDate($row[1]):null;
            $fechaPrueba=($row[5]!="")?$this->transformDate($row[5]):null;
            return new Accion([
                'fechaEntrada'=>$fechaEntrada,
                'fechaSalida'=>$fechaSalida,
                'descripcion'=>$row[2],
                'reparacion'=>$row[3],
                'lugar'=>$row[4],
                'fechaPrueba'=>$fechaPrueba,
                'ok'=>$row[6],
                'tipo'=>'Sin determinar',
                'molde_id'=>$this->molde_id
            ]);
        }        
    }
    public function startRow(): int
    {
        return 6;
    }
}
