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
        //for tests
        $this->call(GameSeeder::class);
        $this->call(GameGenresSeeder::class);
        $this->call(GamePlatformsSeeder::class);
        $this->call(GameStoresSeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserTrackingSeeder::class);

    }
}
