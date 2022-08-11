<?php

namespace App\Jobs;

use App\Games\GameAttributes;
use App\Games\RawgAPI;
use App\Games\SaveAttributes;
use App\Games\SaveGames;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class  FetchRawg implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct(public string $data)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(RawgAPI $rawgAPI, SaveGames $saveGames)
    {
        $response = $rawgAPI->getPopularGames($this->data);

        foreach ($response as $item) {
            $saveGames->storeGames($item,
                $rawgAPI->getGameAtrributes($item->rawgId, GameAttributes::Screenshots),
                $rawgAPI->getGameAtrributes($item->rawgId, GameAttributes::Stores));
        }

        dd($response);
    }
}
