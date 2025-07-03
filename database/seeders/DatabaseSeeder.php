<?php

namespace Database\Seeders;

use App\Models\User;
use CategoriesTableSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            TokosTableSeeder::class,
            MenusTableSeeder::class,
        ]);
    }
}
