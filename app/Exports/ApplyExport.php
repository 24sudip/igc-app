<?php

namespace App\Exports;

use App\Models\Apply;
use Maatwebsite\Excel\Concerns\FromCollection;

class ApplyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Apply::select('student_id','university','program_level','intake','subject','tution_fee','application_fee','country')->get();
    }
}
