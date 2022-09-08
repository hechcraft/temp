<?php

namespace Tests\Feature;

use App\Helpers\Services\GameService;
use App\Jobs\GameNotificationTelegram;
use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class SendToTelegramCommandTest extends FeatureTestCase
{
    public function test_send_to_telegram()
    {
        Queue::fake();

        $gameService = $this->mock(GameService::class);
        $gameService->expects('getGameReleaseToday')
            ->once()
            ->andReturn(collect([
                new Game([
                    "id" => 10,
                    "rawg_id" => 366091,
                    "slug" => "carx-streets",
                    "name" => "CarX Streets",
                    "released" => "2022-09-08",
                    "created_at" => null,
                    "updated_at" => null,
                ]),
                new Game([
                    "id" => 1,
                    "rawg_id" => 462688,
                    "slug" => "steelrising",
                    "name" => "Steelrising",
                    "released" => "2022-09-08",
                    "created_at" => null,
                    "updated_at" => null,
                ]),
            ]));


        $this->artisan('telegram:send');

        Queue::assertPushed(GameNotificationTelegram::class, 2);
    }
}
