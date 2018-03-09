<?php

use Illuminate\Database\Seeder;
use App\userInfoCache;

class userInfoCacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        userInfoCache::truncate();

        // $faker = \Faker\Factory::create();

        // for ($i = 0; $i < 50; $i++) {
        //     userInfoCache::create([
        //         'id' => $faker->regexify("^[a-zA-Z0-9\_]{4,15}$"),
        //         'nickname' => $faker->name,
        //         'location' => $faker->country,
        //         'website' => $faker->url,
        //         'origin' =>  $faker->freeEmailDomain,
        //         'icon_id' => $faker->regexify("^[a-zA-Z0-9]{7}$"),
        //         'icon_type' => $faker->randomElement(["png", "jpg"]),
        //     ]);
        // }

    }
}
