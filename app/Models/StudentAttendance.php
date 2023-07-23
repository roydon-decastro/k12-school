<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'level_id',
        'section_id',
        'student_id',
        'absent_date',
        'is_absent',
        'subjects',
        'note',
    ];

    protected $casts = [
        'is_absent' => 'boolean',
    ];
}
