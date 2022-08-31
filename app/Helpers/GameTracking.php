<?php

namespace App\Helpers;

use App\Models\UserTracking;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;

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

    public function getTrackedUserGamesSortByReleased(int $userId, $date = null): Collection
    {
        return \DB::table('games')
            ->leftJoin('user_trackings', 'games.id', '=', 'user_trackings.game_id')
            ->leftJoin('images', 'games.id','=', 'images.game_id')
            ->select('games.*', 'user_trackings.*', 'images.*')
            ->where('images.type', '=', 'cover')
            ->where('user_trackings.user_id', '=', $userId)
            ->where('games.released', '>=', $date ?? Carbon::now()->format('Y-m-d'))
            ->orderBy('games.released')
            ->get();
    }

    /** @phpstan-ignore-next-line  */
    private function findTrackingByUserIdAndGameId(int $userId, int $gameId): ?UserTracking
    {
        return UserTracking::where('user_id', $userId)
            ->where('game_id', $gameId)
            ->first();
    }
}
