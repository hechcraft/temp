<?php

namespace Service;

use App\Games\RawgGame;
use App\Helpers\Services\GameService;
use App\Models\Game;
use Illuminate\Support\Collection;
use Tests\Feature\FeatureTestCase;
use Tests\TestCase;

class GameServiceTest extends FeatureTestCase
{
    public function test_get_game_by_rawg_id()
    {
        $gameService = app(GameService::class);

        $game = $gameService->gameByRawgId('462688');

        $this->assertEquals($game->name, "Steelrising");
        $this->assertEquals($game->rawg_id, 462688);

        $game = $gameService->gameByRawgId('1');

        $this->assertNotTrue($game);
    }

    public function test_md5_generators()
    {
        $gameService = app(GameService::class);

        $rawgGame = new RawgGame(
            "steelrising",
            "Steelrising",
            "2022-09-08",
            462688,
            'qweqwe',
            new Collection(),
            new Collection(),
        );

        $dBGameMd5 = $gameService->generateMd5ForDbGame(Game::first());
        $rawgGameMd5 = $gameService->generateMd5ForRawgGame($rawgGame);

        $this->assertEquals($dBGameMd5, $rawgGameMd5);
    }

    public function test_game_sort_by_release()
    {
        $gameService = app(GameService::class);

        $gamesSort = $gameService->gameSortByRelease('2022-01-01');

        $this->assertEquals($gamesSort->slice(0,1)->first()->released, "2022-08-19");

        $this->assertEquals($gamesSort->slice(1,2)->first()->released, "2022-08-20");

        $this->assertEquals($gamesSort->slice(2,3)->first()->released, "2022-08-23");

        $this->assertEquals($gamesSort->slice(3,4)->first()->released, "2022-08-29");

        $this->assertEquals($gamesSort->slice(4,5)->first()->released, "2022-09-02");

        $this->assertEquals($gamesSort->slice(5,6)->first()->released, "2022-09-02");

        $this->assertEquals($gamesSort->slice(6,7)->first()->released, "2022-09-06");

        $this->assertEquals($gamesSort->slice(7,8)->first()->released, "2022-09-08");

        $this->assertEquals($gamesSort->slice(8,9)->first()->released, "2022-09-08");

        $this->assertEquals($gamesSort->slice(9,10)->first()->released, "2022-09-09");

        $this->assertEquals($gamesSort->slice(10,11)->first()->released, "2022-09-15");

        $this->assertEquals($gamesSort->slice(11,12)->first()->released, "2022-09-20");

        $this->assertEquals($gamesSort->slice(12,13)->first()->released, "2022-09-22");

        $this->assertEquals($gamesSort->slice(13,14)->first()->released, "2022-09-27");

        $this->assertEquals($gamesSort->slice(14,15)->first()->released, "2022-09-29");
    }
}
