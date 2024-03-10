<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Relasi One-to-Many dengan model ItemAllocation (ItemAllocation yang terhubung dengan alokasi ini)
    public function itemAllocations()
    {
        return $this->hasMany(ItemAllocation::class, 'allocation_id');
    }
}
