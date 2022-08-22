<?php

namespace App\Helpers;

use App\Models\UserTracking;
use Illuminate\Http\RedirectResponse;

class GameTracking
{
    public function startTracking(int $userId, int $gameId): void
    {
        UserTracking::firstOrCreate([
            'user_id' => $userId,
            'game_id' => $gameId,
        ]);
    }

    public function stopTracking(int $userId, int $gameId): void
    {
        $trackingGame = $this->findTrackingByUserIdAndGameId($userId, $gameId);
        if (! is_null($trackingGame)) {
            $trackingGame->delete();
        }
    }


    /**
     * @param int $userId
     * @param int $gameId
     * @return RedirectResponse|bool
     */
    public function gameTrackingCheck(int $userId, int $gameId): RedirectResponse|bool
    {
        try {
            $currentGame = $this->findTrackingByUserIdAndGameId($userId, $gameId);

            if (isset($currentGame)) {
                return true;
            }

            return false;
        } catch (\Exception $e){
            return redirect()->route('error');
        }

    }

    /** @phpstan-ignore-next-line  */
    private function findTrackingByUserIdAndGameId(int $userId, int $gameId): ?UserTracking
    {
        return UserTracking::where('user_id', $userId)
            ->where('game_id', $gameId)
            ->first();
    }
}
