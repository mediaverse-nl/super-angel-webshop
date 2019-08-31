<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailTableSeeder extends Seeder
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
                'property_id' => 1,
                'value' => 'S',
            ],
            [
                'property_id' => 1,
                'value' => 'XS',
            ],
            [
                'property_id' => 1,
                'value' => 'XL',
            ],
            [
                'property_id' => 1,
                'value' => 'L',
            ],
            [
                'property_id' => 1,
                'value' => 'M',
            ],
            [
                'property_id' => 1,
                'value' => 'XXL',
            ],
            [
                'property_id' => 1,
                'value' => 'XXXL',
            ],
            [
                'property_id' => 2,
                'value' => 'Rood',
            ],
            [
                'property_id' => 2,
                'value' => 'Groen',
            ],
            [
                'property_id' => 2,
                'value' => 'Blauw',
            ],
            [
                'property_id' => 2,
                'value' => 'Geel',
            ],
            [
                'property_id' => 2,
                'value' => 'Zwart',
            ],
            [
                'property_id' => 2,
                'value' => 'Zwart/Wit',
            ],
            [
                'property_id' => 2,
                'value' => 'Wit',
            ],
            [
                'property_id' => 2,
                'value' => 'Geel/Rood',
            ],
            [
                'property_id' => 3,
                'value' => 'Jack & Jones',
            ],

            [
                'property_id' => 3,
                'value' => 'Balenciaga',
            ],
            [
                'property_id' => 3,
                'value' => 'BOSS',
            ],
            [
                'property_id' => 3,
                'value' => 'Crocs',
            ],
            [
                'property_id' => 3,
                'value' => 'Diesel',
            ],


        ];

        foreach ($columns as $column)
            DB::table('details')->insert($column);
    }
}
