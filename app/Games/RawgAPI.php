<?php

namespace App\Games;

use App\Models\Game;
use App\Models\Images;
use Illuminate\Support\Facades\Http;
use Nette\Utils\Image;

class RawgAPI
{
    public function getAllGames(string $dates): array
    {
        $response = Http::get('https://api.rawg.io/api/games', [
            'dates' => str_replace(' ', '', $dates),
            'ordering' => '-added',
            'parent_platforms' => '1,2,3,7',
            'page_size' => 40,
            'stores' => '1,2,3,5,6,11',
            'key' => config('services.rawg.key'),
        ])->json();

        return $response;
    }

    public function getPopularGames(string $dates): array
    {
        $response = $this->getAllGames($dates);

        $games = array();

        if (is_null(data_get($response, 'next'))) {
            return $this->ratingSort($response);
        }

        while (!is_null(data_get($response, 'next'))) {

            $gameSort = $this->ratingSort($response);

            foreach ($gameSort as $game) {
                $games[] = $game;
            }

            $nextPage = data_get($response, 'next');
            if (is_null($nextPage)) {
                break;
            }

            $response = Http::get($nextPage)->json();
        };

        return $games;
    }

    public function gameSearch(string $query): array
    {
        return Http::get('https://api.rawg.io/api/games', [
            'key' => config('services.rawg.key'),
            'search' => $query,
        ])->json();
    }

    private function ratingSort(array $games): array
    {
        $gameSort = array();

        foreach (data_get($games, 'results') as $value) {
            if (data_get($value, 'added') > 10) {
                $gameSort[] = $value;
            }
        }

        return $gameSort;
    }
}


