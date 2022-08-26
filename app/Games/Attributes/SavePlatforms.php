<?php

namespace App\Games\Attributes;

use App\Games\RawgPlatformDTO;
use App\Models\GamePlatforms;
use Illuminate\Support\Collection;

class SavePlatforms
{
    /**
     * @param Collection<RawgPlatformDTO> $platforms
     * @param int $gameId
     * @return void
     */
    public function store(Collection $platforms, int $gameId): void
    {
        $platforms->each(fn (RawgPlatformDTO $platformDTO) => GamePlatforms::create([
          'game_id' => $gameId,
          'platform_id' => $platformDTO->id,
        ]));
    }
}
