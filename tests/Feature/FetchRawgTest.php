<?php

namespace Tests\Feature;

use App\Games\PaginateRawgResponse;
use App\Games\RawgAPI;
use App\Games\RawgClient;
use App\Games\RawgGame;
use App\Helpers\Services\RawgService;
use App\Jobs\FetchRawg;
use Illuminate\Support\Collection;

class FetchRawgTest extends FeatureTestCase
{
    public function test_fetch_games_from_rawg_api()
    {
        app()->bind(RawgAPI::class, function () {
            $rawgClient = $this->mock(RawgClient::class);
            $rawgClient->shouldReceive('getNextPaginatePageForGames')
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/Games/ApiResponse/PopularGames.txt', 'r')
                    ), true)
                );

            $rawgClient->shouldReceive('getRawgGames')
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/Games/ApiResponse/PopularGames.txt', 'r')
                    ), true)
                );
            $rawgClient->shouldReceive('getRawgGameStores')
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/Games/ApiResponse/CupheadStores.txt', 'r')
                    ), true)
                );

            $rawgClient->shouldReceive('getRawgGameScreenshots')
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/Games/ApiResponse/CupheadImages.txt', 'r')
                    ), true)
                );

            return new RawgAPI(
                $rawgClient,
                app(PaginateRawgResponse::class),
                app(RawgService::class),
            );
        });

        FetchRawg::dispatch('2022-01-01,2022-10-10');

        $this->assertDatabaseHas('games', [
            'rawg_id' => 499258,
            'slug' => 'midnight-fight-express',
            'name' => 'Midnight Fight Express',
            'released' => '2022-08-23',
        ]);
    }
}
