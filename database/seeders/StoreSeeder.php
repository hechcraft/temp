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
                'icon' => '<i class="fa-brands fa-steam" style="color: white"></i>',
            ],
            [
                'id' => 3,
                'slug' => 'playstation-store',
                'name' => 'PlayStation Store',
                'domain' => 'store.playstation.com',
                'icon' => '<i class="fa-brands fa-playstation" style="color: white"></i>',
            ],
            [
                'id' => 2,
                'slug' => 'xbox-store',
                'name' => 'Xbox Store',
                'domain' => 'microsoft.com',
                'icon' => '<i class="fa-brands fa-xbox" style="color: white"></i>',
            ],
            [
                'id' => 4,
                'slug' => 'apple-appstore',
                'name' => 'App Store',
                'domain' => 'apps.apple.com',
                'icon' => '<i class="fa-brands fa-apple" style="color: white"></i>',
            ],
            [
                'id' => 5,
                'slug' => 'gog',
                'name' => 'GOG',
                'domain' => 'gog.com',
                'icon' => '<img src="http://logosvg.com/wp-content/uploads/GOG-com_logo.svg"
                        class="w-6 h-6 object-center" style="filter: brightness(0) invert(1);">',
            ],
            [
                'id' => 6,
                'slug' => 'nintendo',
                'name' => 'Nintendo Store',
                'domain' => 'nintendo.com',
                'icon' => '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529"
                        class="w-6 h-6 object-center" style="filter: brightness(0) invert(1);">',
            ],
            [
                'id' => 7,
                'slug' => 'xbox360',
                'name' => 'Xbox 360 Store',
                'domain' => 'marketplace.xbox.com',
                'icon' => '<i class="fa-brands fa-xbox" style="color: white"></i>',

            ],
            [
                'id' => 8,
                'slug' => 'google-play',
                'name' => 'Google Play',
                'domain' => 'play.google.com',
                'icon' => '<i class="fa-brands fa-android" style="color: white"></i>',
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
                'icon' => '<img src="http://logosvg.com/wp-content/uploads/Epic_Games_logo.svg"
                        class="w-6 h-6 object-center" style="filter: brightness(0) invert(1);">',
            ],
        ]);
    }
}
