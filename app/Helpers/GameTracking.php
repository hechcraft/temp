<?php

namespace App\Helpers;

use App\Models\UserTraking;

class GameTracking
{
    public function __construct(private int $userId, private int $gameId)
    {
        $this->userId = $userId;
        $this->gameId = $gameId;
    }

    public function addGame(): void
    {
        UserTraking::create([
            'user_id' => $this->userId,
            'game_id' => $this->gameId,
        ]);
    }

    public function deleteGame(): \Illuminate\Http\RedirectResponse
    {
        $this->currentGame()->delete();

        return redirect()->route('main');
    }

    public function issetGameTracking(): bool
    {
        $currentGame = $this->currentGame();

        if (isset($currentGame)) return true;

        return false;
    }

    private function currentGame()
    {
        return UserTraking::where('user_id', $this->userId)
            ->where('game_id', $this->gameId)
            ->first();
    }
}
