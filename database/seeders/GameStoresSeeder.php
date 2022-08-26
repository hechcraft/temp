<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameStoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game_stores')->insert([
            [

                'game_id' => 1,
                'store_id' => 1,
                'store_link' => 'https://store.steampowered.com/app/1283400/Steelrising/',
            ],
            [
                'game_id' => 1,
                'store_id' => 5,
                'store_link' => 'https://www.gog.com/en/game/steelrising',
            ],
            [
                'game_id' => 2,
                'store_id' => 3,
                'store_link' => 'https://store.playstation.com/en-us/product/UP9000-PPSA03396_00-THELASTOFUSPART1',
            ],
            [
                'game_id' => 3,
                'store_id' => 1,
                'store_link' => 'https://store.steampowered.com/app/1061910/Metal_Hellsinger/',
            ],
            [
                'game_id' => 4,
                'store_id' => 5,
                'store_link' => 'https://www.gog.com/fr/game/midnight_fight_express',
            ],
            [
                'game_id' => 4,
                'store_id' => 1,
                'store_link' => 'https://store.steampowered.com/app/1390410/Midnight_Fight_Express/',
            ],
            [
                'game_id' => 5,
                'store_id' => 1,
                'store_link' => 'https://store.steampowered.com/app/1602080/Soulstice/',
            ],
            [
                'game_id' => 6,
                'store_id' => 5,
                'store_link' => 'https://www.gog.com/fr/game/destroy_all_humans_2_reprobed',
            ],
            [
                'game_id' => 6,
                'store_id' => 1,
                'store_link' => 'https://store.steampowered.com/app/1266700',
            ],
            [
                'game_id' => 6,
                'store_id' => 2,
                'store_link' => 'https://www.microsoft.com/en-us/p/destroy-all-humans-2-reprobed/9njgm9hcclph?activetab=pivot:overviewtab',
            ],
            [
                'game_id' => 6,
                'store_id' => 3,
                'store_link' => 'https://store.playstation.com/en-us/concept/10003868/',
            ],
            [
                'game_id' => 7,
                'store_id' => 6,
                'store_link' => 'https://www.nintendo.com/games/detail/splatoon-3-switch/',
            ],
            [
                'game_id' => 8,
                'store_id' => 1,
                'store_link' => 'https://store.steampowered.com/app/1150760/Gloomwood/',
            ],
            [
                'game_id' => 8,
                'store_id' => 5,
                'store_link' => 'https://www.gog.com/game/gloomwood',
            ],
            [
                'game_id' => 9,
                'store_id' => 3,
                'store_link' => 'https://store.playstation.com/en-us/product/UP2514-PPSA04520_00-5569621071826587',
            ],
            [
                'game_id' => 9,
                'store_id' => 11,
                'store_link' => 'https://store.epicgames.com/p/deliver-us-mars',
            ],
            [
                'game_id' => 9,
                'store_id' => 1,
                'store_link' => 'https://store.steampowered.com/app/1345890/Deliver_Us_Mars/',
            ],
            [
                'game_id' => 10,
                'store_id' => 1,
                'store_link' => 'https://store.steampowered.com/app/1114150/',
            ],
            [
                'game_id' => 11,
                'store_id' => 1,
                'store_link' => 'https://store.steampowered.com/app/1100930/',
            ],
            [
                'game_id' => 12,
                'store_id' => 1,
                'store_link' => 'https://store.steampowered.com/app/1039100/No_Place_for_Bravery/',
            ],
            [
                'game_id' => 12,
                'store_id' => 5,
                'store_link' => 'https://www.gog.com/game/no_place_for_bravery',
            ],
            [
                'game_id' => 13,
                'store_id' => 1,
                'store_link' => 'https://store.steampowered.com/app/1372110/',
            ],
            [
                'game_id' => 13,
                'store_id' => 3,
                'store_link' => 'https://store.playstation.com/en-us/concept/10001302/',
            ],
            [
                'game_id' => 14,
                'store_id' => 3,
                'store_link' => 'https://store.playstation.com/en-us/concept/10004428/',
            ],
            [
                'game_id' => 14,
                'store_id' => 1,
                'store_link' => 'https://store.steampowered.com/app/1963210/VALKYRIE_ELYSIUM/',
            ],
            [
                'game_id' => 15,
                'store_id' => 1,
                'store_link' => 'https://store.steampowered.com/app/993110/',
            ],
        ]);
    }
}
