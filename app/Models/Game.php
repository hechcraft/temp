<?php

namespace App\Models;

use App\View\Presenter\GamePresenter;
use App\View\Presenter\PlatformListPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laracasts\Presenter\PresentableTrait;

class Game extends Model
{
    use HasFactory, PresentableTrait;

    protected $presenter = GamePresenter::class;

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
