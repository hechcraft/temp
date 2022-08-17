<?php

namespace App\Games\Attributes;

use App\Games\RawgGame;
use App\Models\GamePlatforms;

class SavePlatforms
{
    public function store(RawgGame $rawgGame, int $gameId): void
    {
        foreach ($rawgGame->platforms as $platform){
            GamePlatforms::create([
                'game_id' => $gameId,
                'platform_id' => $platform->id,
            ]);
        }
    }
}
