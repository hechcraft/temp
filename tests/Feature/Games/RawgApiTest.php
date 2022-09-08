<?php

namespace Games;

use App\Games\PaginateRawgResponse;
use App\Games\RawgAPI;
use App\Games\RawgClient;
use App\Helpers\Services\RawgService;
use Tests\Feature\FeatureTestCase;

class RawgApiTest extends FeatureTestCase
{
    public function test_get_metacritic_data()
    {
        app()->bind(RawgAPI::class, function () {
            $rawgClient = $this->mock(RawgClient::class);
            $rawgClient->expects('getRawgGameById')
                ->once()
                ->with(123)
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/ApiResponse/Cuphead.txt', 'r')
                    ), true)
                );

            return new RawgAPI(
                $rawgClient,
                app(PaginateRawgResponse::class),
                app(RawgService::class),
            );
        });

        $rawgApi = app(RawgAPI::class);

        $metacritic = $rawgApi->getMetacriticData(123);

        $this->assertEquals(null, $metacritic->rating);
        $this->assertEquals("https://www.metacritic.com/game/pc/cuphead", $metacritic->url);
    }

    public function test_get_popular_games()
    {
        app()->bind(RawgAPI::class, function () {
            $rawgClient = $this->mock(RawgClient::class);
            $rawgClient->shouldReceive('getNextPaginatePageForGames')
                ->once()
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/ApiResponse/PopularGames.txt', 'r')
                    ), true)
                );
            $rawgClient->expects('getRawgGames')
                ->once()
                ->with('2022-01-01,2022-10-10')
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/ApiResponse/PopularGames.txt', 'r')
                    ), true)
                );

            return new RawgAPI(
                $rawgClient,
                app(PaginateRawgResponse::class),
                app(RawgService::class),
            );
        });

        $rawgApi = app(RawgAPI::class);

        $games = $rawgApi->getPopularGames('2022-01-01,2022-10-10');

        $this->assertEquals(32, $games->count());
    }

    public function test_get_popular_games_without_next_page_in_api_response()
    {
        app()->bind(RawgAPI::class, function () {
            $rawgClient = $this->mock(RawgClient::class);
            $rawgClient->expects('getRawgGames')
                ->once()
                ->with('2022-01-01,2022-10-10')
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/ApiResponse/PopularGamesWithoutNextPage.txt', 'r')
                    ), true)
                );

            return new RawgAPI(
                $rawgClient,
                app(PaginateRawgResponse::class),
                app(RawgService::class),
            );
        });

        $rawgApi = app(RawgAPI::class);

        $games = $rawgApi->getPopularGames('2022-01-01,2022-10-10');

        $this->assertEquals(1, $games->count());
    }

    public function test_game_search_with_next_page()
    {
        app()->bind(RawgAPI::class, function () {
            $rawgClient = $this->mock(RawgClient::class);
            $rawgClient->shouldReceive('getNextPaginatePageForSearch')
                ->once()
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/ApiResponse/PopularGames.txt', 'r')
                    ), true)
                );
            $rawgClient->expects('getSearchGame')
                ->once()
                ->with('cuphead')
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/ApiResponse/PopularGames.txt', 'r')
                    ), true)
                );

            return new RawgAPI(
                $rawgClient,
                app(PaginateRawgResponse::class),
                app(RawgService::class),
            );
        });

        $rawgApi = app(RawgAPI::class);

        $games = $rawgApi->gameSearch('cuphead');

        $this->assertEquals(32, $games->count());
    }

    public function test_game_search_without_next_page()
    {
        app()->bind(RawgAPI::class, function () {
            $rawgClient = $this->mock(RawgClient::class);
            $rawgClient->expects('getSearchGame')
                ->once()
                ->with('cuphead')
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/ApiResponse/PopularGamesWithoutNextPage.txt', 'r')
                    ), true)
                );

            return new RawgAPI(
                $rawgClient,
                app(PaginateRawgResponse::class),
                app(RawgService::class),
            );
        });

        $rawgApi = app(RawgAPI::class);

        $games = $rawgApi->gameSearch('cuphead');

        $this->assertEquals(1, $games->count());
    }

    public function test_game_search_by_id()
    {
        app()->bind(RawgAPI::class, function () {
            $rawgClient = $this->mock(RawgClient::class);
            $rawgClient->expects('getRawgGameById')
                ->once()
                ->with('123123')
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/ApiResponse/Cuphead.txt', 'r')
                    ), true)
                );

            return new RawgAPI(
                $rawgClient,
                app(PaginateRawgResponse::class),
                app(RawgService::class),
            );
        });

        $rawgApi = app(RawgAPI::class);

        $game = $rawgApi->gameSearchById('123123');

        $this->assertEquals('Cuphead', $game->name);
        $this->assertEquals("cuphead", $game->slug);
        $this->assertEquals(28154, $game->rawgId);
    }

    public function test_get_game_store()
    {
        app()->bind(RawgAPI::class, function () {
            $rawgClient = $this->mock(RawgClient::class);
            $rawgClient->expects('getRawgGameStores')
                ->once()
                ->with('123123')
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/ApiResponse/CupheadStores.txt', 'r')
                    ), true)
                );

            return new RawgAPI(
                $rawgClient,
                app(PaginateRawgResponse::class),
                app(RawgService::class),
            );
        });

        $rawgApi = app(RawgAPI::class);

        $stores = $rawgApi->getGameStore('123123');

        $this->assertEquals(5, $stores->count());
        $this->assertEquals(28154, $stores->first()->gameId);
    }

    public function test_get_game_screenshots()
    {
        app()->bind(RawgAPI::class, function () {
            $rawgClient = $this->mock(RawgClient::class);
            $rawgClient->expects('getRawgGameScreenshots')
                ->once()
                ->with('123123')
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/ApiResponse/CupheadImages.txt', 'r')
                    ), true)
                );

            return new RawgAPI(
                $rawgClient,
                app(PaginateRawgResponse::class),
                app(RawgService::class),
            );
        });

        $rawgApi = app(RawgAPI::class);

        $game = $rawgApi->getGameScreenshots('123123', 'backgroundImages');

        $this->assertEquals(7, $game->count());
        $this->assertEquals('cover', $game->last()->type);
    }
}
