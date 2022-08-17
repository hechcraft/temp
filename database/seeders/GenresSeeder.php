<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            [
                'id' => 4,
                'slug' => 'action',
                'name' => 'Action'
            ],
            [
                'id' => 51,
                'slug' => 'indie',
                'name' => 'Indie'
            ],
            [
                'id' => 3,
                'slug' => 'adventure',
                'name' => 'Adventure'
            ],
            [
                'id' => 5,
                'slug' => 'role-playing-games-rpg',
                'name' => 'RPG'
            ],
            [
                'id' => 10,
                'slug' => 'strategy',
                'name' => 'Strategy'
            ],
            [
                'id' => 2,
                'slug' => 'shooter',
                'name' => 'Shooter'
            ],
            [
                'id' => 40,
                'slug' => 'casual',
                'name' => 'Casual'
            ],
            [
                'id' => 14,
                'slug' => 'simulation',
                'name' => 'Simulation'
            ],
            [
                'id' => 7,
                'slug' => 'puzzle',
                'name' => 'Puzzle'
            ],
            [
                'id' => 11,
                'slug' => 'arcade',
                'name' => 'Arcade'
            ],
            [
                'id' => 83,
                'slug' => 'platformer',
                'name' => 'Platformer'
            ],
            [
                'id' => 1,
                'slug' => 'racing',
                'name' => 'Racing'
            ],
            [
                'id' => 59,
                'slug' => 'massively-multiplayer',
                'name' => 'Massively Multiplayer'
            ],
            [
                'id' => 15,
                'slug' => 'sports',
                'name' => 'Sports'
            ],
            [
                'id' => 6,
                'slug' => 'fighting',
                'name' => 'Fighting'
            ],
            [
                'id' => 19,
                'slug' => 'family',
                'name' => 'Family'
            ],
            [
                'id' => 28,
                'slug' => 'board-games',
                'name' => 'Board Games'
            ],
            [
                'id' => 34,
                'slug' => 'educational',
                'name' => 'Educational'
            ],
            [
                'id' => 17,
                'slug' => 'card',
                'name' => 'Card'
            ]
        ]);
    }
}
