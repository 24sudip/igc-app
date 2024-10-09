<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id', 'id');
    }
}
