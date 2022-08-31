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

        $this->assertTrue($game->name  === "Steelrising");
        $this->assertTrue($game->rawg_id  === 462688);

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

        $this->assertTrue($dBGameMd5 === $rawgGameMd5);
    }
}
