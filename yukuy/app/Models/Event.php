<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_id',
        'location_id',
        
    ];

    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
