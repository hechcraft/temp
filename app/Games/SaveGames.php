<?php

namespace App\Games;

use App\Models\Game;
use App\Models\Images;

class SaveGames
{
    public function storeGames(array $response): void
    {
        $rawg = new RawgAPI();

        $game = Game::create([
            'slug' => data_get($response, 'slug'),
            'name' => data_get($response, 'name'),
            'released' => data_get($response, 'released'),
            'rawg_id' => data_get($response, 'id'),
        ]);

        $shortScreenshots = data_get($response, 'short_screenshots');
        $backgoundImage = data_get($response, 'background_image');

        if (isset($shortScreenshots)) {
            $game->image_id = $this->getScreenshots($shortScreenshots, $backgoundImage);
        } else {
            $game->image_id = $this->getScreenshots($rawg->gameScreenshots(data_get($response, 'id')), $backgoundImage);
        }

        $game->save();

        $saveAttributes = new SaveAttributes();
        $saveAttributes->save($response, $game->id);

        $this->saveStoreLinks($game->rawg_id);
    }

    private function getScreenshots(array $screenshots, string $backgroundImage): int
    {
        $screenshotStr = '';
        foreach ($screenshots as $screenshot) {
            $screenshotStr .= data_get($screenshot, 'image') . ',';
        }

        $image = Images::create([
            'background_image' => $backgroundImage,
            'screenshots' => $screenshotStr,
        ]);

        return $image->id;
    }

    private function saveStoreLinks(int $rawgId): void
    {
        $rawgApi = new RawgAPI();

        $storeLinks = $rawgApi->gameStoreLink($rawgId);
        $gameStores = Game::firstWhere('rawg_id', $rawgId);

        foreach ($storeLinks as $storeLink) {
            foreach ($gameStores->stores as $gameStore) {
                if ($gameStore->store_id === data_get($storeLink, 'store_id')) {
                    $gameStore->store_link = data_get($storeLink, 'url');
                    $gameStore->save();
                }
            }
        }
    }

}
