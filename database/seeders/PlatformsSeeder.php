<?php

namespace Database\Seeders;

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
                'name' => 'PC',
                'icon' => 'fa-brands fa-steam',
            ],
            [
                'id' => 187,
                'slug' => 'playstation5',
                'name' => 'PlayStation 5',
                'icon' => 'fa-brands fa-playstation',
            ],
            [
                'id' => 1,
                'slug' => 'xbox-one',
                'name' => 'Xbox One',
                'icon' => 'fa-brands fa-xbox',
            ],
            [
                'id' => 18,
                'slug' => 'playstation4',
                'name' => 'PlayStation 4',
                'icon' => 'fa-brands fa-playstation',
            ],
            [
                'id' => 186,
                'slug' => 'xbox-series-x',
                'name' => 'Xbox Series S/X',
                'icon' => 'fa-brands fa-xbox',
            ],
            [
                'id' => 7,
                'slug' => 'nintendo-switch',
                'name' => 'Nintendo Switch',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529',
            ],
            [
                'id' => 3,
                'slug' => 'ios',
                'name' => 'iOS',
                'icon' => 'fa-brands fa-apple',
            ],
            [
                'id' => 21,
                'slug' => 'android',
                'name' => 'Android',
                'icon' => 'fa-brands fa-android',
            ],
            [
                'id' => 8,
                'slug' => 'nintendo-3ds',
                'name' => 'Nintendo 3DS',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529',

            ],
            [
                'id' => 9,
                'slug' => 'nintendo-ds',
                'name' => 'Nintendo DS',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529',

            ],
            [
                'id' => 13,
                'slug' => 'nintendo-dsi',
                'name' => 'Nintendo DSi',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529',

            ],
            [
                'id' => 5,
                'slug' => 'macos',
                'name' => 'macOS',
                'icon' => 'fa-brands fa-apple',
            ],
            [
                'id' => 6,
                'slug' => 'linux',
                'name' => 'Linux',
                'icon' => 'fa-brands fa-linux',
            ],
            [
                'id' => 14,
                'slug' => 'xbox360',
                'name' => 'Xbox 360',
                'icon' => 'fa-brands fa-xbox',
            ],
            [
                'id' => 80,
                'slug' => 'xbox-old',
                'name' => 'Xbox',
                'icon' => 'fa-brands fa-xbox',
            ],
            [
                'id' => 16,
                'slug' => 'playstation3',
                'name' => 'PlayStation 3',
                'icon' => 'fa-brands fa-playstation',
            ],
            [
                'id' => 15,
                'slug' => 'playstation2',
                'name' => 'PlayStation 2',
                'icon' => 'fa-brands fa-playstation',
            ],
            [
                'id' => 27,
                'slug' => 'playstation1',
                'name' => 'PlayStation',
                'icon' => 'fa-brands fa-playstation',
            ],
            [
                'id' => 19,
                'slug' => 'ps-vita',
                'name' => 'PS Vita',
                'icon' => 'fa-brands fa-playstation',
            ],
            [
                'id' => 17,
                'slug' => 'psp',
                'name' => 'PSP',
                'icon' => 'fa-brands fa-playstation',
            ],
            [
                'id' => 10,
                'slug' => 'wii-u',
                'name' => 'Wii U',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529',

            ],
            [
                'id' => 11,
                'slug' => 'wii',
                'name' => 'Wii',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529',
            ],
            [
                'id' => 105,
                'slug' => 'gamecube',
                'name' => 'GameCube',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 83,
                'slug' => 'nintendo-64',
                'name' => 'Nintendo 64',
                'icon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Micrologo_Nintendo.svg/130px-Micrologo_Nintendo.svg.png?20110827055529',
            ],
            [
                'id' => 24,
                'slug' => 'game-boy-advance',
                'name' => 'Game Boy Advance',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 43,
                'slug' => 'game-boy-color',
                'name' => 'Game Boy Color',
                'icon' => 'fa-solid fa-ban',
            ],

            [
                'id' => 26,
                'slug' => 'game-boy',
                'name' => 'Game Boy',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 79,
                'slug' => 'snes',
                'name' => 'SNES',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 49,
                'slug' => 'nes',
                'name' => 'NES',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 55,
                'slug' => 'macintosh',
                'name' => 'Classic Macintosh',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 41,
                'slug' => 'apple-ii',
                'name' => 'Apple II',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 166,
                'slug' => 'commodore-amiga',
                'name' => 'Commodore / Amiga',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 28,
                'slug' => 'atari-7800',
                'name' => 'Atari 7800',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 31,
                'slug' => 'atari-5200',
                'name' => 'Atari 5200',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 23,
                'slug' => 'atari-2600',
                'name' => 'Atari 2600',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 22,
                'slug' => 'atari-flashback',
                'name' => 'Atari Flashback',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 25,
                'slug' => 'atari-8-bit',
                'name' => 'Atari 8-bit',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 34,
                'slug' => 'atari-st',
                'name' => 'Atari ST',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 46,
                'slug' => 'atari-lynx',
                'name' => 'Atari Lynx',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 50,
                'slug' => 'atari-xegs',
                'name' => 'Atari XEGS',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 167,
                'slug' => 'genesis',
                'name' => 'Genesis',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 107,
                'slug' => 'sega-saturn',
                'name' => 'SEGA Saturn',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 119,
                'slug' => 'sega-cd',
                'name' => 'SEGA CD',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 117,
                'slug' => 'sega-32x',
                'name' => 'SEGA 32X',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 74,
                'slug' => 'sega-master-system',
                'name' => 'SEGA Master System',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 106,
                'slug' => 'dreamcast',
                'name' => 'Dreamcast',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 111,
                'slug' => '3do',
                'name' => '3DO',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 112,
                'slug' => 'jaguar',
                'name' => 'Jaguar',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 77,
                'slug' => 'game-gear',
                'name' => 'Game Gear',
                'icon' => 'fa-solid fa-ban',
            ],
            [
                'id' => 12,
                'slug' => 'neogeo',
                'name' => 'Neo Geo',
                'icon' => 'fa-solid fa-ban',
            ],
        ]);
    }
}
