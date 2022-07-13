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
                'name' => 'Steam',
                'slug' => 'steam',
                'domain' => 'store.steampowered.com',
            ],
            [
                'id' => 3,
                "name" => "PlayStation Store",
                "domain" => "store.playstation.com",
                "slug" => "playstation-store"
            ],
            [
                'id' => 2,
                "name" => "Xbox Store",
                "domain" => "microsoft.com",
                "slug" => "xbox-store",
            ],
            [
                "id" => 5,
                "name" => "GOG",
                "domain" => "gog.com",
                "slug" => "gog",
            ],
            [
                "id" => 6,
                "name" => "Nintendo Store",
                "domain" => "nintendo.com",
                "slug" => "nintendo",
            ],
            [
                "id" => 11,
                "name" => "Epic Games",
                "domain" => "epicgames.com",
                "slug" => "epic-games",
            ]
        ]);
    }
}
