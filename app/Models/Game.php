<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function images(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Images::class, 'id', 'image_id');
    }

    public function genres(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(GameGenres::class);
    }

    public function platforms(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(GamePlatforms::class);
    }

    public function stores(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(GameStores::class);
    }
}
