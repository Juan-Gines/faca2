<?php

namespace App\Imports;

use App\Models\Accion;
use DateTime;
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
            if(is_numeric($value)){
                return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
            }else{
                if(preg_match('/^(\d{2}\/\d{2}\/\d{4})/',$value,$matches)){
                    $match=explode("/",$matches[0]);
                    return $match[2]."-".$match[1]."-".$match[0];
                }
            }
            
        } catch (\ErrorException $e) {
                            
            return null;
        } // 10/02/2022        
    }

    public function lineaVacia($row){
        $vacio=true;
        
        foreach($row as $campo){            
            if (trim($campo)=="") $vacio= true;
            else{                
                $vacio=false;
                break;                
            }            
        }
        if(!$vacio){ 
            $fechaEntrada=(trim($row[1])!="")?$this->transformDate(trim($row[1])):$this->transformDate(trim($row[0]));
            $fechaSalida=(trim($row[0])!="")?$this->transformDate(trim($row[0])):null;
            $fechaPrueba=(trim($row[5])=="")?null:$row[5];
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
                    $fechaPrueba==$accion->fechaPrueba &&
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
            $fechaSalida=(trim($row[0])!="")?$this->transformDate(trim($row[0])):null;
            $fechaEntrada=(trim($row[1])!="")?$this->transformDate(trim($row[1])):$fechaSalida;            
            return new Accion([
                'fechaEntrada'=>$fechaEntrada,
                'fechaSalida'=>$fechaSalida,
                'descripcion'=>$row[2],
                'reparacion'=>$row[3],
                'lugar'=>$row[4],
                'fechaPrueba'=>$row[5],
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
