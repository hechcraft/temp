<?php

namespace Service;

use App\Games\RawgStoreDTO;
use App\Helpers\Services\StoreService;
use App\Models\Game;
use Tests\Feature\FeatureTestCase;
use Tests\TestCase;

class StoreServiceTest extends FeatureTestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_correct_generate_md5()
    {
        $storeService = app(StoreService::class);

        $rawgStores = collect([
            new RawgStoreDTO(1, 1, 1, "https://store.steampowered.com/app/1283400/Steelrising/"),
            new RawgStoreDTO(1, 1, 1, "https://www.gog.com/en/game/steelrising"),
        ]);

        $dBStoresMd5 = $storeService->generateMd5ForDbStores(Game::first()->stores);
        $rawgStoresMd5 = $storeService->generateMd5ForRawgStores($rawgStores);

        $this->assertEquals($dBStoresMd5,$rawgStoresMd5);
    }
}
