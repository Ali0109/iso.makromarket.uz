<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Services\CSVService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = CSVService::import_csv('departments');
        foreach ($departments as $department) {
            Department::create([
                'name' => $department[1],
            ]);
        }
    }
}
