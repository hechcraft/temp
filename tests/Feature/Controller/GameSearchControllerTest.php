<?php

namespace Controller;

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
use App\Helpers\Services\SearchService;
use App\Models\User;
use Illuminate\Support\Collection;
use Tests\Feature\FeatureTestCase;

class GameSearchControllerTest extends FeatureTestCase
{
    public function test_search()
    {
        app()->bind(SearchService::class, function () {
            $apiMock = $this->mock(RawgAPI::class);
            $apiMock->expects('gameSearch')
                ->once()
                ->with('Harry Potter')
                ->andReturn(collect([
                    new RawgGame(
                        'harry-potter',
                        'Harry Potter Forever',
                        '2022-01-01',
                        1,
                        'https://img.com/',
                        new Collection(),
                        new Collection()
                    )
                ]));

            return new SearchService(
                $apiMock
            );
        });

        $response = $this->get('/game-search?search=Harry+Potter');

        $response->assertSee('Harry Potter Forever');
    }

    public function test_store_for_new_game()
    {
        app()->bind(SaveGames::class, function () {
            $apiMock = $this->mock(RawgAPI::class);
            $apiMock->shouldReceive('getGameScreenshots')->andReturn(collect([
                new RawgGameScreenshot(
                    'https://media.rawg.io/media/screenshots/dde/dde292d2a00622f1dfe1252d25686e50.jpg',
                    'screenshot'
                )
            ]));
            $apiMock->shouldReceive('getGameStore')->andReturn(collect([
                new RawgStoreDTO(
                    '464352',
                    '3',
                    '248399',
                    'https://store.playstation.com/en-us/product/UP8062-CUSA20499_00-CUPHEAD000000000'
                )
            ]));
            $apiMock->expects('gameSearchById')
                ->once()
                ->with(248399)
                ->andReturn(new RawgGame(
                    'hogwarts-legacy',
                    'Hogwarts Legacy',
                    '2023-03-03',
                    248399,
                    'https://img.com/',
                    new Collection(),
                    new Collection(),
                ));

            return new SaveGames(
                app(GameService::class),
                app(SaveGenres::class),
                app(SavePlatforms::class),
                app(SaveStores::class),
                app(SaveImages::class),
                $apiMock,
            );
        });

        $user = User::first();

        $response = $this->actingAs($user)->post(route('game.search.save'), ['rawgGameId' => 248399]);

        $this->assertDatabaseHas('games', [
            'name' => 'Hogwarts Legacy',
            'slug' => 'hogwarts-legacy',
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

    public function test_store_for_exist_game_in_database()
    {
        $user = User::first();

        $response = $this->actingAs($user)->post(route('game.search.save'), ['rawgGameId' => 462688]);

        $this->assertDatabaseHas('user_trackings', [
            'user_id' => $user->id,
            'game_id' => 1
        ]);
    }

    public function test_empty_search_string()
    {
        $response = $this->get('/game-search', [
            'search' => ''
        ]);

        $response->assertRedirect(route('main'));
    }

    public function test_stop_track_games()
    {
        $user = User::first();

        $response = $this->actingAs($user)->delete(route('game.search.delete'), [
            'id' => $user->id,
            'gameId' => 1,
        ]);

        $this->assertDatabaseMissing('user_trackings', [
            'user_id' => $user->id,
            'game_id' => 1,
        ]);

        $response->assertRedirect(route('main'));
    }

}
