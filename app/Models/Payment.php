<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'student_id',
        'amount',
        'serial',
        'payment_date',
        'mode',
        'note',
    ];
}
