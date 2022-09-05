<?php

namespace Tests\Feature;

use App\Jobs\FetchRawg;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class UpdateGameListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_command_correct_push_job()
    {
        Queue::fake();

        $this->artisan('game:update');

        Queue::assertPushed(FetchRawg::class, 7);
    }
}
