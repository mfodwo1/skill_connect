<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'user_id', 'bio', 'skills', 'portfolio_url', 'location', 'rating', 'rating_count','verified', 'availability', 'latitude', 'longitude',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'provider_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'provider_id');
    }

    public function getTotalRatingsCountAttribute(): int
    {
        return $this->reviews()->count();
    }

}
