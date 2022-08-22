<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static UserTracking firstOrCreate($value)
 * @method static UserTracking where($column, $value)
 * @method static UserTracking first()
 */
class UserTracking extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function game(): HasOne
    {
        return $this->hasOne(Game::class, 'id', 'game_id');
    }
}
