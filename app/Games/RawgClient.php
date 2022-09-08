<?php

namespace App\Games;

use Illuminate\Support\Facades\Http;

class RawgClient
{
    /**
     * @param  string  $url
     * @param  array  $query
     * @return array<mixed>
     */
    /** @phpstan-ignore-next-line  */
    private function get(string $url, array $query = []): array
    {
        $query['key'] = config('services.rawg.key');

        return Http::get('https://api.rawg.io/api/games'.$url, $query)->json();
    }

    public function getRawgGameById(int $id): array
    {
        return $this->get('/'.$id);
    }

    public function getSearchGame(string $query): array
    {
        return $this->get('', [
            'search' => $query,
            'search_precise' => true,
            'search_exact' => true,
            'page_size' => 40,
        ]);
    }

    public function getRawgGames(string $dates): array
    {
        return $this->get('', [
            'dates' => str_replace(' ', '', $dates),
            'ordering' => '-added',
            'parent_platforms' => '1,2,3,7',
            'page_size' => 40,
            'stores' => '1,2,3,5,6,11',
        ]);
    }

    public function getRawgGameStores(int $rawgGameId): array
    {
        return $this->get("/$rawgGameId/stores");
    }

    public function getRawgGameScreenshots(int $rawgGameId): array
    {
        return $this->get("/$rawgGameId/screenshots");
    }

    public function getNextPaginatePageForSearch(int $numberPage, string $query): array
    {
        return $this->get('', [
            'search' => $query,
            'search_precise' => true,
            'search_exact' => true,
            'page_size' => 40,
            'page' => $numberPage,
        ]);
    }

    public function getNextPaginatePageForGames(int $numberPage, string $dates): array
    {
        return $this->get('', [
            'dates' => str_replace(' ', '', $dates),
            'ordering' => '-added',
            'parent_platforms' => '1,2,3,7',
            'page_size' => 40,
            'stores' => '1,2,3,5,6,11',
            'page' => $numberPage,
        ]);
    }
}
