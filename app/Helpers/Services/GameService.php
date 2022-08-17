<?php

namespace App\Helpers\Services;

use App\Games\RawgGame;
use App\Models\Game;
use Carbon\Carbon;

class GameService
{
    public function gameByRawgId(int $id): ?Game
    {
        return Game::firstWhere('rawg_id', $id);
    }

    public function gameSortByRelease()
    {
        return Game::where('released', '>=', Carbon::now()->toDateString())
            ->get()
            ->sortBy('released');
    }

    public function getGameStoreLink(int $rawgId): \Illuminate\Support\Collection
    {
        $links = collect();
        foreach ($this->gameByRawgId($rawgId)->stores as $store) {
            $links->push($store->store_link);
        }

        return $links;
    }

    public function dbGameMd5(Game $game): string
    {
        return md5(sprintf('%s%s%s%s',
            $game->rawg_id,
            $game->name,
            $game->slug,
            $game->released,
        ));
    }

    public function rawgGameMd5(RawgGame $rawgGame): string
    {
        return md5(sprintf('%s%s%s%s',
            $rawgGame->rawgId,
            $rawgGame->name,
            $rawgGame->slug,
            $rawgGame->released,
        ));
    }


}
