<?php

namespace App\Exports;

use App\Models\Results;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;




class ExcelExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $counter = 1;

       $results = Results::select('name','reg', 'remark')->get();

       $data = [];

       foreach ($results as $result) {
           $data[] = [
               'S/N' => $counter++,
               'Name' => $result->name,
               'Registration Number' => $result->reg,
               'Number of Supp Exams' => $result->remark,
           ];
       }

       return collect($data);
        
    }


    public function headings(): array
    {
        return [
            'S/N',
            'Name',
            'Registration Number',
            'Number of Supp Exams',
            'Program',
        ];

    }

    //make headings to be bold
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        $sheet->getStyle('A1:E' . ($sheet->getHighestRow()))->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
    }

    
}
