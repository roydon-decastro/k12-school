<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'schoolyear_id',
        'level_id',
        'section_id',
        'student_id'

    ];
}
