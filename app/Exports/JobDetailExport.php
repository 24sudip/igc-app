<?php

namespace App\Exports;

use App\Models\JobDetail;
use Maatwebsite\Excel\Concerns\FromCollection;

class JobDetailExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JobDetail::select('student_id','company','designation','duration','salary_type')->get();
    }
}
