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

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function section()
    {
        // return $this->hasMany(Section::class);
        return $this->belongsTo(Section::class);
    }


    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function schoolyear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function levelsubject()
    {
        return $this->hasOne(LevelSubject::class);
    }

    public function gradestudent()
    {
        return $this->hasOne(GradeStudent::class);
    }
}
