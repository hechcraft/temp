<?php

namespace App\Games;

use App\Models\Game;
use App\Models\Images;

class SaveGames
{
    public function __construct(
        private SaveAttributes $saveAttributes
    )
    {
    }

    public function storeGames(RawgGame $rawgGame, \Illuminate\Support\Collection $gameScreenshots,
                               \Illuminate\Support\Collection $storeLinks): void
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
