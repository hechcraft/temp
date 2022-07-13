<?php

namespace App\Games;

use App\Models\Game;
use App\Models\Images;

class SaveGames
{
    public function storeGames(array $response): void
    {
        $game = Game::create([
            'slug' => data_get($response, 'slug'),
            'name' => data_get($response, 'name'),
            'released' => data_get($response, 'released'),
            'rawg_id' => data_get($response, 'id'),
            'image_id' => $this->getScreenshots($response),
        ]);

        $saveAttributes = new SaveAttributes();
        $saveAttributes->save($response, $game->id);
    }

    private function getScreenshots(array $response): int
    {
        $screenshots = '';
        foreach (data_get($response, 'short_screenshots') as $item) {
            $screenshots .= data_get($item, 'image') . ',';
        }

        $image = Images::create([
            'background_image' => data_get($response, 'background_image'),
            'screenshots' => $screenshots,
        ]);

        return $image->id;
    }
}
