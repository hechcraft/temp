<?php

namespace App\Games;

use App\Helpers\Services\RawgService;
use Illuminate\Support\Collection;

class RawgAPI
{
    public function __construct(
        private RawgClient $rawgClient,
        private PaginateRawgResponse $paginateRawgResponse,
        private RawgService $rawgService
    ) {
    }

    /**
     * @param  string  $dates
     * @return Collection<RawgGame>
     */
    public function getPopularGames(string $dates): Collection
    {
        $response = $this->rawgClient->getRawgGames($dates);

        if ($this->paginateRawgResponse->paginateExist(data_get($response, 'next'))) {
            return $this->paginateRawgResponse->paginateRawgGames(data_get($response, 'count'), $dates);
        }

        return $this->rawgService->sortRawgGamesByRating($response);
    }

    /**
     * @param  string  $query
     * @return Collection<RawgGame>
     */
    public function gameSearch(string $query): Collection
    {
        $response = $this->rawgClient->getSearchGame($query);

        if ($this->paginateRawgResponse->paginateExist(data_get($response, 'next'))) {
            return $this->paginateRawgResponse->paginateSearchPages(data_get($response, 'count'), $query);
        }

        return $this->rawgService->sortRawgGamesByRating($response);
    }

    public function gameSearchById(int $rawgGameId): RawgGame
    {
        return RawgGame::fromResponse($this->rawgClient->getRawgGameById($rawgGameId));
    }

    /**
     * @param  int  $rawgGameId
     * @return Collection<RawgStoreDTO>
     */
    public function getGameStore(int $rawgGameId): Collection
    {
        $response = $this->rawgClient->getRawgGameStores($rawgGameId);
        /** @phpstan-ignore-next-line */
        $stores = collect();

        foreach (data_get($response, 'results') as $item) {
            $stores->push(RawgStoreDTO::fromRequest($item));
        }

        return $stores;
    }

    /**
     * @param  int  $rawgGameId
     * @return Collection<RawgGameScreenshot>
     */
    public function getGameScreenshots(int $rawgGameId, string $backgroundImage): Collection
    {
        $response = $this->rawgClient->getRawgGameScreenshots($rawgGameId);

        /** @phpstan-ignore-next-line */
        $screenshots = collect();
        foreach (data_get($response, 'results') as $item) {
            $screenshots->push(RawgGameScreenshot::fromRequest(data_get($item, 'image'), 'screenshot'));
        }
        $screenshots->push(RawgGameScreenshot::fromRequest($backgroundImage, 'cover'));

        return $screenshots;
    }
}
