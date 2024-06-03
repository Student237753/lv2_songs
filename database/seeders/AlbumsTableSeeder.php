<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albums = [
            [
                'name' => 'Sticky Fingers',
                'year' => 1971,
                'times_sold' => 5000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Abbey Road',
                'year' => 1969,
                'times_sold' => 12000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nevermind',
                'year' => 1991,
                'times_sold' => 30000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sgt. Pepper\'s Lonely Hearts Club Band',
                'year' => 1967,
                'times_sold' => 32000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Let It Bleed',
                'year' => 1969,
                'times_sold' => 2500000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('albums')->insert($albums);
    }
}
