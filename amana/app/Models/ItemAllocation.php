<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAllocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'amount',
        'allocation_id',
        'author_id',
        
    ];

     // Relasi dengan model Item
     public function item()
     {
         return $this->belongsTo(Item::class, 'item_id');
     }
 
     // Relasi dengan model Allocation
     public function allocation()
     {
         return $this->belongsTo(Allocation::class, 'allocation_id');
     }
 
     // Relasi dengan model User (penulis atau author)
     public function author()
     {
         return $this->belongsTo(User::class, 'author_id');
     }
}
