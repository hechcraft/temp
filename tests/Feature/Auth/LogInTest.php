<?php

namespace Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\FeatureTestCase;
use Tests\TestCase;

class LogInTest extends FeatureTestCase
{
    public function test_required_password()
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_required_email()
    {
        $response = $this->post(route('login'), [
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_login_success()
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/');
    }
}
