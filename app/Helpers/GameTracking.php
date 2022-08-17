<?php

namespace App\Helpers;

use App\Models\UserTracking;

class GameTracking
{
    public function addGame(int $userId, int $gameId): void
    {
        UserTracking::firstOrCreate([
            'user_id' => $userId,
            'game_id' => $gameId,
        ]);
    }

    public function deleteGame(int $userId, int $gameId): void
    {
        $this->findTrackingByUserIdAndGameId($userId, $gameId)->delete();
    }

    public function tracksGame(?int $userId, int $gameId): bool
    {
        if (is_null($userId)) return false;

        $currentGame = $this->findTrackingByUserIdAndGameId($userId, $gameId);

        if (isset($currentGame)) return true;

        return false;
    }

    private function findTrackingByUserIdAndGameId(int $userId, int $gameId)
    {
        return UserTracking::where('user_id', $userId)
            ->where('game_id', $gameId)
            ->first();
    }
}
