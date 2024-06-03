<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('songs')->insert([
            [
                'title' => '100 doezoe cash',
                'singer' => 'Lijpe',
            ],
            [
                'title' => 'Schakelen',
                'singer' => 'Boef',
            ],
            [
                'title' => 'Probleem',
                'singer' => 'Boef',
            ],
            [
                'title' => 'Nooit thuis',
                'singer' => 'Ashafar',
            ],
            [
                'title' => 'Panamera',
                'singer' => 'Ashafar',
            ],
            [
                'title' => 'karam',
                'singer' => 'karam',
            ],
        ]);
    }
}
