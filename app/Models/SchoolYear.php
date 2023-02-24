<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'school_id',
        'start_date',
        'end_date',

    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }


}
