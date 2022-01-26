<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Visuais',
                ],
                [
                    'id' => 2,
                    'name' => 'Sonoros',
                ],
                [
                    'id' => 3,
                    'name' => 'Fisicos',
                ],
                [
                    'id' => 4,
                    'name' => 'Glitchs',
                ],
                [
                    'id' => 5,
                    'name' => 'Financeiros',
                ],
            ]
        );

    }
}
