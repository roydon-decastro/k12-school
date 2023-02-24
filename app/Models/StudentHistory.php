<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'user_id',
        'activity',
        'notes',
    ];
}
