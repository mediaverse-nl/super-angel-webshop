<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
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
                'id' => 1,
                'value' => 'Vrouwen',
                'category_id' => null,
                'order' => 1
            ],
            [
                'id' => 2,
                'value' => 'Baby',
                'category_id' => null,
                'order' => 3
            ],
            [
                'id' => 3,
                'value' => 'Heren',
                'category_id' => null,
                'order' => 4
            ],
            [
                'id' => 4,
                'value' => 'Accessoires',
                'category_id' => null,
                'order' => 2
            ],
            [
                'value' => 'Riem',
                'category_id' => 4,
                'order' => 2
            ],
            [
                'value' => 'Rokken',
                'category_id' => 1,
                'order' => 2
            ],
            [
                'value' => 'Broeken',
                'category_id' => 3,
                'order' => 2
            ],
            [
                'value' => 'Truien',
                'category_id' => 3,
                'order' => 2
            ],
            [
                'value' => 'Truien',
                'category_id' => 1,
                'order' => 2
            ],
            [
                'value' => 'Pyjamapakjes',
                'category_id' => 2,
                'order' => 2
            ],
            [
                'value' => 'Jumpsuit ',
                'category_id' => 2,
                'order' => 2
            ],
            [
                'value' => 'Broeken',
                'category_id' => 1,
                'order' => 2
            ]
        ];

        foreach ($columns as $column)
            DB::table('category')->insert($column);
    }
}
