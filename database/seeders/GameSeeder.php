<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class  GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            [
                'rawg_id' => 462688,
                'slug' => 'steelrising',
                'name' => 'Steelrising',
                'released' => '2022-09-08',
            ],
            [
                'rawg_id' => 799265,
                'slug' => 'the-last-of-us-part-i',
                'name' => 'The Last of Us Part I',
                'released' => '2022-09-02',
            ],
            [
                'rawg_id' => 454544,
                'slug' => 'metal-hellsinger',
                'name' => 'Metal: Hellsinger',
                'released' => '2022-09-15',
            ],
            [
                'rawg_id' => 499258,
                'slug' => 'midnight-fight-express',
                'name' => 'Midnight Fight Express',
                'released' => '2022-08-23',
            ],
            [
                'rawg_id' => 619867,
                'slug' => 'soulstice-2',
                'name' => 'Soulstice',
                'released' => '2022-09-20',
            ],
            [
                'rawg_id' => 674190,
                'slug' => 'destroy-all-humans-2-reprobed',
                'name' => 'Destroy All Humans! 2 - Reprobed',
                'released' => '2022-08-29',
            ],
            [
                'rawg_id' => 558975,
                'slug' => 'splatoon-3',
                'name' => 'Splatoon 3',
                'released' => '2022-09-09',
            ],
            [
                'rawg_id' => 455513,
                'slug' => 'gloomwood',
                'name' => 'Gloomwood',
                'released' => '2022-09-06',
            ],
            [
                'rawg_id' => 759884,
                'slug' => 'deliver-us-mars',
                'name' => 'Deliver Us Mars',
                'released' => '2022-09-27',
            ],
            [
                'rawg_id' => 366091,
                'slug' => 'carx-streets',
                'name' => 'CarX Streets',
                'released' => '2022-09-08',
            ],
            [
                'rawg_id' => 351721,
                'slug' => 'legioncraft',
                'name' => 'LEGIONCRAFT',
                'released' => '2022-08-19',
            ],
            [
                'rawg_id' => 455514,
                'slug' => 'no-place-for-bravery',
                'name' => 'No Place for Bravery',
                'released' => '2022-09-22',
            ],
            [
                'rawg_id' => 753932,
                'slug' => 'jojos-bizarre-adventure-all-star-battle-r',
                'name' => 'JoJo\'s Bizarre Adventure: All-Star Battle R',
                'released' => '2022-09-02',
            ],
            [
                'rawg_id' => 751914,
                'slug' => 'valkyrie-elysium',
                'name' => 'Valkyrie Elysium',
                'released' => '2022-09-29',
            ],
            [
                'rawg_id' => 428573,
                'slug' => 'skinwalker-hunt',
                'name' => 'Skinwalker Hunt',
                'released' => '2022-08-20',
            ],
        ]);
    }
}
