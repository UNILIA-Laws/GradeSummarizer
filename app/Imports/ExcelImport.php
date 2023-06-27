<?php
namespace App\Imports;
use App\Models\results;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class ExcelImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    
    public function model(array $row)
    {
        HeadingRowFormatter::default('none');

        $check = $row['remarks'];

    if (strpos($check, 'Su') !== false || stripos($check, 'su') !== false || stripos($check, 'SU') !== false){

        
        $pattern = '/(\d+)\s*[Ss]/'; // Regular expression pattern to match the number before "S" or "s"

        $matches = [];
        preg_match($pattern, $check, $matches);

        if (isset($matches[1])) {
            $numberBeforeS = $matches[1];
            $remark =  $numberBeforeS;
        } else {
            echo "No match found.";
        }


        //values
        $name = $row['name'];
        $reg = $row['reg'];
       

        return new results([
            'name'=> $name,
            'reg'=> $reg,
            'remark'=> $remark,
        ]);
    }
}
}