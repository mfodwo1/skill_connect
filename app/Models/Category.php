<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','cover_image','description'];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class,'service_id');
    }
}
