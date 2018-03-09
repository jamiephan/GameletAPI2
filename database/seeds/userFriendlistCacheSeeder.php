<?php

use Illuminate\Database\Seeder;
use App\userFriendListCache;

class userFriendlistCacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        userFriendListCache::truncate();

        // $faker = \Faker\Factory::create();

        // for ($i = 0; $i < 50; $i++) {
        //     userFriendListCache::create([
        //         'id' => $faker->regexify("^[a-zA-Z0-9\_]{4,15}$"),
        //         'friendlist' => serialize(
        //             (function($faker) {
        //                 $arr = [];
        //                 for ($i = 0; $i < 50; $i++) {
        //                     $arr[] = $faker->regexify("^[a-zA-Z0-9\_]{4,15}$");
        //                 }
        //                 return $arr;
        //             })($faker)
        //         ),
        //     ]);
        // }
    }
}
