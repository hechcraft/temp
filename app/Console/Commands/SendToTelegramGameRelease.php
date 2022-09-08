<?php

namespace App\Console\Commands;

use App\Helpers\Services\GameService;
use App\Jobs\GameNotificationTelegram;
use Illuminate\Console\Command;

class SendToTelegramGameRelease extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(
        GameService $gameService,
    )
    {
        $games = $gameService->getGameReleaseToday();

        foreach ($games as $game) {
            $telegramId = $game->tracking->user->telegram_id ?? 0;
            if ($telegramId > 0) {
                GameNotificationTelegram::dispatch($game, $telegramId)->delay(rand(1,5) * 10);
            }
        }
    }
}
