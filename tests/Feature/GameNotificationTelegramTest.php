<?php

namespace Tests\Feature;

use App\Games\RawgAPI;
use App\Games\RawgMetacriticDataDTO;
use App\Helpers\Services\GameService;
use App\Helpers\Services\TelegramService;
use App\Jobs\GameNotificationTelegram;
use App\Models\Game;
use App\Models\Images;
use Tests\TestCase;

class GameNotificationTelegramTest extends TestCase
{
    public function test_game_notofication_to_telegram()
    {
        $rawgApi = $this->mock(RawgAPI::class);
        $rawgApi->expects('getMetacriticData')
            ->andReturn(
                new RawgMetacriticDataDTO(
                    null,
                    'qwe',
                )
            );

        $caption = "Today release: Steelrising \nMetacritic score: N/A \n<a href='qwe'>Metacritic</a> \n<a href='https://rawg.io/games/steelrising'>Rawg</a>";

        $gameService = $this->mock(GameService::class);
        $gameService->expects('getGameCover')
            ->with(462688)
            ->andReturn(
                new Images([
                    "id" => 7,
                    "game_id" => 1,
                    "url" => "https://media.rawg.io/media/games/ec0/ec0e75d783dcd78a3f9367a57b87ac97.jpg",
                    "type" => "cover",
                ])
            );

        $telegramService = $this->mock(TelegramService::class);
        $telegramService->expects('sendPhoto')->with($caption, '123', 'https://media.rawg.io/media/games/ec0/ec0e75d783dcd78a3f9367a57b87ac97.jpg');

        GameNotificationTelegram::dispatch(Game::first(), '123');
    }
}

