<?php

namespace Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\FeatureTestCase;
use Tests\TestCase;

class RegisterTest extends FeatureTestCase
{
    public function test_show_correct_register_view()
    {
        $response = $this->get(route('register'));

        $response->assertViewIs('auth.register');
    }

    public function test_create_new_user()
    {
        $this->post(route('register'), [
            'name' => 'Test2',
            'email' => 'test2@example.com',
            'password' => '11223344',
            'password_confirmation' => '11223344',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Test2',
            'email' => 'test2@example.com',
        ]);
    }
    public function test_user_email_stored_in_database()
    {
        $this->post(route('register'), [
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => '11223344',
            'password_confirmation' => '11223344',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com'
        ]);
    }

    public function test_password_matches()
    {
        $response = $this->post(route('register'), [
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => '11223344',
            'password_confirmation' => '1122334455',
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_password_length()
    {
        $response = $this->post(route('register'), [
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => '1122',
            'password_confirmation' => '1122',
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_correct_entered_email()
    {
        $response = $this->post(route('register'), [
            'name' => 'test',
            'email' => 'testexample.com',
            'password' => '11223344',
            'password_confirmation' => '11223344',
        ]);

        $response->assertSessionHasErrors('email');

    }

    public function test_required_name()
    {
        $response = $this->post(route('register'), [
            'email' => 'test@example',
            'password' => '11223344',
            'password_confirmation' => '11223344',
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_required_email()
    {
        $response = $this->post(route('register'), [
            'name' => 'test',
            'password' => '11223344',
            'password_confirmation' => '11223344',
        ]);

        $response->assertSessionHasErrors('email');
    }
    public function test_required_password_confirmation()
    {
        $response = $this->post(route('register'), [
            'name' => 'test',
            'email' => 'test@example',
            'password' => '11223344',
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_required_password()
    {
        $response = $this->post(route('register'), [
            'name' => 'test',
            'email' => 'test@example',
            'password_confirmation' => '11223344',
        ]);

        $response->assertSessionHasErrors('password');
    }
}
