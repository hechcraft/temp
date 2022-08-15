<?php

namespace App\Games;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

enum GameAttributes: string
{
    case Stores = 'stores';
    case Screenshots = 'screenshots';
}

class RawgAPI
{
    private array $dtoClasses = [
        'screenshots' => RawgGameScreenshot::class,
        'stores' => RawgStoreLink::class
    ];

    public function getPopularGames(string $dates): \Illuminate\Support\Collection
    {

        $response = $this->getAllGames($dates);

        return $this->nextPage($response, true);
    }

    public function gameSearch(string $query): \Illuminate\Support\Collection
    {
        $response = Http::get('https://api.rawg.io/api/games', [
            'key' => config('services.rawg.key'),
            'search' => $query,
            'search_precise' => true,
            'search_exact' => true,
        ])->json();

        return $this->nextPage($response, false);
    }

    public function gameSearchById(int $rawgGameId): RawgGame
    {
        $response = Http::get("https://api.rawg.io/api/games/$rawgGameId", [
            'key' => config('services.rawg.key'),
        ])->json();

        return RawgGame::fromResponse($response);
    }

    public function getGameAtrributes(int $rawgGameId, GameAttributes $gameAttributes): \Illuminate\Support\Collection
    {
        $response = Http::get("https://api.rawg.io/api/games/$rawgGameId/$gameAttributes->value", [
            'key' => config('services.rawg.key'),
        ])->json();

        $attribute = collect();
        foreach (data_get($response, 'results') as $item) {
            $attribute->push($this->dtoClasses[$gameAttributes->value]::fromRequest($item));
        }

        return $attribute;
    }

    private function nextPage($response, bool $sort): \Illuminate\Support\Collection
    {
        if (is_null(data_get($response, 'next'))) {
            return $this->ratingSort($response, true);
        }

        $games = collect();

        while (!is_null(data_get($response, 'next'))) {

            $gameSort = $this->ratingSort($response, $sort);
            foreach ($gameSort as $game) {
                $games->push($game);
            }

            $nextPage = data_get($response, 'next');
            if (is_null($nextPage)) {
                break;
            }

            $response = Http::get($nextPage)->json();
        };

        return $games;
    }

    private function getAllGames(string $dates): array
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

    private function ratingSort(array $games, bool $sort): \Illuminate\Support\Collection
    {
        $gameSort = collect();

        foreach (data_get($games, 'results') as $value) {
            if (data_get($value, 'added') > 10 && $sort) {
                $gameSort->push(RawgGame::fromResponse($value));
            } elseif (!$sort) {
                $gameSort->push(RawgGame::fromResponse($value));
            }
        }

        return $gameSort;
    }
}


