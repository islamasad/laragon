<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstGuest_id',
        'secondGuest_id',
        'room_id',
        'paid_date',
        'amount',
        'description',        
    ];

    public function firstGuest()
    {
        return $this->belongsTo(Guest::class, 'firstGuest_id');
    }

    public function secondGuest()
    {
        return $this->belongsTo(Guest::class, 'secondGuest_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
