<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder;

/**
 * App\Models\GamePlatforms
 *
 * @method static Model|Builder create($attributes = array())
 */
class GamePlatforms extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function platform(): HasOne
    {
        return $this->hasOne(Platform::class, 'id', 'platform_id');
    }
}
