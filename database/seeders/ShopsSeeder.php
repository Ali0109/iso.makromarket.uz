<?php

namespace Database\Seeders;


use App\Models\Shop;
use App\Services\CSVService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = CSVService::import_csv('stores');

        foreach ($shops as $shop) {
            $name = explode(" ", $shop[2])[1];

            $region_id = "";
            if($name == "ТОШ.") {
                $region_id = 1;
            } elseif($name == "АНД.") {
                $region_id = 4;
            } elseif($name == "НАМ.") {
                $region_id = 9;
            } elseif($name == "ФАР.") {
                $region_id = 3;
            } elseif($name == "САМ.") {
                $region_id = 2;
            } elseif($name == "НАВОИ") {
                $region_id = 8;
            } elseif($name == "БУХ.") {
                $region_id = 5;
            } elseif($name == "ДЖИЗЗАХ") {
                $region_id = 6;
            } elseif($name == "КАШ.") {
                $region_id = 7;
            }

            Shop::create([
                'name' => $shop[2],
                'code' => $shop[1],
                'region_id' => $region_id,
            ]);
        }
    }
}
