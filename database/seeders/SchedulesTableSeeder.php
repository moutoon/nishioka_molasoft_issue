<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            'id' => 1,
            'date' => 20220401,
            'venue' => Arr::random(['京セラドーム', '東京ドーム', '福岡PayPayドーム', '札幌ドーム']),
            'start' => 1000,
            'end' => 1300,
        ]);
        DB::table('schedules')->insert([
            'id' => 2,
            'date' => 20220408,
            'venue' => Arr::random(['京セラドーム', '東京ドーム', '福岡PayPayドーム', '札幌ドーム']),
            'start' => 1300,
            'end' => 1800,
        ]);
        DB::table('schedules')->insert([
            'id' => 3,
            'date' => 20220415,
            'venue' => Arr::random(['京セラドーム', '東京ドーム', '福岡PayPayドーム', '札幌ドーム']),
            'start' => 1200,
            'end' => 1800,
        ]);
        DB::table('schedules')->insert([
            'id' => 4,
            'date' => 20220420,
            'venue' => Arr::random(['京セラドーム', '東京ドーム', '福岡PayPayドーム', '札幌ドーム']),
            'start' => 1000,
            'end' => 1300,
        ]);
        DB::table('schedules')->insert([
            'id' => 5,
            'date' => 20220424,
            'venue' => Arr::random(['京セラドーム', '東京ドーム', '福岡PayPayドーム', '札幌ドーム']),
            'start' => 1000,
            'end' => 1300,
        ]);
        DB::table('schedules')->insert([
            'id' => 6,
            'date' => 20220428,
            'venue' => Arr::random(['京セラドーム', '東京ドーム', '福岡PayPayドーム', '札幌ドーム']),
            'start' => 1000,
            'end' => 1300,
        ]);
        DB::table('schedules')->insert([
            'id' => 7,
            'date' => 20220429,
            'venue' => Arr::random(['京セラドーム', '東京ドーム', '福岡PayPayドーム', '札幌ドーム']),
            'start' => 1000,
            'end' => 1800,
        ]);
        DB::table('schedules')->insert([
            'id' => 8,
            'date' => 20220430,
            'venue' => Arr::random(['京セラドーム', '東京ドーム', '福岡PayPayドーム', '札幌ドーム']),
            'start' => 1800,
            'end' => 2000,
        ]);
        DB::table('schedules')->insert([
            'id' => 9,
            'date' => 20220501,
            'venue' => Arr::random(['京セラドーム', '東京ドーム', '福岡PayPayドーム', '札幌ドーム']),
            'start' => 1200,
            'end' => 1800,
        ]);
        DB::table('schedules')->insert([
            'id' => 10,
            'date' => 20220505,
            'venue' => Arr::random(['京セラドーム', '東京ドーム', '福岡PayPayドーム', '札幌ドーム']),
            'start' => 1000,
            'end' => 1300,
        ]);
    }
}
