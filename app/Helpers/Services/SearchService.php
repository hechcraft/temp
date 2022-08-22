<?php

namespace App\Helpers\Services;

use App\Games\RawgAPI;
use App\Games\RawgGame;
use Illuminate\Support\Collection;

class SearchService
{
    public function __construct(
        private RawgAPI $rawgAPI,
    ) {
    }

    /**
     * @param  string  $searchQuery
     * @return Collection<RawgGame>
     */
    public function gameSearch(string $searchQuery): Collection
    {
        return $this->rawgAPI->gameSearch($searchQuery);
    }
}
