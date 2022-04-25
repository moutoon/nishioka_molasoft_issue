<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'id' => 1,
            'date' => 20220412,
            'start' => 1800,
            'end' => 2100,
            'venue' => '甲子園',
            'genre' => '野球',
        ]);
        DB::table('games')->insert([
            'id' => 2,
            'date' => 20220420,
            'start' => 1800,
            'end' => 2100,
            'venue' => '京セラドーム',
            'genre' => '野球',
        ]);
        DB::table('games')->insert([
            'id' => 3,
            'date' => 20220427,
            'start' => 1830,
            'end' => 2200,
            'venue' => 'ヤマハスタジアム',
            'genre' => 'サッカー',
        ]);
        DB::table('games')->insert([
            'id' => 4,
            'date' => 20220428,
            'start' => 1830,
            'end' => 2100,
            'venue' => 'ヤマハスタジアム',
            'genre' => 'サッカー',
        ]);
        DB::table('games')->insert([
            'id' => 5,
            'date' => 20220430,
            'start' => 1200,
            'end' => 1600,
            'venue' => '味の素スタジアム',
            'genre' => 'ラグビー',
        ]);
        DB::table('games')->insert([
            'id' => 6,
            'date' => 20220501,
            'start' => 1400,
            'end' => 1700,
            'venue' => '東京ドーム',
            'genre' => '野球',
        ]);
        DB::table('games')->insert([
            'id' => 7,
            'date' => 20220504,
            'start' => 1400,
            'end' => 1700,
            'venue' => 'マツダスタジアム',
            'genre' => '野球',
        ]);
        DB::table('games')->insert([
            'id' => 8,
            'date' => 20220508,
            'start' => 1800,
            'end' => 2200,
            'venue' => '甲子園',
            'genre' => '野球',
        ]);
        DB::table('games')->insert([
            'id' => 9,
            'date' => 20220512,
            'start' => 1600,
            'end' => 2100,
            'venue' => '味の素スタジアム',
            'genre' => 'ラグビー',
        ]);
        DB::table('games')->insert([
            'id' => 10,
            'date' => 20220515,
            'start' => 1800,
            'end' => 2200,
            'venue' => 'ヤマハスタジアム',
            'genre' => 'サッカー',
        ]);
    }
}
