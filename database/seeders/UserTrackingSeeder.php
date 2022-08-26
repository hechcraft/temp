<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTrackingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_trackings')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'game_id' => 10,
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'game_id' => 15,
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'game_id' => 1,
            ],
        ]);
    }
}
