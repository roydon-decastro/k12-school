<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'school_id',
        'level_id',
        'building_id',
        'room_id',
        'capacity',
        'mode',
        'shift',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
