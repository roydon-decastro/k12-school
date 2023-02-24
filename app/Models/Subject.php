<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'school_id',
        'is_standard',
    ];

    protected $casts = [
        'is_standard' => 'boolean',
    ];

}
