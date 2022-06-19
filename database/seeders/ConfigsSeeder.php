<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_arr = [
            [
                'key' => 'role-admin',
                'value' => 1
            ],
            [
                'key' => 'role-operator-iso',
                'value' => 2
            ],
            [
                'key' => 'role-od-stuff',
                'value' => 3
            ],
            [
                'key' => 'role-customer',
                'value' => 4
            ],
        ];
        DB::table('config')->insert($role_arr);
    }
}
