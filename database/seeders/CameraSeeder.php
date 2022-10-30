<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CameraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('nl_NL');
        for($i=0; $i<30; $i++) {
            DB::table('cameras')->insert([
                'address' => $faker->streetAddress(),
                'city' => $faker->city(),
                'max_speed' => $faker->randomElement([50,80,100]),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
