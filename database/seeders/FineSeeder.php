<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fines = [
            '50' => 14,
            '80' => 12,
            '100' => 11,
        ];
        foreach($fines as $speed => $perc) {
            for($i = 0; $i <= 40; $i = $i + 5) {
                for($x = 1; $x <= 5; $x ++) {
                    $fine =  ($i + 1) * $perc;
                    if($i <= 1) {
                        $fine = $fine + 20;
                    }
                    DB::table('fines')->insert([
                        'speed_limit' => $speed,
                        'speed_excess' => $i + $x,
                        'fine' => $fine,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                    ]);
                }
            }
        }


    }
}
// $table->integer('speed_limit');
// $table->integer('speed_excess');
// $table->integer('fine');