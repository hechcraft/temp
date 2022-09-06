<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 *  App\Models\GameStore
 *
 * @property string $store_link
 * @property int $store_id
 *
 * @method static GameStores create($value)
 * @method static GameStores where($column, $value)
 * @method static GameStores first()
 * @method static GameStores save()
 * @method static GameStores updateOrCreate($value)
 */
class GameStores extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function store(): HasOne
    {
        return $this->hasOne(Store::class, 'id', 'store_id');
    }
}
