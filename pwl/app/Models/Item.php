<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'quantity',
        'allocated',
        'author_id',
        
        
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function allocation()
    {
        return $this->hasManyThrough(Allocation::class, Location::class);
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'allocations', 'item_id', 'location_id')
            ->withPivot('quantity');
    }
}
