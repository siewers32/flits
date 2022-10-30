<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cameras = DB::table('cameras')->select('id', 'max_speed')->get()->toArray();
        $licenses = DB::table('licenses')->select('license')->get()->toArray();
        $faker = \Faker\Factory::create('nl_NL');
        $today = \Carbon\Carbon::now();
        for($i=0; $i<30; $i++) {
            $camera = $cameras[array_rand($cameras)];
            DB::table('flashes')->insert([
                'camera_id' => $camera->id,
                //'camera_id' => 1,
                'license' => $licenses[array_rand($licenses)]->license,
                //'license' => '00-00-ZZ',
                'speed' => $camera->max_speed + 0.1 * ($camera->max_speed) + (random_int(0,99)/100) * $camera->max_speed,
                //'speed' => 50,
                'expdate' => $today->subDays(random_int(60,120)),
                //'expdate' => \Carbon\Carbon::now(),
            ]);
        }
    }
}