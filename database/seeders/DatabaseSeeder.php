<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MembersTableSeeder::class,
            TeamsTableSeeder::class,
            RanksTableSeeder::class,
            ArticlesTableSeeder::class,
            AccountsTableSeeder::class,
            LikesTableSeeder::class,
        ]);
    }
}
