<?php

namespace App\Jobs;

use App\Games\Attributes\SaveStores;
use App\Games\RawgAPI;
use App\Games\SaveGames;
use App\Helpers\Services\GameService;
use App\Helpers\Services\StoreService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class FetchRawg implements ShouldQueue
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
    public function __construct(public string $date)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(
        RawgAPI      $rawgAPI,
        SaveGames    $saveGames,
        StoreService $storeService,
        GameService  $gameHelpers,
        SaveStores   $saveStores
    ) {
        $rawgGames = $rawgAPI->getPopularGames($this->date);

        foreach ($rawgGames as $rawgGame) {
            try {
                $currentGame = $gameHelpers->gameByRawgId($rawgGame->rawgId);
                $currentGameStores = $rawgAPI->getGameStore($rawgGame->rawgId);

                if (is_null($currentGame)) {
                    $saveGames->storeGames(
                        $rawgGame,
                        $rawgAPI->getGameScreenshots($rawgGame->rawgId, $rawgGame->backgroundImage),
                        $currentGameStores
                    );

                    continue;
                }

                if ($gameHelpers->generateMd5ForDbGame($currentGame) !== $gameHelpers->generateMd5ForRawgGame($rawgGame)) {
                    $saveGames->updateGames($rawgGame);
                }

                if ($storeService->generateMd5ForRawgStores($currentGameStores) !== $storeService->generateMd5ForDbStores($currentGame->stores)) {
                    $saveStores->updateStore($currentGameStores, $currentGame->id);
                }
            } catch (\Exception $exception) {
                Log::info($exception, (array)$rawgGame);
            }
        }
    }
}
