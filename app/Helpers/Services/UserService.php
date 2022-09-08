<?php

namespace App\Helpers\Services;

use App\Models\User;

class UserService
{
    public function updateTelegramData(int $userId, string $telegramId, ?string $avatar): User
    {
        $user = $this->getUserById($userId);

        $user->telegram_id = $telegramId;

        if ($avatar) {
            $user->avatar = $avatar;
        }

        $user->save();

        return $user;
    }

    public function deleteTelegramId(int $userId): bool
    {
        $user = $this->getUserById($userId);

        $user->telegram_id = '0';

        return $user->save();
    }

    private function getUserById(int $userId): User
    {
        return User::where('id', $userId)->first();
    }
}
