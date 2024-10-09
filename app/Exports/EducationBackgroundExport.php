<?php

namespace App\Exports;

use App\Models\EducationBackground;
use Maatwebsite\Excel\Concerns\FromCollection;

class EducationBackgroundExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EducationBackground::select('student_id','degree','subject','result','passing_year','name_of_institute')->get();
    }
}
