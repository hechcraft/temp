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

    /**
     * @param int $rawgId
     * @return Collection<Game>
     */
    public function getGameStoreLink(int $rawgId): Collection
    {
        /** @phpstan-ignore-next-line  */
        $links = collect();
        /** @phpstan-ignore-next-line  */
        foreach ($this->gameByRawgId($rawgId)->stores as $store) {
            $links->push($store->store_link);
        }

        return $links;
    }

    public function dbGameMd5(Game $game): string
    {
        return md5(sprintf(
            '%s%s%s%s',
            $game->rawg_id,
            $game->name,
            $game->slug,
            $game->released,
        ));
    }

    public function rawgGameMd5(RawgGame $rawgGame): string
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
