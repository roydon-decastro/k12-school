<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'school_graduated',
        'user_id',
        'join_date',
        'leave_date',
    ];
}
