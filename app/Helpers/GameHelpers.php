<?php

namespace App\Helpers;

use App\Models\Game;
use Carbon\Carbon;

class GameHelpers
{
    public function gameByRawgId(int $id)
    {
        return Game::firstWhere('rawg_id', $id);
    }

    public function gameSortByRelease()
    {
        return Game::where('released', '>=', Carbon::now()->toDateString())
            ->get()
            ->sortBy('released');
    }
}
