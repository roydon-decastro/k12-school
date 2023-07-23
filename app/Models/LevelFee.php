<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelFee extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id',
        'schoolyear_id',
        'level_id',
        'fee_id',
        'fee_amount'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function school_year()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }
}
