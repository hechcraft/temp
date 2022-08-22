<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenresSeeder::class);
        $this->call(PlatformsSeeder::class);
        $this->call(StoreSeeder::class);
    }
}
