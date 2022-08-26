<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameGenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game_genres')->insert([
            [
                'game_id' => 1,
                'genre_id' => 3,
            ],
            [
                'game_id' => 1,
                'genre_id' => 4,
            ],
            [
                'game_id' => 1,
                'genre_id' => 5,
            ],
            [
                'game_id' => 2,
                'genre_id' => 2,
            ],
            [
                'game_id' => 2,
                'genre_id' => 4,
            ],
            [
                'game_id' => 3,
                'genre_id' => 2,
            ],
            [
                'game_id' => 4,
                'genre_id' => 51,
            ],
            [
                'game_id' => 4,
                'genre_id' => 4,
            ],
            [
                'game_id' => 5,
                'genre_id' => 3,
            ],
            [
                'game_id' => 5,
                'genre_id' => 4,
            ],
            [
                'game_id' => 6,
                'genre_id' => 4,
            ],
            [
                'game_id' => 7,
                'genre_id' => 2,
            ],
            [
                'game_id' => 7,
                'genre_id' => 4,
            ],
            [
                'game_id' => 8,
                'genre_id' => 4,
            ],
            [
                'game_id' => 9,
                'genre_id' => 3,
            ],
            [
                'game_id' => 10,
                'genre_id' => 1,
            ],
            [
                'game_id' => 10,
                'genre_id' => 59,
            ],
            [
                'game_id' => 10,
                'genre_id' => 15,
            ],
            [
                'game_id' => 11,
                'genre_id' => 10,
            ],
            [
                'game_id' => 11,
                'genre_id' => 51,
            ],
            [
                'game_id' => 11,
                'genre_id' => 5,
            ],
            [
                'game_id' => 12,
                'genre_id' => 51,
            ],
            [
                'game_id' => 12,
                'genre_id' => 3,
            ],
            [
                'game_id' => 12,
                'genre_id' => 4,
            ],
            [
                'game_id' => 12,
                'genre_id' => 5,
            ],
            [
                'game_id' => 13,
                'genre_id' => 4,
            ],
            [
                'game_id' => 13,
                'genre_id' => 6,
            ],
            [
                'game_id' => 14,
                'genre_id' => 4,
            ],
            [
                'game_id' => 14,
                'genre_id' => 5,
            ],
            [
                'game_id' => 15,
                'genre_id' => 51,
            ],
            [
                'game_id' => 15,
                'genre_id' => 3,
            ],
            [
                'game_id' => 15,
                'genre_id' => 4,
            ],
        ]);
    }
}
