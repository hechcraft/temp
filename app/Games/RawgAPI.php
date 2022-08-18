<?php

namespace App\Games;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class RawgAPI
{
    public function __construct(private RawgResponse $rawgResponse)
    {
    }


    public function getPopularGames(string $dates): Collection
    {
        $response = $this->getAllGames($dates);

        return $this->nextPage($response);
    }

    public function gameSearch(string $query): Collection
    {
        $response = $this->rawgResponse->response('', [
            'search' => $query,
            'search_precise' => true,
            'search_exact' => true
        ]);

        return $this->nextPage($response);
    }

    public function gameSearchById(int $rawgGameId): RawgGame
    {
        return RawgGame::fromResponse($this->rawgResponse->response("/$rawgGameId"));
    }

    /**
     * @param int $rawgGameId
     * @return Collection<RawgStoreDTO>
     */
    public function getGameStore(int $rawgGameId): Collection
    {
        $response = $this->rawgResponse->response("/$rawgGameId/stores");
        /** @phpstan-ignore-next-line */
        $stores = collect();

        foreach (data_get($response, 'results') as $item) {
            $stores->push(RawgStoreDTO::fromRequest($item));
        }

        return $stores;
    }

    /**
     * @param int $rawgGameId
     * @return Collection<RawgGameScreenshot>
     */
    public function getGameScreenshots(int $rawgGameId): Collection
    {
        $response = $this->rawgResponse->response("/$rawgGameId/screenshots");

        /** @phpstan-ignore-next-line */
        $screenshots = collect();

        foreach (data_get($response, 'results') as $item) {
            $screenshots->push(RawgGameScreenshot::fromRequest($item));
        }

        return $screenshots;
    }

    /**
     * @param string $dates
     * @return array<mixed>
     */
    private function getAllGames(string $dates): array
    {
        $response = $this->rawgResponse->response('', [
            'dates' => str_replace(' ', '', $dates),
            'ordering' => '-added',
            'parent_platforms' => '1,2,3,7',
            'page_size' => 40,
            'stores' => '1,2,3,5,6,11',
        ]);

        return $response;
    }

    /**
     * @param array $response
     * @return Collection<RawgGame>
     */
    /** @phpstan-ignore-next-line */
    private function nextPage(array $response): Collection
    {
        if (is_null(data_get($response, 'next'))) {
            return $this->ratingSort($response);
        }
        /** @phpstan-ignore-next-line */
        $games = collect();

        while (!is_null(data_get($response, 'next'))) {
            $gameSort = $this->ratingSort($response);
            foreach ($gameSort as $game) {
                $games->push($game);
            }

            $nextPage = data_get($response, 'next');
            /** @phpstan-ignore-next-line */
            if (is_null($nextPage)) {
                break;
            }

            $response = Http::get($nextPage)->json();
        };

        return $games;
    }


    /**
     * @param array $games
     * @return Collection<RawgGame>
     */
    /** @phpstan-ignore-next-line */
    private function ratingSort(array $games): Collection
    {
        /** @phpstan-ignore-next-line */
        $gameSort = collect();

        foreach (data_get($games, 'results') as $value) {
            if (data_get($value, 'added') > 10) {
                $gameSort->push(RawgGame::fromResponse($value));
            }
        }

        return $gameSort;
    }
}
