<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('teams')->insert([
                'id' => $i,
                'name' => 'name' . $i,
                'explain' => '説明' . $i,
                'genre' => Arr::random(['サッカ', '野球', 'バンド', 'ラグビー']),
                'fee' => Arr::random([500, 1000, 2000, 5000]),
                'rank' => Arr::random([1, 2, 3, 4]),
            ]);

        }
    }
}
