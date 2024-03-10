<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function itemAllocations()
    {
        return $this->hasMany(ItemAllocation::class, 'author_id');
    }

    // Relasi One-to-Many dengan model Item (Item milik user ini)
    public function items()
    {
        return $this->hasMany(Item::class, 'user_id');
    }

    // Relasi One-to-Many dengan model Allocation (Allocation milik user ini)
    public function allocations()
    {
        return $this->hasMany(Allocation::class, 'author_id');
    }
}
