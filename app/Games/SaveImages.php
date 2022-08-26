<?php

namespace App\Games;

use App\Models\Images;
use Illuminate\Support\Collection;

class SaveImages
{
    /**
     * @param  Collection<RawgGameScreenshot>  $screenshots
     * @param  int  $gameId
     * @return void
     */
    public function saveScreenshots(Collection $screenshots, int $gameId): void
    {
        foreach ($screenshots as $screenshot) {
            Images::create([
                'game_id' => $gameId,
                'url' => $screenshot->screenshot,
                'type' => $screenshot->type,
            ]);
        }
    }
}
