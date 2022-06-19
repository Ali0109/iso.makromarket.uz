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
        // \App\Models\User::factory(10)->create();
        $this->call(RegionsSeeder::class);
        $this->call(ShopsSeeder::class);
        $this->call(ConfigsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ProblemCategoriesSeeder::class);
        $this->call(ProblemsSeeder::class);
        $this->call(DepartmentsSeeder::class);
    }
}
