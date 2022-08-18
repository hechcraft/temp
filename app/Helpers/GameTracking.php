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
        $trackingGame = $this->findTrackingByUserIdAndGameId($userId, $gameId);
        if (!is_null($trackingGame)) {
            $trackingGame->delete();
        }
    }

    public function tracksGame(?int $userId, int $gameId): bool
    {
        if (is_null($userId)) {
            return false;
        }

        $currentGame = $this->findTrackingByUserIdAndGameId($userId, $gameId);

        if (isset($currentGame)) {
            return true;
        }

        return false;
    }

    /** @phpstan-ignore-next-line  */
    private function findTrackingByUserIdAndGameId(int $userId, int $gameId): ?UserTracking
    {
        return UserTracking::where('user_id', $userId)
            ->where('game_id', $gameId)
            ->first();
    }
}
