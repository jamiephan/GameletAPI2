<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(userInfoCacheSeeder::class);
        $this->call(userDescriptionCacheSeeder::class);
        $this->call(userFriendlistCacheSeeder::class);
    }
}
