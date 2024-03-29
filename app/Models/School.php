<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'image',
        'slug',
        'code',
        'email',
        'contact1',
        'contact2',
        'contact3',
        'contact4',
        'type',
        'environment',
    ];

    public function buildings()
    {
        return $this->hasMany(Building::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
        // return $this->hasManyThrough(Room::class, Building::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function school_years()
    {
        return $this->hasMany(SchoolYear::class);
    }

    public function sectionstudent()
    {
        // return $this->belongsTo(SectionStudent::class);
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

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }

    public function users()
{
    return $this->hasMany(User::class);
}

}
