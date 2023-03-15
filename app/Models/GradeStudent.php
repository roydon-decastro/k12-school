<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_student_id',
        'faculty_id',
        'grades',
    ];

    protected $casts = [
        'grades' => 'array',
    ];

    public function sectionstudent()
    {
        return $this->belongsTo(SectionStudent::class);
    }

}
