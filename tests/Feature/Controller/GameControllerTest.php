<?php

namespace Controller;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\FeatureTestCase;
use Tests\TestCase;

class GameControllerTest extends FeatureTestCase
{
    public function test_game_show_page_for_auth_user()
    {
        $response = $this->actingAs($this->user)->get('/game/steelrising');

        $response->assertStatus(200);

        $response->assertSee('Steelrising');

    }


    public function test_isset_button_for_stop_track_game()
    {
        $response = $this->actingAs($this->user)->get('/game/steelrising');

        $response->assertSee('Stop tracking');
    }

    public function test_isset_button_track_games_for_auth_user()
    {
        $response = $this->actingAs($this->user)->get('/game/the-last-of-us-part-i');

        $response->assertSee('Track this game');
    }

    public function test_guest_not_see_track_button()
    {
        $response = $this->get('/game/the-last-of-us-part-i');

        $response->assertDontSee('Track this game');
    }

    public function test_guest_not_see_stop_track_button()
    {
        $response = $this->get('/game/the-last-of-us-part-i');

        $response->assertDontSee('Stop tracking');
    }
}
