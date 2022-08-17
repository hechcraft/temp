<?php

namespace App\Games;

use App\Models\Images;
use Illuminate\Support\Collection;

class SaveImages
{
    /**
     * @param Collection<RawgGameScreenshot> $screenshots
     * @param string $backgroundImage
     * @param int $gameId
     * @return void
     */
    public function saveScreenshots(Collection $screenshots, string $backgroundImage, int $gameId): void
    {
        foreach ($screenshots as $screenshot) {
            Images::create([
                'game_id' => $gameId,
                'url' => $screenshot->screenshot,
                'type' => 'screenshot',
            ]);
        }

        Images::create([
            'game_id' => $gameId,
            'url' => $backgroundImage,
            'type' => 'cover',
        ]);
    }
}
