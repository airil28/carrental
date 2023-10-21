<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model
{
    protected $fillable = [
        'name', 'daily_rental_price', 'promotional_discount', 'description', 'bank_number', 'bank_name', 'address', 'type',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class, 'vehicle_id');
    }

    public function reservedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'reservation_user', 'vehicle_id', 'user_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'vehicle_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class, 'vehicle_id');
    }
}
