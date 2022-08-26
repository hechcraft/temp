<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamePlatformsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game_platforms')->insert([
            [
                'game_id' => 1,
                'platform_id' => 4,
            ],
            [
                'game_id' => 1,
                'platform_id' => 187,
            ],
            [
                'game_id' => 1,
                'platform_id' => 186,
            ],
            [
                'game_id' => 2,
                'platform_id' => 4,
            ],
            [
                'game_id' => 2,
                'platform_id' => 187,
            ],
            [
                'game_id' => 3,
                'platform_id' => 4,
            ],
            [
                'game_id' => 3,
                'platform_id' => 187,
            ],
            [
                'game_id' => 3,
                'platform_id' => 1,
            ],
            [
                'game_id' => 3,
                'platform_id' => 18,
            ],
            [
                'game_id' => 3,
                'platform_id' => 186,
            ],
            [
                'game_id' => 4,
                'platform_id' => 4,
            ],
            [
                'game_id' => 4,
                'platform_id' => 1,
            ],
            [
                'game_id' => 4,
                'platform_id' => 18,
            ],
            [
                'game_id' => 4,
                'platform_id' => 186,
            ],
            [
                'game_id' => 4,
                'platform_id' => 7,
            ],
            [
                'game_id' => 5,
                'platform_id' => 4,
            ],
            [
                'game_id' => 6,
                'platform_id' => 4,
            ],
            [
                'game_id' => 6,
                'platform_id' => 187,
            ],
            [
                'game_id' => 6,
                'platform_id' => 186,
            ],
            [
                'game_id' => 7,
                'platform_id' => 7,
            ],
            [
                'game_id' => 8,
                'platform_id' => 4,
            ],
            [
                'game_id' => 9,
                'platform_id' => 4,
            ],
            [
                'game_id' => 9,
                'platform_id' => 187,
            ],
            [
                'game_id' => 9,
                'platform_id' => 1,
            ],
            [
                'game_id' => 9,
                'platform_id' => 18,
            ],
            [
                'game_id' => 9,
                'platform_id' => 186,
            ],
            [
                'game_id' => 10,
                'platform_id' => 4,
            ],
            [
                'game_id' => 11,
                'platform_id' => 4,
            ],
            [
                'game_id' => 12,
                'platform_id' => 4,
            ],
            [
                'game_id' => 12,
                'platform_id' => 7,
            ],
            [
                'game_id' => 13,
                'platform_id' => 4,
            ],
            [
                'game_id' => 13,
                'platform_id' => 187,
            ],
            [
                'game_id' => 13,
                'platform_id' => 1,
            ],
            [
                'game_id' => 13,
                'platform_id' => 18,
            ],
            [
                'game_id' => 13,
                'platform_id' => 186,
            ],
            [
                'game_id' => 13,
                'platform_id' => 7,
            ],
            [
                'game_id' => 14,
                'platform_id' => 4,
            ],
            [
                'game_id' => 14,
                'platform_id' => 187,
            ],
            [
                'game_id' => 14,
                'platform_id' => 18,
            ],
            [
                'game_id' => 14,
                'platform_id' => 7,
            ],
            [
                'game_id' => 14,
                'platform_id' => 4,
            ],
        ]);
    }
}
