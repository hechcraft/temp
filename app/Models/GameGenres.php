<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder;

/**
 * App\Models\GameGenres
 *
 * @method static Model|Builder create($attributes = array())
 */
class GameGenres extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function genre(): HasOne
    {
        return $this->hasOne(Genres::class, 'id', 'genre_id');
    }
}
