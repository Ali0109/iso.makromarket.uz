<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_arr = [
            [
                'name' => 'admin',
                'email' => 'admin@iso.uz',
                'password' => Hash::make('admin'),
                'role_id' => 1,
            ],
            [
                'name' => 'operator-iso',
                'email' => 'operator-iso@iso.uz',
                'password' => Hash::make('operator-iso'),
                'role_id' => 2,
            ],
            [
                'name' => 'operator',
                'email' => 'operator@iso.uz',
                'password' => Hash::make('operator'),
                'role_id' => 3,
            ],
            [
                'name' => 'customer',
                'email' => 'customer@iso.uz',
                'password' => Hash::make('customer'),
                'role_id' => 4,
            ],
        ];
        DB::table('users')->insert($user_arr);
    }
}
