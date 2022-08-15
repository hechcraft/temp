<?php

namespace App\Games;

use App\Helpers\GameHelpers;
use App\Models\Game;
use App\Models\Images;

class SaveGames
{
    public function __construct(
        private SaveAttributes $saveAttributes,
        private GameHelpers    $gameHelpers,
    )
    {
    }


    /**
     * @param RawgGame $rawgGame
     * @param RawgGameScreenshot $gameScreenshots
     * @param RawgStoreLink $storeLinks
     * @return void
     */
    public function storeGames(RawgGame                       $rawgGame, \Illuminate\Support\Collection $gameScreenshots,
                               \Illuminate\Support\Collection $storeLinks): Game
    {
        $game = Game::create([
            'slug' => $rawgGame->slug,
            'name' => $rawgGame->name,
            'released' => $rawgGame->released,
            'rawg_id' => $rawgGame->rawgId,
        ]);

        $game->image_id = $this->saveScreenshots($gameScreenshots, $rawgGame->backgroundImage);

        $game->save();

        $this->saveAttributes->save($rawgGame, $game->id);

        $this->saveStoreLinks($game, $storeLinks);

        return $game;
    }

    public function updateGames(RawgGame $rawgGame): Game
    {
        $game = $this->gameHelpers->gameByRawgId($rawgGame->rawgId);

        $game->slug = $rawgGame->slug;
        $game->name = $rawgGame->name;
        $game->released = $rawgGame->released;
        $game->rawg_id = $rawgGame->rawgId;
        $game->save();

        return $game;
    }

    public function updateStoresLink(\Illuminate\Support\Collection $stores)
    {
        $game = $this->gameHelpers->gameByRawgId($stores[0]->gameId);

        foreach ($stores as $store) {
            foreach ($game->stores as $gameStore) {
                if ($gameStore->store_id === $store->storeId) {
                    $gameStore->store_link = $store->url;
                    $gameStore->save();
                }
            }
        }
    }

    private function saveScreenshots(\Illuminate\Support\Collection $screenshots, string $backgroundImage): int
    {
        $screenshotStr = '';
        foreach ($screenshots as $screenshot) {
            $screenshotStr .= $screenshot->screenshot . ',';
        }

        $image = Images::create([
            'background_image' => $backgroundImage,
            'screenshots' => $screenshotStr,
        ]);

        return $image->id;
    }

    private function saveStoreLinks(Game $game, \Illuminate\Support\Collection $storeLinks): void
    {
        foreach ($storeLinks as $storeLink) {
            foreach ($game->stores as $gameStore) {
                if ($gameStore->store_id === $storeLink->storeId) {
                    $gameStore->store_link = $storeLink->url;
                    $gameStore->save();
                }
            }
        }
    }

}
