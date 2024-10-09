<?php

namespace App\Imports;

use App\Models\Survey;
use Maatwebsite\Excel\Concerns\ToModel;

class SurveyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Survey([
            'name' => $row[0],
            'phone'=> $row[1],
            'email'=>$row[2],
            'country'=>$row[3],
            'desired_level_of_education'=>$row[4],
        ]);
    }
}
