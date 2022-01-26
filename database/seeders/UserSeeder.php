<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name'      => 'Admin',
                    'email'     => 'admin@gmail.com',
                    'admin'     => 1,
                    'password'  => Hash::make('123456789')
                ],
                [
                    'name'      => 'Raycon Lima',
                    'email'     => 'raycon@gmail.com',
                    'admin'     => 0,
                    'password'  => Hash::make('123456789')
                ]
            ]
        );
    }
}
