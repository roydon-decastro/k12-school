<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'level_id',
        'active',
        'assigned',
        'join_date',
        'guardian1',
        'guardian1_relationship',
        'guardian2',
        'guardian2_relationship',
        'email1',
        'email2',
        'contact1',
        'contact2',
        'lrn',
    ];

    protected $casts = [
        'active' => 'boolean',
        'assigned' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // public function sectionstudent()
    // {
    //     return $this->belongsTo(SectionStudent::class);
    // }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function sectionstudent()
    {
        return $this->belongsTo(SectionStudent::class);
    }

}
