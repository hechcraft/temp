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
                'slug' => 'pc',
                'name' => 'PC'
            ],
            [
                'id' => 187,
                'slug' => 'playstation5',
                'name' => 'PlayStation 5'
            ],
            [
                'id' => 1,
                'slug' => 'xbox-one',
                'name' => 'Xbox One'
            ],
            [
                'id' => 18,
                'slug' => 'playstation4',
                'name' => 'PlayStation 4'
            ],
            [
                'id' => 186,
                'slug' => 'xbox-series-x',
                'name' => 'Xbox Series S/X'
            ],
            [
                'id' => 7,
                'slug' => 'nintendo-switch',
                'name' => 'Nintendo Switch'
            ],
            [
                'id' => 3,
                'slug' => 'ios',
                'name' => 'iOS'
            ],
            [
                'id' => 21,
                'slug' => 'android',
                'name' => 'Android'
            ],
            [
                'id' => 8,
                'slug' => 'nintendo-3ds',
                'name' => 'Nintendo 3DS'
            ],
            [
                'id' => 9,
                'slug' => 'nintendo-ds',
                'name' => 'Nintendo DS'
            ],
            [
                'id' => 13,
                'slug' => 'nintendo-dsi',
                'name' => 'Nintendo DSi'
            ],
            [
                'id' => 5,
                'slug' => 'macos',
                'name' => 'macOS'
            ],
            [
                'id' => 6,
                'slug' => 'linux',
                'name' => 'Linux'
            ],
            [
                'id' => 14,
                'slug' => 'xbox360',
                'name' => 'Xbox 360'
            ],
            [
                'id' => 80,
                'slug' => 'xbox-old',
                'name' => 'Xbox'
            ],
            [
                'id' => 16,
                'slug' => 'playstation3',
                'name' => 'PlayStation 3'
            ],
            [
                'id' => 15,
                'slug' => 'playstation2',
                'name' => 'PlayStation 2'
            ],
            [
                'id' => 27,
                'slug' => 'playstation1',
                'name' => 'PlayStation'
            ],
            [
                'id' => 19,
                'slug' => 'ps-vita',
                'name' => 'PS Vita'
            ],
            [
                'id' => 17,
                'slug' => 'psp',
                'name' => 'PSP'
            ],
            [
                'id' => 10,
                'slug' => 'wii-u',
                'name' => 'Wii U'
            ],
            [
                'id' => 11,
                'slug' => 'wii',
                'name' => 'Wii'
            ],
            [
                'id' => 105,
                'slug' => 'gamecube',
                'name' => 'GameCube'
            ],
            [
                'id' => 83,
                'slug' => 'nintendo-64',
                'name' => 'Nintendo 64'
            ],
            [
                'id' => 24,
                'slug' => 'game-boy-advance',
                'name' => 'Game Boy Advance'
            ],
            [
                'id' => 43,
                'slug' => 'game-boy-color',
                'name' => 'Game Boy Color'
            ],
            [
                'id' => 26,
                'slug' => 'game-boy',
                'name' => 'Game Boy'
            ],
            [
                'id' => 79,
                'slug' => 'snes',
                'name' => 'SNES'
            ],
            [
                'id' => 49,
                'slug' => 'nes',
                'name' => 'NES'
            ],
            [
                'id' => 55,
                'slug' => 'macintosh',
                'name' => 'Classic Macintosh'
            ],
            [
                'id' => 41,
                'slug' => 'apple-ii',
                'name' => 'Apple II'
            ],
            [
                'id' => 166,
                'slug' => 'commodore-amiga',
                'name' => 'Commodore / Amiga'
            ],
            [
                'id' => 28,
                'slug' => 'atari-7800',
                'name' => 'Atari 7800'
            ],
            [
                'id' => 31,
                'slug' => 'atari-5200',
                'name' => 'Atari 5200'
            ],
            [
                'id' => 23,
                'slug' => 'atari-2600',
                'name' => 'Atari 2600'
            ],
            [
                'id' => 22,
                'slug' => 'atari-flashback',
                'name' => 'Atari Flashback'
            ],
            [
                'id' => 25,
                'slug' => 'atari-8-bit',
                'name' => 'Atari 8-bit'
            ],
            [
                'id' => 34,
                'slug' => 'atari-st',
                'name' => 'Atari ST'
            ],
            [
                'id' => 46,
                'slug' => 'atari-lynx',
                'name' => 'Atari Lynx'
            ],
            [
                'id' => 50,
                'slug' => 'atari-xegs',
                'name' => 'Atari XEGS'
            ],
            [
                'id' => 167,
                'slug' => 'genesis',
                'name' => 'Genesis'
            ],
            [
                'id' => 107,
                'slug' => 'sega-saturn',
                'name' => 'SEGA Saturn'
            ],
            [
                'id' => 119,
                'slug' => 'sega-cd',
                'name' => 'SEGA CD'
            ],
            [
                'id' => 117,
                'slug' => 'sega-32x',
                'name' => 'SEGA 32X'
            ],
            [
                'id' => 74,
                'slug' => 'sega-master-system',
                'name' => 'SEGA Master System'
            ],
            [
                'id' => 106,
                'slug' => 'dreamcast',
                'name' => 'Dreamcast'
            ],
            [
                'id' => 111,
                'slug' => '3do',
                'name' => '3DO'
            ],
            [
                'id' => 112,
                'slug' => 'jaguar',
                'name' => 'Jaguar'
            ],
            [
                'id' => 77,
                'slug' => 'game-gear',
                'name' => 'Game Gear'
            ],
            [
                'id' => 12,
                'slug' => 'neogeo',
                'name' => 'Neo Geo'
            ]
        ]);
    }
}
