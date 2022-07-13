<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('platforms')->insert([
            [
                'id' => 4,
                'name' => 'PC',
                'slug' => 'pc',
            ],
            [
                'id' => 187,
                'name' => 'PlayStation 5',
                'slug' => 'playstation5',
            ],
            [
                'id' => 18,
                'name' => 'PlayStation 4',
                'slug' => 'playstation4',
            ],

            [
                'id' => 1,
                'name' => 'Xbox One',
                'slug' => 'xbox-one',
            ],

            [
                'id' => 186,
                'name' => 'Xbox Series S/X',
                'slug' => 'xbox-series-x',
            ],

            [
                'id' => 7,
                'name' => 'Nintendo Switch',
                'slug' => 'nintendo-switch',
            ],
        ]);
    }
}
