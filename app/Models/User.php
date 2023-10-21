<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'owner_id');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'renter_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'renter_id');
    }
}
