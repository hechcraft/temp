<?php

namespace App\Games\Attributes;

use App\Games\RawgStoreDTO;
use App\Helpers\Services\GameService;
use App\Models\GameStores;
use Illuminate\Support\Collection;

class SaveStores
{
    /**
     * @param  Collection<RawgStoreDTO>  $storeLinks
     * @param  int  $gameId
     * @return void
     */
    public function store(Collection $storeLinks, int $gameId): void
    {
        $storeLinks->each(fn (RawgStoreDTO $storeDTO) => GameStores::create([
            'game_id' => $gameId,
            'store_id' => $storeDTO->storeId,
            'store_link' => $storeDTO->url,
        ]));
    }

    /**
     * @param  Collection<RawgStoreDTO>  $stores
     * @param  int  $gameId
     * @return void
     */
    public function updateStore(Collection $stores, int $gameId): void
    {
        $stores->each(
            fn (RawgStoreDTO $storeDTO) =>
        GameStores::where('game_id', $gameId)
            ->where('store_id', $storeDTO->storeId)
            ->updateOrCreate([
                'game_id' => $gameId,
                'store_id' => $storeDTO->storeId,
                'store_link' => $storeDTO->url,
            ])
        );
    }
}
