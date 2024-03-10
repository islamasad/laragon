<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'author_id',
        
        
        
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function allocation()
    {
        return $this->hasManyThrough(Allocation::class, Item::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'allocations', 'location_id', 'item_id')
            ->withPivot('quantity');
    }
}
