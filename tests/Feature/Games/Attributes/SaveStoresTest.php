<?php

namespace Games\Attributes;

use App\Games\Attributes\SaveStores;
use App\Games\RawgStoreDTO;
use Tests\Feature\FeatureTestCase;

class SaveStoresTest extends FeatureTestCase
{
    public function test_save_game_store()
    {
        $saveStores = app(SaveStores::class);

        $stores = collect([
            new RawgStoreDTO(1, 5, 619867, 'https://store.steampowered.com/app/1283400/Steelrising/'),
            new RawgStoreDTO(3, 3, 619867, 'https://www.gog.com/en/game/steelrising'),
        ]);

        $saveStores->store($stores, 5);

        $this->assertDatabaseHas('game_stores', [
            'game_id' => 5,
            'store_id' => 5 ,
        ]);

        $this->assertDatabaseHas('game_stores', [
            'game_id' => 5,
            'store_id' => 3 ,
        ]);
    }

    public function test_update_store_link()
    {
        $saveStores = app(SaveStores::class);

        $stores = collect([
            new RawgStoreDTO(7, 1, 619867, 'https://store.steampowered.com/app/1602080/Soulstice/test'),
            new RawgStoreDTO(7, 5, 619867, 'https://store.steampowered.com/app/1602080/Soulstice/test'),
        ]);

        $saveStores->updateStore($stores, 5);

        $this->assertDatabaseHas('game_stores', [
            'game_id' => 5,
            'store_link' => 'https://store.steampowered.com/app/1602080/Soulstice/test',
        ]);

        $this->assertDatabaseHas('game_stores', [
            'game_id' => 5,
            'store_id' => 5,
        ]);
    }
}
