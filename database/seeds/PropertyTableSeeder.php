<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $columns = [
            [
                'value' => 'maat',
            ],
            [
                'value' => 'kleur',
            ],
            [
                'value' => 'merk',
            ],
        ];

        foreach ($columns as $column)
            DB::table('properties')->insert($column);
    }
}
