<?php

namespace App\Games;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class RawgAPI
{
    public function __construct(private RawgResponse $rawgResponse)
    {
    }

    private array $dtoClasses = [
        'screenshots' => RawgGameScreenshot::class,
        'stores' => RawgStoreLink::class
    ];

    public function getPopularGames(string $dates): Collection
    {

        $response = $this->getAllGames($dates);

        return $this->nextPage($response, true);
    }

    public function gameSearch(string $query): Collection
    {
        $response = $this->rawgResponse->response('', [
                'search' => $query,
                'search_precise' => true,
                'search_exact' => true
            ]);

        return $this->nextPage($response, false);
    }

    public function gameSearchById(int $rawgGameId): RawgGame
    {
        return RawgGame::fromResponse($this->rawgResponse->response("/$rawgGameId"));
    }

    public function getGameAtrributes(int $rawgGameId, GameAttributes $gameAttributes): Collection
    {
        $response = $this->rawgResponse->response("/$rawgGameId/$gameAttributes->value");

        $attribute = collect();
        foreach (data_get($response, 'results') as $item) {
            $attribute->push($this->dtoClasses[$gameAttributes->value]::fromRequest($item));
        }

        return $attribute;
    }

    private function getAllGames(string $dates): array
    {
        $response = $this->rawgResponse->response('',[
            'dates' => str_replace(' ', '', $dates),
            'ordering' => '-added',
            'parent_platforms' => '1,2,3,7',
            'page_size' => 40,
            'stores' => '1,2,3,5,6,11',
        ]);

        return $response;
    }

    private function nextPage($response, bool $sort): Collection
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


    private function ratingSort(array $games, bool $sort): Collection
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


