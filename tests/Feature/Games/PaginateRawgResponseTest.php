<?php

namespace Games;

use App\Games\PaginateRawgResponse;
use App\Games\RawgClient;
use App\Helpers\Services\RawgService;
use Tests\TestCase;

class PaginateRawgResponseTest extends TestCase
{
    public function test_paginate_search_page()
    {

        app()->bind(PaginateRawgResponse::class, function () {
            $clientMock = $this->mock(RawgClient::class);
            $clientMock->expects('getNextPaginatePageForSearch')
                ->once()
                ->with(1, 'harry potter')
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/ApiResponse/PaginateResponse.txt', 'r')
                    ), true)
                );

            return new PaginateRawgResponse(
                $clientMock,
                app(RawgService::class)
            );
        });

        $paginateRawgResponse = app(PaginateRawgResponse::class);

        $games = $paginateRawgResponse->paginateSearchPages(1,'harry potter');

        $this->assertEquals($games->count(), 9);
    }

    public function test_paginate_rawg_games()
    {
        app()->bind(PaginateRawgResponse::class, function () {
            $clientMock = $this->mock(RawgClient::class);
            $clientMock->expects('getNextPaginatePageForGames')
                ->once()
                ->with(1, '2022-01-01,2022-10-10')
                ->andReturn(
                    json_decode(htmlspecialchars_decode(
                        file_get_contents(__DIR__ . '/ApiResponse/PaginateResponse.txt', 'r')
                    ), true)
                );

            return new PaginateRawgResponse(
                $clientMock,
                app(RawgService::class)
            );
        });

        $paginateRawgResponse = app(PaginateRawgResponse::class);

        $games = $paginateRawgResponse->paginateRawgGames(1,'2022-01-01,2022-10-10');

        $this->assertEquals($games->count(), 9);
    }

    public function test_exist_next_page_in_rawg_api()
    {
        $paginateRawgResponse = app(PaginateRawgResponse::class);

        $paginateExist = $paginateRawgResponse->paginateExist('next page url');

        $this->assertTrue($paginateExist);

        $paginateExist = $paginateRawgResponse->paginateExist(null);

        $this->assertFalse($paginateExist);
    }
}
