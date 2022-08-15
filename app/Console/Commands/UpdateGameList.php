<?php

namespace App\Console\Commands;

use App\Jobs\FetchRawg;
use Illuminate\Console\Command;
use Carbon\Carbon;

class UpdateGameList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update game list from rawg api';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $dates = collect();
        for ($i = 1; $i < 7; $i++){
            $date = sprintf('%s,%s',
                Carbon::now()->addMonths($i - 1)->toDateString(),
                Carbon::now()->addMonths($i)->toDateString(),
            );

            $dates->push($date);
        }

        foreach ($dates as $date){
            FetchRawg::dispatch($date);
        }
    }
}
