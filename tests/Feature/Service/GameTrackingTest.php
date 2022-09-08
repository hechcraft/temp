<?php

namespace Service;

use App\Helpers\GameTracking;
use App\Models\Game;
use App\Models\User;
use App\Models\UserTracking;
use Carbon\Carbon;
use Tests\Feature\FeatureTestCase;
use Tests\TestCase;

class GameTrackingTest extends FeatureTestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_start_tracking()
    {
        UserTracking::create([
            'user_id' => 1,
            'game_id' => 5
        ]);

        $this->assertDatabaseHas('user_trackings', [
            'user_id' => 1,
            'game_id' => 5,
        ]);
    }

    public function test_stop_tracking()
    {

        $gameTracking = app(GameTracking::class);

        $gameTracking->stopTracking(1, 1);

        $this->assertDatabaseMissing('user_trackings', [
            'user_id' => 1,
            'game_id' => 1,
        ]);
    }

    public function test_get_sort_tracking_games()
    {
        $gameTracking = app(GameTracking::class);

        $games = $gameTracking->getTrackedUserGamesSortByReleased(1, '2022-01-01');

        $this->assertEquals($games->count(), 3);

        $this->assertEquals(data_get($games, '0.slug'), "skinwalker-hunt");
    }
}
