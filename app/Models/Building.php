<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'school_id',
        'floors',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

}
