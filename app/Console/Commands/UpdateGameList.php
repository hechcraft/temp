<?php

namespace App\Console\Commands;

use App\Jobs\FetchRawg;
use Carbon\Carbon;
use Illuminate\Console\Command;

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
    public function handle(): void
    {
        foreach (range(0, 6) as $month) {
            $range = sprintf(
                '%s,%s',
                Carbon::now()->addMonths($month)->toDateString(),
                Carbon::now()->addMonths($month + 1)->toDateString(),
            );

            FetchRawg::dispatch($range);
        }
    }
}
