<?php

namespace App\Jobs;

use App\Games\RawgAPI;
use App\Helpers\Services\GameService;
use App\Helpers\Services\TelegramService;
use App\Models\Game;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GameNotificationTelegram implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private Game   $game,
        private string $telegramId
    )
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(
        TelegramService $telegramService,
        RawgAPI         $rawgAPI,
        GameService     $gameService,
    )
    {
        $metacritic = $rawgAPI->getMetacriticData($this->game->rawg_id);
        $caption = sprintf(
            "Today release: %s \nMetacritic score: %s \n<a href='%s'>Metacritic</a> \n<a href='https://rawg.io/games/%s'>Rawg</a>",
            $this->game->name,
            $metacritic->rating ?? 'N/A',
            $metacritic->url,
            $this->game->slug
        );

        $telegramService->sendPhoto($caption, $this->telegramId, $gameService->getGameCover($this->game->rawg_id)->url);
    }
}
