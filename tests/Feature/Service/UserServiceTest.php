<?php

namespace Service;

use App\Helpers\Services\UserService;
use App\Models\User;
use Tests\Feature\FeatureTestCase;
use Tests\TestCase;

class UserServiceTest extends FeatureTestCase
{
    public function test_update_user_telegram_all_data()
    {
        $userService = app(UserService::class);

        $userService->updateTelegramData(1, 123, 'qwerty');

        $this->assertDatabaseHas('users', [
            'telegram_id' => 123,
            'avatar' => 'qwerty',
        ]);
    }

    public function test_update_user_telegram_without_avatar()
    {
        $userService = app(UserService::class);

        $userService->updateTelegramData(1, 123, null);

        $this->assertDatabaseHas('users', [
            'telegram_id' => 123,
            'avatar' => "avatar/defaultAvatar.jpg",
        ]);
    }

    public function test_delete_telegram_id()
    {
        $userService = app(UserService::class);

        $userService->deleteTelegramId(1);

        $this->assertDatabaseHas('users', [
            'telegram_id' => '0'
        ]);
    }
}
