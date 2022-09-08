<?php

namespace Controller;

use App\Models\Game;
use App\Models\User;
use App\Models\UserTracking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\FeatureTestCase;
use Tests\TestCase;

class TrackedGamesControllerTest extends FeatureTestCase
{
    public function test_user_has_access_list_games()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('tracked.games'));

        $response->assertViewHas('user.trackedGames');
    }

    public function test_guest_dont_has_access_list_games()
    {
        $response = $this->get(route('tracked.games'));

        $response->assertRedirect(route('login'));
    }

    public function test_guest_cant_delete_tracking_game()
    {
        $response = $this->delete(route('tracked.games.delete', ['tracking' => 1]));

        $response->assertRedirect(route('login'));
    }

    public function test_user_can_delete_tracking_game()
    {

        $game = Game::factory()->create();

        $user = User::factory()->create();

        $userTracking = UserTracking::create([
            'user_id' => $user->id,
            'game_id' => $game->id,
        ]);

        $response = $this->actingAs($user)->delete(route('tracked.games.delete', ['tracking' => $userTracking->id]));

        $this->assertDatabaseMissing('user_trackings', [
            'id' => 1,
            'game_id' => 1,
        ]);
    }
}
