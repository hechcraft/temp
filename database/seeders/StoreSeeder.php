<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            [
                'id' => 1,
                'slug' => 'steam',
                'name' => 'Steam',
                'domain' => 'store.steampowered.com',
                'icon' => 'fa-steam',
            ],
            [
                'id' => 3,
                'slug' => 'playstation-store',
                'name' => 'PlayStation Store',
                'domain' => 'store.playstation.com',
                'icon' => 'fa-playstation',
            ],
            [
                'id' => 2,
                'slug' => 'xbox-store',
                'name' => 'Xbox Store',
                'domain' => 'microsoft.com',
                'icon' => 'fa-xbox',
            ],
            [
                'id' => 4,
                'slug' => 'apple-appstore',
                'name' => 'App Store',
                'domain' => 'apps.apple.com',
                'icon' => 'fa-apple',
            ],
            [
                'id' => 5,
                'slug' => 'gog',
                'name' => 'GOG',
                'domain' => 'gog.com',
                'icon' => 'http://logosvg.com/wp-content/uploads/GOG-com_logo.svg',
            ],
            [
                'id' => 6,
                'slug' => 'nintendo',
                'name' => 'Nintendo Store',
                'domain' => 'nintendo.com',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529',
            ],
            [
                'id' => 7,
                'slug' => 'xbox360',
                'name' => 'Xbox 360 Store',
                'domain' => 'marketplace.xbox.com',
                'icon' => 'fa-xbox',

            ],
            [
                'id' => 8,
                'slug' => 'google-play',
                'name' => 'Google Play',
                'domain' => 'play.google.com',
                'icon' => 'fa-android',
            ],
            [
                'id' => 9,
                'slug' => 'itch',
                'name' => 'itch.io',
                'domain' => 'itch.io',
                'icon' => '',
            ],
            [
                'id' => 11,
                'slug' => 'epic-games',
                'name' => 'Epic Games',
                'domain' => 'epicgames.com',
                'icon' => 'http://logosvg.com/wp-content/uploads/Epic_Games_logo.svg',
            ],
        ]);
    }
}
