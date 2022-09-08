<?php

namespace Controller;

use App\Helpers\Services\TelegramService;
use App\Helpers\Services\UserService;
use App\Models\User;
use Tests\Feature\FeatureTestCase;

class TelegramControllerTest extends FeatureTestCase
{
    public function test_adding_telegram_data_for_guest()
    {
        $response = $this->get('/telegram?id=1&photo_url=qwerty');

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    public function test_adding_telegram_data_for_user()
    {
        $user = User::first();

        $telegramServiceMock = $this->mock(TelegramService::class);
        $telegramServiceMock->expects('sendMessage');

        $response = $this->actingAs($user)->get('/telegram?id=1&photo_url=qwerty');

        $response->assertStatus(302);
        $response->assertRedirect(route('main'));

        $this->assertDatabaseHas('users', [
            'telegram_id' => '1',
            'avatar' => 'qwerty',
        ]);
    }

    public function test_delete_telegram_id_for_guest()
    {
        $response = $this->get('/telegram/delete');

        $response->assertStatus(302);
        $response->assertRedirect(route('login'));
    }

    public function test_delete_telegram_id_for_user()
    {
        $user = User::first();

        $response = $this->actingAs($user)->get('/telegram/delete');

        $this->assertDatabaseHas('users', [
            'telegram_id' => '0'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('main'));
    }
}
