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
        RawgAPI     $rawgAPI,
        SaveGames $saveGames,
        StoreService $storeService,
        GameService $gameHelpers,
        SaveStores $saveStores
    ) {
        $response = $rawgAPI->getPopularGames($this->date);

        foreach ($response as $item) {
            try {
                $currentGame = $gameHelpers->gameByRawgId($item->rawgId);
                $currentGameStores = $rawgAPI->getGameStore($item->rawgId);

                if (is_null($currentGame)) {
                    $saveGames->storeGames(
                        $item,
                        $rawgAPI->getGameScreenshots($item->rawgId),
                        $currentGameStores
                    );
                    continue;
                }

                if ($gameHelpers->dbGameMd5($currentGame) !== $gameHelpers->rawgGameMd5($item)) {
                    $saveGames->updateGames($item);
                }

                if ($storeService->storeMd5($currentGameStores) !== $storeService->storeMd5($currentGame->stores)) {
                    $saveStores->update($currentGameStores, $currentGame->id);
                }
            } catch (\Exception $exception) {
                Log::info($exception, (array) $item);
            }
        }
    }
}
