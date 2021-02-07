<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $faker = Faker::create();

        foreach (range(1, 20) as $index){
            DB::table('blogs')->insert([
                'title'=>$faker->name,
                'details'=>$faker->text(400)
            ]);
        }
    }
}
