<?php

namespace Games;

use App\Games\Attributes\SaveGenres;
use App\Games\Attributes\SavePlatforms;
use App\Games\Attributes\SaveStores;
use App\Games\RawgAPI;
use App\Games\RawgGame;
use App\Games\RawgGameScreenshot;
use App\Games\RawgStoreDTO;
use App\Games\SaveGames;
use App\Games\SaveImages;
use App\Helpers\Services\GameService;
use App\Models\Game;
use Illuminate\Support\Collection;
use Tests\Feature\FeatureTestCase;

class SaveGamesTest extends FeatureTestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_games()
    {
        $saveGames = app(SaveGames::class);

        $saveGames->storeGames(
            new RawgGame(
                'hogwarts-legacy',
                'Hogwarts Legacy',
                '2023-03-03',
                248399,
                'https://img.com/',
                new Collection(),
                new Collection(),
            ),
            collect([
                new RawgGameScreenshot(
                    'https://media.rawg.io/media/screenshots/dde/dde292d2a00622f1dfe1252d25686e50.jpg',
                    'screenshot'
                )
            ]),
            collect([
                new RawgStoreDTO(
                    '464352',
                    '3',
                    '248399',
                    'https://store.playstation.com/en-us/product/UP8062-CUSA20499_00-CUPHEAD000000000'
                )
            ])
        );

        $this->assertDatabaseHas('games', [
            'slug' => 'hogwarts-legacy',
            'name' => 'Hogwarts Legacy',
            'released' => '2023-03-03',
            'rawg_id' => 248399,
        ]);

        $this->assertDatabaseHas('images', [
            'url' => 'https://media.rawg.io/media/screenshots/dde/dde292d2a00622f1dfe1252d25686e50.jpg',
            'type' => 'screenshot',
        ]);

        $this->assertDatabaseHas('game_stores', [
            'store_link' => 'https://store.playstation.com/en-us/product/UP8062-CUSA20499_00-CUPHEAD000000000',
            'store_id' => 3,
        ]);
    }

    public function test_update_games()
    {
        app()->bind(SaveGames::class, function () {
            $gameService = $this->mock(GameService::class);
            $gameService->expects('gameByRawgId')
                ->once()
                ->with(462688)
                ->andReturn(
                    Game::first()
                );

            return new SaveGames(
                $gameService,
                app(SaveGenres::class),
                app(SavePlatforms::class),
                app(SaveStores::class),
                app(SaveImages::class),
                app(RawgAPI::class),
            );
        });

        $saveGames = app(SaveGames::class);

        $saveGames->updateGames(
            new RawgGame(
                "steelrising2",
                "Steelrising 2",
                '2025-03-03',
                462688,
                'https://img.com/',
                new Collection(),
                new Collection(),
            ),
        );

        $this->assertDatabaseHas('games', [
            'slug' => "steelrising2",
            'name' => "Steelrising 2",
            'released' => '2025-03-03',
            'rawg_id' => 462688,
        ]);
    }

    public function test_update_if_games_not_exist()
    {
        app()->bind(SaveGames::class, function () {
            $gameService = $this->mock(GameService::class);
            $gameService->expects('gameByRawgId')
                ->once()
                ->with(462688)
                ->andReturn(
                    null
                );

            return new SaveGames(
                $gameService,
                app(SaveGenres::class),
                app(SavePlatforms::class),
                app(SaveStores::class),
                app(SaveImages::class),
                app(RawgAPI::class),
            );
        });

        $saveGames = app(SaveGames::class);

        $update = $saveGames->updateGames(
            new RawgGame(
                "steelrising2",
                "Steelrising 2",
                '2025-03-03',
                462688,
                'https://img.com/',
                new Collection(),
                new Collection(),
            ),
        );


        $this->assertEquals(null, $update);
    }
}
