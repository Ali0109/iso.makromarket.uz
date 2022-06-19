<?php

namespace Database\Seeders;

use App\Models\Problem;
use App\Services\CSVService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProblemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $problems = CSVService::import_csv('disparities');

        foreach ($problems as $problem) {
            Problem::create([
                'name' => $problem[1],
                'problem_category_id' => $problem[5],
            ]);
        }
    }
}
