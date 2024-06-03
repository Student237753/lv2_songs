<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bands = [
            [
                'name' => 'The Rolling Stones',
                'genre' => 'Rock',
                'founded' => 1962,
                'active_till' => 'Heden',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'The Beatles',
                'genre' => 'Rock',
                'founded' => 1960,
                'active_till' => '1970',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nirvana',
                'genre' => 'Grunge',
                'founded' => 1987,
                'active_till' => '1994',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('bands')->insert($bands);
    }
}
