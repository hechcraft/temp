<?php

namespace App\Games\Attributes;

use App\Games\RawgGame;
use App\Games\RawgGenreDTO;
use App\Models\GameGenres;
use Illuminate\Support\Collection;

class SaveGenres
{
    /**
     * @param Collection<RawgGenreDTO> $genres
     * @param int $gameId
     * @return void
     */
    public function store(Collection $genres, int $gameId): void
    {
        foreach ($genres as $genre) {
            GameGenres::create([
                'game_id' => $gameId,
                'genre_id' => $genre->id,
            ]);
        }
    }
}
