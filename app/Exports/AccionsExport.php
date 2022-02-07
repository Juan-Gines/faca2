<?php

namespace App\Exports;

use App\Models\Accion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use \PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class AccionsExport implements FromCollection, WithStyles, WithColumnWidths, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $acciones;

    protected $molde;

    public function __construct($acciones,$molde)
    {
        $this->acciones=$acciones;
        $this->molde=$molde;
    }    

    public function headings(): array
    {
        return [
            [' ',' ',' ','INFORME REPARACIÓ MOTLLE'],
            ['REFERÈNCIA','DENOMINACIÒ'],
            [$this->molde->numero,$this->molde->nombre],
            ['Fecha Inicio','Fecha Fin','Tipo','Descripción','Reparación','Lugar','Fecha Prueba','¿Ok? prueba'],
        ];
    }

    public function collection()
    {
        foreach ($this->acciones as $accion) {
            $accion->fechaEntrada=Date::dateTimeToExcel(strtotime($accion->fechaEntrada));
            $accion->fechaSalida=Date::dateTimeToExcel($accion->fechaSalida);
            $accion->fechaPrueba=Date::dateTimeToExcel($accion->fechaPrueba);
        }
        return $this->acciones;
    }
    
 

    public function styles(Worksheet $sheet)
    {
        $stiloscolumnas=['alignment'=>['wrapText'=>true,'horizontal'=>'center','vertical'=>'center'],
                        
        ];
        return [
            'A' =>$stiloscolumnas,                    
            'B' =>$stiloscolumnas,
            'C' =>$stiloscolumnas,
            'D' =>$stiloscolumnas,
            'E' =>$stiloscolumnas,
            'F' =>$stiloscolumnas,
            'G' =>$stiloscolumnas,
            'H' =>$stiloscolumnas,
            1=>['font'=>['bold'=>true,'size'=>20]],
            2=>['font'=>['bold'=>true,'size'=>16]],
            3=>['font'=>['bold'=>true,'size'=>12]],
            4=>['font'=>['bold'=>true,'size'=>16]],            
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,            
            'C' => 20,            
            'D' => 50,            
            'E' => 50,            
            'F' => 10,            
            'G' => 20,            
            'H' => 10,            
        ];
    }

    
}
