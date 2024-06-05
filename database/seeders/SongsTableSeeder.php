<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('songs')->insert([
            [
                'title' => '100 doezoe cash',
                'singer' => 'Lijpe',
                'release_date' => '2004',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Schakelen',
                'singer' => 'Boef',
                'release_date' => '2005',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Probleem',
                'singer' => 'Boef',
                'release_date' => '2006',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Nooit thuis',
                'singer' => 'Ashafar',
                'release_date' => '2007',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Panamera',
                'singer' => 'Ashafar',
                'release_date' => '2008',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Het leven is een trip',
                'singer' => 'Josylvio',
                'release_date' => '2009',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
