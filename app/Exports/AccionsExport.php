<?php

namespace App\Exports;

use App\Models\Accion;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use \PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class AccionsExport implements 
    FromCollection, 
    WithStyles, 
    WithColumnWidths,
    WithHeadings,
    Responsable,
    WithMapping,
    WithEvents,
    WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    

    protected $molde;

    use Exportable;

    protected $fileName;

    protected $time;

    protected $version;

    public function __construct($molde)
    {        
        $this->molde=$molde;
        $this->time=date('Y_m_d');
        $this->version=explode('/',$this->molde->versionActual);
        $this->fileName=$this->molde->numero.'0'.$this->version[0].'0'.'_'.$this->version[1].$this->time.'.xlsx';
    }    

    public function headings(): array
    {
        return [
            [' ',' ','INFORME REPARACIÓ MOTLLE',' ','RE.RE.02'],
            ['REFERÈNCIA','DENOMINACIÓ'],
            [$this->molde->numero.' '.$this->molde->versionActual,$this->molde->nombre],
            [],
            ['DATA SORTIDA','DATA ENTRADA','MOTIU REPARACIÓ/MODIFICACIÓ','REPARACIÓ /MODIFICACIÓ  EFECTUADA','Intern/ Packmol',' DATA / PROVA Nº.','OK?'],
        ];
    }

    public function map($accion): array
    {
        return[
            \PhpOffice\PhpSpreadsheet\Shared\Date::PHPToExcel($accion->fechaEntrada),
            \PhpOffice\PhpSpreadsheet\Shared\Date::PHPToExcel($accion->fechaSalida),            
            $accion->descripcion,
            $accion->reparacion,
            $accion->lugar,
            $accion->fechaPrueba,
            $accion->ok,
        ];
    }

    public function collection()
    {        
        return Accion::where('molde_id',$this->molde->id)->orderBy('fechaEntrada')->get();
    }
    
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/images/logo.png'));
        /* $drawing->getHeight('20');
        $drawing->setWidth('250'); */        
        $drawing->setCoordinates('A1');
        $drawing->setOffsetX('60');
        $drawing->setOffsetY('10');
        return $drawing;
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
            1=>['font'=>['bold'=>true,'size'=>18]],
            2=>['font'=>['bold'=>true,'size'=>14]],
            3=>['font'=>['bold'=>false,'size'=>12]],
            5=>['font'=>['bold'=>true,'size'=>14]],
            'B2'=> ['alignment'=>['wrapText'=>true,'horizontal'=>'left','vertical'=>'center']],                
            'B3'=> ['alignment'=>['wrapText'=>true,'horizontal'=>'left','vertical'=>'center']],                
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 20,
            'B' => 20,            
            'C' => 54,            
            'D' => 68,            
            'E' => 12,            
            'F' => 16,            
            'G' => 10,                       
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class=>function(AfterSheet $event){                
                $event->sheet->mergeCells('A1:B1');
                $event->sheet->mergeCells('C1:D1');
                $event->sheet->mergeCells('B2:C2');
                $event->sheet->mergeCells('B3:C3');
                $event->sheet->mergeCells('E1:G1');
                $event->sheet->mergeCells('E2:G2');
                $event->sheet->mergeCells('E3:G3');
                $event->sheet->getRowDimension('1')->setRowHeight(60);
                $event->sheet->getRowDimension('2')->setRowHeight(26);
                $event->sheet->getRowDimension('3')->setRowHeight(30);
                $event->sheet->getRowDimension('4')->setRowHeight(20);
                $event->sheet->getRowDimension('5')->setRowHeight(60);
                $event->sheet->getDelegate()->freezePane('A6');
                $event->sheet->getStyle('A')->getNumberFormat()
                                            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DDMMYYYY);
                $event->sheet->getStyle('B')->getNumberFormat()
                                            ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DDMMYYYY);
                $event->sheet->getStyle('A1:G1')->applyFromArray([
                    'borders'=>[
                        'allBorders'=>[
                            'borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color'=>['argb' => '00000000']
                        ]
                    ]
                ]);
                $event->sheet->getStyle('A2:C2')->applyFromArray([
                    'borders'=>[
                        'allBorders'=>[
                            'borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color'=>['argb' => '00000000']
                        ]
                    ]
                ]);
                $event->sheet->getStyle('A3:C3')->applyFromArray([
                    'borders'=>[
                        'allBorders'=>[
                            'borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color'=>['argb' => '00000000']
                        ]
                    ]
                ]);
                $event->sheet->getStyle('A5:G5')->applyFromArray([
                    'borders'=>[
                        'allBorders'=>[
                            'borderStyle'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color'=>['argb' => '00000000']
                        ]
                    ]
                ]);

            }
        ];
    }

}
