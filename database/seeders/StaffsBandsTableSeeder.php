<?php

namespace Database\Seeders;

use App\Models\StaffBand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffsBandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StaffBand::factory()->count(20)->create();
    }
}
