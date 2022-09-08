<?php

namespace Games\Attributes;

use App\Games\Attributes\SaveGenres;
use App\Games\RawgGenreDTO;
use Tests\Feature\FeatureTestCase;
use Tests\TestCase;

class SaveGenresTest extends FeatureTestCase
{
    public function test_genres_save()
    {
        $saveGenres = app(SaveGenres::class);

        $genres = collect([
            new RawgGenreDTO(1, 'Racing', 'racing'),
            new RawgGenreDTO(2, 'Shooter', 'shooter'),
        ]);

        $saveGenres->store($genres, 1);

        $this->assertDatabaseHas('game_genres', [
            'game_id' => 1,
            'genre_id' => 1,
        ]);

        $this->assertDatabaseHas('game_genres', [
            'game_id' => 1,
            'genre_id' => 2,
        ]);
    }
}
