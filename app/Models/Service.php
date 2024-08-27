<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider_id', 'title', 'description', 'category', 'price'
    ];

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'provider_id');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'service_category', 'service_id', 'category_id');
    }

}
