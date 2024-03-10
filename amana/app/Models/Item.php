<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Item extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'description',
        'purchase_date',
        'purchase_price',
        'amount',
        'author_id',
    ];

    protected $attributes = [
        'status' => '[]',
        'allocation_id' => '[]',
    ];

    protected $casts = [
        'purchase_date' => 'datetime',
        'purchase_price' => 'decimal:2',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi One-to-Many dengan model ItemAllocation (ItemAllocation yang terhubung dengan item ini)
    public function itemAllocations()
    {
        return $this->hasMany(ItemAllocation::class, 'item_id');
    }
}
