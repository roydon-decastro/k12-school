<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function sectionstudent()
    {
        return $this->hasMany(SectionStudent::class);
    }

    public function levelsubject()
    {
        return $this->hasMany(LevelSubject::class);
    }

    public function levelfees()
    {
        return $this->hasMany(LevelFee::class);
    }
}
