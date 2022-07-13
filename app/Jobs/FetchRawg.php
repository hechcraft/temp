<?php

namespace App\Jobs;

use App\Games\RawgAPI;
use App\Games\SaveGames;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchRawg implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $rawg = new RawgAPI();
        $saveGames = new SaveGames();

        $data = '2022-09-01,2022-10-01';
        $data2 = '2022-06-01,2022-07-01';

        $response = $rawg->getPopularGames($data);

        foreach ($response as $item) {
            $saveGames->storeGames($item);
        }

        dd($response);
    }
}
