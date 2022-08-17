<?php

namespace App\Games\Attributes;

use App\Games\RawgStoreDTO;
use App\Helpers\Services\GameService;
use App\Models\GameStores;
use Illuminate\Support\Collection;

class SaveStores
{
    public function __construct(private GameService $gameHelpers)
    {
    }

    /**
     * @param Collection<RawgStoreDTO> $storeLinks
     * @param int $gameId
     * @return void
     */
    public function store(Collection $storeLinks, int $gameId): void
    {
        foreach ($storeLinks as $store) {
            GameStores::create([
                'game_id' => $gameId,
                'store_id' => $store->storeId,
                'store_link' => $store->url,
            ]);
        }
    }


    /**
     * @param Collection<RawgStoreDTO> $stores
     * @return void
     */
    public function update(Collection $stores): void
    {
        $game = $this->gameHelpers->gameByRawgId($stores[0]->gameId);
        foreach ($stores as $store) {
            $gameStore = GameStores::where('game_id', $game->id)
                ->where('store_id', $store->storeId)
                ->first();
            $gameStore->store_id = $store->storeId;
            $gameStore->store_link = $store->url;
            $gameStore->save();
        }
    }
}
