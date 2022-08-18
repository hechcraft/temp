<?php

namespace App\Models;

use App\View\Presenter\GamePresenter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laracasts\Presenter\PresentableTrait;

/**
 * @property int $id,
 * @property int $rawg_id
 * @property string $name
 * @property string $slug
 * @property string $released
 * @property-read Collection|GameStores[] $stores
 *
 * @method static Game firstWhere($column, $value)
 * @method static Game where($column, $parameter, $value)
 * @method static Game get()
 * @method static Game sortBy($parameter)
 * @method static Game create($value)
 */

class Game extends Model
{
    use HasFactory;
    use PresentableTrait;

    protected string $presenter = GamePresenter::class;

    protected $guarded = [];

    public function images(): HasMany
    {
        return $this->hasMany(Images::class);
    }

    public function genres(): HasMany
    {
        return $this->hasMany(GameGenres::class);
    }

    public function platforms(): HasMany
    {
        return $this->hasMany(GamePlatforms::class);
    }

    public function stores(): HasMany
    {
        return $this->hasMany(GameStores::class);
    }
}
