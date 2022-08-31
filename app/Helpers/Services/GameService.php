<?php

namespace App\Helpers\Services;

use App\Games\RawgGame;
use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class GameService
{
    public function gameByRawgId(int $id): ?Game
    {
        return Game::firstWhere('rawg_id', $id);
    }

    /**
     * @return Game|Collection<Game>
     */
    /** @phpstan-ignore-next-line  */
    public function gameSortByRelease()
    {
        return Game::where('released', '>=', Carbon::now()->toDateString())
            ->with('images')
            ->get()
            ->sortBy('released');
    }

    public function generateMd5ForDbGame(Game $game): string
    {
        return md5(sprintf(
            '%s%s%s%s',
            $game->rawg_id,
            $game->name,
            $game->slug,
            $game->released,
        ));
    }
    public function generateMd5ForRawgGame(RawgGame $rawgGame): string
    {
        return md5(sprintf(
            '%s%s%s%s',
            $rawgGame->rawgId,
            $rawgGame->name,
            $rawgGame->slug,
            $rawgGame->released,
        ));
    }
}
