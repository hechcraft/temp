<?php

namespace Controller;

use App\Models\User;
use Tests\Feature\FeatureTestCase;

class LogoutControllerTest extends FeatureTestCase
{
    public function test_logout_user()
    {
        $user = User::first();

        $response = $this->actingAs($user)->get(route('logout'));

        $response->assertRedirect(route('main'));
    }

    public function test_logout_guest()
    {
        $response = $this->get(route('logout'));

        $response->assertRedirect(route('main'));
    }
}
