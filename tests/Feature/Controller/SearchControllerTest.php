<?php

namespace Controller;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Tests\Feature\FeatureTestCase;
use Tests\TestCase;

class SearchControllerTest extends FeatureTestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_page_guest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertViewIs('welcome');

        $response->assertSee('Coming soon', $response);
        $response->assertSee('Log In', $response);
        $response->assertSee('Sign In', $response);
    }

    public function test_index_page_auth_user()
    {
        $user = User::first();

        $response = $this->actingAs($user)->get('/');

        $response->assertViewIs('welcome');
        $response->assertStatus(200);
        $response->assertSee('Profile', $response);
    }
}
