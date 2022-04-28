<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchedulesMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules_members')->insert([
            'scheduleId' => 1,
            'memberId' => 1,
        ]);
        DB::table('schedules_members')->insert([
            'scheduleId' => 1,
            'memberId' => 2,
        ]);
        DB::table('schedules_members')->insert([
            'scheduleId' => 1,
            'memberId' => 3,
        ]);
        DB::table('schedules_members')->insert([
            'scheduleId' => 2,
            'memberId' => 1,
        ]);
        DB::table('schedules_members')->insert([
            'scheduleId' => 2,
            'memberId' => 2,
        ]);
        DB::table('schedules_members')->insert([
            'scheduleId' => 2,
            'memberId' => 3,
        ]);
        DB::table('schedules_members')->insert([
            'scheduleId' => 3,
            'memberId' => 1,
        ]);
        DB::table('schedules_members')->insert([
            'scheduleId' => 3,
            'memberId' => 2,
        ]);
        DB::table('schedules_members')->insert([
            'scheduleId' => 3,
            'memberId' => 3,
        ]);

    }
}
