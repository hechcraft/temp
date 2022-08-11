<?php

namespace App\Games;

use App\Games\Attributes\Genre;
use App\Games\Attributes\Platform;
use App\Games\Attributes\Store;
use Illuminate\Support\Collection;

class SaveAttributes
{
    private array $storedTypes = [
        Genre::class,
        Platform::class,
        Store::class,
    ];

    public function save(RawgGame $rawgGame,int $gameId): void
    {
        foreach ($this->storedTypes as $storedType) {
            $attributeClass = new $storedType;

            $key = $attributeClass->globalKey;

            foreach ($rawgGame->$key as $item) {
                $attributeClass->model::create([
                    'game_id' => $gameId,
                    $attributeClass->saveKey => data_get($item, $attributeClass->getKey)
                ]);
            }
        }
    }
}
