<?php

namespace App\Helpers;

use App\Games\RawgGame;
use App\Models\Game;
use Carbon\Carbon;

class GameHelpers
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

    public function storeMd5(\Illuminate\Support\Collection $stores): string
    {
        $md5 = '';
        foreach ($stores as $store) {
            $md5 .= $store->url ?? $store->store_link;
        }

        return md5($md5);
    }
}
