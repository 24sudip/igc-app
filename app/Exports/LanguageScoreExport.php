<?php

namespace App\Exports;

use App\Models\LanguageScore;
use Maatwebsite\Excel\Concerns\FromCollection;

class LanguageScoreExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LanguageScore::select('student_id','type','overall_score','reading_score','writing_score','listening_score','speaking_score','expire_date')->get();
    }
}
