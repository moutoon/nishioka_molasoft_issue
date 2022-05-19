<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Like;
use App\Models\User;
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
        ]);

        User::factory(30)->create()->each(function ($user) {
            Article::factory(random_int(1, 3))->create(['user_id' => $user->id]);
        });
        Like::factory(30)->create();
    }
}
