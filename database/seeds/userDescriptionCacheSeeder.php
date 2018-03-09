<?php

use Illuminate\Database\Seeder;
use App\userDescriptionCache;

class userDescriptionCacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

    userDescriptionCache::truncate();

        // $faker = \Faker\Factory::create();

        // for ($i = 0; $i < 50; $i++) {
        //     userDescriptionCache::create([
        //         'id' => $faker->regexify("^[a-zA-Z0-9\_]{4,15}$"),
        //         'descriptionHTML' => $faker->randomHtml(2,3),
        //     ]);
        // }
    }
}
