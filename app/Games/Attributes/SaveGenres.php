<?php

namespace App\Games\Attributes;

use App\Games\RawgGame;
use App\Models\GameGenres;

class SaveGenres
{
    public function store(RawgGame $rawgGame, int $gameId): void
    {
        foreach ($rawgGame->genres as $genre){
            GameGenres::create([
                'game_id' => $gameId,
                'genre_id' => $genre->id,
            ]);
        }
    }
}
