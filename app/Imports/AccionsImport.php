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
    public function transformDate($value, $format = 'd/m/Y')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return null;
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
        if(!$vacio){ 
            $fechaEntrada=(trim($row[1])!="")?$this->transformDate(trim($row[1])):null;
            $fechaSalida=(trim($row[0])!="")?$this->transformDate(trim($row[0])):null;
            $fechaPrueba=(trim($row[5])!="")?$this->transformDate(trim($row[5])):null;
            $descripcion=(trim($row[2])=="")?null:$row[2];
            $reparacion=(trim($row[3])=="")?null:$row[3];
            $lugar=(trim($row[4])=="")?null:$row[4];
            $ok=(trim($row[6])=="")?null:$row[6];           
            $acciones=Accion::where('molde_id',$this->molde_id)->get();
            foreach($acciones as $accion){
                                
                if(strtotime($fechaSalida)==strtotime($accion->fechaSalida) &&
                    strtotime($fechaEntrada)==strtotime($accion->fechaEntrada) &&
                    $descripcion==$accion->descripcion &&
                    $reparacion==$accion->reparacion &&
                    $lugar==$accion->lugar &&
                    strtotime($fechaPrueba)==strtotime($accion->fechaPrueba) &&
                    $ok==$accion->ok  
                    ){
                        $vacio=true;
                        break;                        
                }else{
                    $vacio=false;                    
                }
            }
        }
        return $vacio;
    }
    
    public function model(array $row)
    {
        if(!$this->lineaVacia($row)){
            $fechaEntrada=(trim($row[1])!="")?$this->transformDate(trim($row[1])):null;
            $fechaSalida=(trim($row[0])!="")?$this->transformDate(trim($row[0])):null;
            $fechaPrueba=(trim($row[5])!="")?$this->transformDate(trim($row[5])):null;
            return new Accion([
                'fechaEntrada'=>$fechaEntrada,
                'fechaSalida'=>$fechaSalida,
                'descripcion'=>$row[2],
                'reparacion'=>$row[3],
                'lugar'=>$row[4],
                'fechaPrueba'=>$fechaPrueba,
                'ok'=>$row[6],
                'tipo'=>'Reparación',
                'molde_id'=>$this->molde_id
            ]);
        }           
    }
    public function startRow(): int
    {
        return 6;
    }
}
