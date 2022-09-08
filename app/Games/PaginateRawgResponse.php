<?php

namespace App\Games;

use App\Helpers\Services\RawgService;
use Illuminate\Support\Collection;

class PaginateRawgResponse
{
    public function __construct(
        private RawgClient $rawgClient,
        private RawgService $rawgService,
    ) {
    }

    /**
     * @param  int  $gamesCount
     * @param  string  $query
     * @return Collection<RawgGame>
     */
    public function paginateSearchPages(int $gamesCount, string $query): Collection
    {
        $rawgGames = new Collection();

        foreach (range(1, $this->getLastPageNumber($gamesCount)) as $pageNumber) {
            $response = $this->rawgClient->getNextPaginatePageForSearch($pageNumber, $query);

            $rawgGames->push($this->rawgService->sortRawgGamesByRating($response));
        }

        return $rawgGames->flatten();
    }

    /**
     * @param  int  $gamesCount
     * @param  string  $dates
     * @return Collection<RawgGame>
     */
    public function paginateRawgGames(int $gamesCount, string $dates): Collection
    {
        $rawgGames = new Collection();

        foreach (range(1, $this->getLastPageNumber($gamesCount)) as $pageNumber) {
            $response = $this->rawgClient->getNextPaginatePageForGames($pageNumber, $dates);

            $rawgGames->push($this->rawgService->sortRawgGamesByRating($response));
        }

        return $rawgGames->flatten();
    }

    private function getLastPageNumber(int $gamesCount): int
    {
        return intdiv($gamesCount, 40) + 1;
    }

    public function paginateExist(?string $next): bool
    {
        if (is_null($next)) {
            return false;
        }

        return true;
    }
}
