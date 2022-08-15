<?php

namespace App\Helpers;

use App\Models\UserTracking;

class GameTracking
{
    public function __construct()
    {
    }

    public function addGame(int $userId, int $gameId): void
    {
        UserTracking::create([
            'user_id' => $userId,
            'game_id' => $gameId,
        ]);
    }

    public function deleteGame(int $userId, int $gameId): \Illuminate\Http\RedirectResponse
    {
        $this->currentGame($userId, $gameId)->delete();

        return redirect()->route('main');
    }

    public function issetGameTracking(int $userId, int $gameId): bool
    {
        $currentGame = $this->currentGame($userId, $gameId);

        if (isset($currentGame)) return true;

        return false;
    }

    private function currentGame(int $userId, int $gameId)
    {
        return UserTracking::where('user_id', $userId)
            ->where('game_id', $gameId)
            ->first();
    }
}
