<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_student_id',
        'q1',
        'q2',
        'q3',
        'q4',
    ];

    protected $casts = [
        'q1' => 'array',
        'q2' => 'array',
        'q3' => 'array',
        'q4' => 'array',
    ];

    public function sectionstudent()
    {
        return $this->belongsTo(SectionStudent::class);
    }

}
