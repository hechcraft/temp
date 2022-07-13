<?php

namespace App\Games;

use App\Games\Attributes\Genre;
use App\Games\Attributes\Platform;
use App\Games\Attributes\Store;

class SaveAttributes
{
    private array $storedTypes = [
        Genre::class,
        Platform::class,
        Store::class,
    ];

    public function save(array $response,int $gameId): void
    {
        foreach ($this->storedTypes as $storedType) {
            $attributeClass = new $storedType;
            foreach (data_get($response, $attributeClass->globalKey) as $item) {
                $attributeClass->model::create([
                    'game_id' => $gameId,
                    $attributeClass->saveKey => data_get($item, $attributeClass->getKey)
                ]);
            }
        }
    }
}
