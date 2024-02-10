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
        

        

        $check = $row['remarks'];

        if (stripos($check, 'Su') !== false || stripos($check, 'su') !== false || stripos($check, 'SU') !== false || stripos($check, 'Def') !== false || stripos($check, 'def') !== false || stripos($check, 'DEF') !== false){
        
            
            $pattern = '/(\d+)\s*([SDsd])/'; // Modified pattern to capture the number followed by either 'S' or 'D'

            $matches = [];
            preg_match($pattern, $check, $matches);
        
            if (isset($matches[1]) && isset($matches[2])) {
                $numberBeforeSD = $matches[1];
                $letter = strtoupper($matches[2]); // Convert the letter to uppercase for comparison
                
                if ($letter === 'S') {
                    $remark = $numberBeforeSD . " Supp";
                } elseif ($letter === 'D') {
                    $remark = $numberBeforeSD . " Deferred";
                }
                
          
            } else {
                echo "No match found.";
            }  
       
        
        


        //values
        $name = $row['name'];
        $reg = $row['reg'];

        $prog = substr($reg, 0, 3);

        if ($prog = "CEN") {
            $program = "Computer Engineering";
        }

        elseif ($prog = "FSN") {
            $program = "Food Security and Nutrition";
        }

        elseif ($prog= "BPH") {
            $program= "Public Health";
        }
        elseif ($prog= "ICT") {
            $program = "Education ICT";
        }
        elseif ($prog= "ENV") {
            $program = "Environmental Management";
        }

        elseif ($prog= "BED" || $prog = "BEH" ) {
            $program = "Education Humanities";
        }
        elseif ($prog = "BEA") {
            $program = "Education  Agriculture";
        }

        elseif ($prog = "BES") {
            $program = "Education Science";
        }

        else {
            $program = "N/A";
        }
       

        return new results([
            'name'=> $name,
            'reg'=> $reg,
            'program'=> $program,
            'remark'=> $remark,
            
        ]);

        echo "Uploaded successfully!";
    }
}
 public function headingRow(): int
    {
        $counter = 1;

        
        return $counter;
    }
}