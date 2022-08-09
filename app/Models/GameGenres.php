<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameGenres extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function genre(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Genres::class, 'id', 'genre_id');
    }
}
