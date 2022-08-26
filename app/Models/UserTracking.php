<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

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
        return $this->hasOne(Game::class, 'id', 'game_id')->orderBy('released');
//            ->leftJoin('user_trackings', 'user_trackings.game_id', '=', 'games.id')
//            ->orderByDesc('games.released');
    }

    public function gamesByRelease()
    {
        \DB::table('games')
            ->leftJoin('user_trackings', 'games.id', '=', 'user_trackings.game_id')
            ->select('games.*', 'user_trackings.*')
            ->where('user_trackings.user_id', '=', Auth::user()->id)
            ->orderByDesc('games.released')
            ->get();
    }
}
