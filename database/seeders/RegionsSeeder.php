<?php

namespace Database\Seeders;


use App\Models\Region;
use App\Services\CSVService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = CSVService::import_csv('regions');

        foreach ($regions as $region) {
            Region::create([
                'name' => $region[1]
            ]);
        }
    }
}
