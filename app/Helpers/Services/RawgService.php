<?php

namespace App\Helpers\Services;

use App\Games\RawgGame;
use Illuminate\Support\Collection;

class RawgService
{
    /**
     * @param  array  $response
     * @return Collection<RawgGame>
     */
    public function sortRawgGamesByRating(array $response): Collection
    {
        $rawgGames = new Collection();

        foreach (data_get($response, 'results') as $value) {
            if (data_get($value, 'added') > 10) {
                $rawgGames->push(RawgGame::fromResponse($value));
            }
        }

        return $rawgGames;
    }
}
