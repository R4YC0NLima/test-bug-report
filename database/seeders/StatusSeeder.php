<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert(
            [
                [
                    'id'    => 1,
                    'name'  => 'Em aberto',
                    'color' => 'blue'
                ],
                [
                    'id'    => 2,
                    'name'  => 'Em correção',
                    'color' => 'yellow'
                ],
                [
                    'id'    => 3,
                    'name'  => 'Corrígido',
                    'color' => 'green'
                ],
            ]
        );

    }
}
