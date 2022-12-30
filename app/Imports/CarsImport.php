<?php

namespace App\Imports;

use App\Models\Car;
use Maatwebsite\Excel\Concerns\ToModel;

class CarsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
//        return new Car([
//            'make' => $row[0],
//            'model' => $row[1],
//            'produced_on' => now()
//        ]);
    }
    public function collection(Collection $rows){

    }
    public function array(Array $rows){

    }
}
