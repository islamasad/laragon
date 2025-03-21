<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'status',
        
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
