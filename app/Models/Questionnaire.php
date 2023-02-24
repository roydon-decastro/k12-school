<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'subject_id',
        'question',
        'correct',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'answer5',
        'figure',
        'difficulty',
    ];
}
