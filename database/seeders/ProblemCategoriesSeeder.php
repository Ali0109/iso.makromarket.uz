<?php

namespace Database\Seeders;

use App\Models\ProblemCategory;
use App\Services\CSVService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProblemCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $problem_categories = CSVService::import_csv('problems');

        foreach ($problem_categories as $p_c) {
            ProblemCategory::create([
                'name' => $p_c[1],
            ]);
        }
    }
}
