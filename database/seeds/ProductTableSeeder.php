<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
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
                'category_id' => 1,
                'images' => null,
                'title' => 'korte broek',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'price' => 15.45,
                'stock' => 2,
                'discount' => 4,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 2,
                'images' => null,
                'title' => 'lange broek',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'price' => 55,
                'stock' => 20,
                'discount' => 0,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 3,
                'images' => null,
                'title' => 't-shirt',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'price' => 20.99,
                'stock' => 6,
                'discount' => 2,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 3,
                'images' => null,
                'title' => 't-shirt vintage',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'price' => 20.99,
                'stock' => 0,
                'discount' => 0,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 4,
                'images' => null,
                'title' => 't-shirt vintage red',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'price' => 240.99,
                'stock' => 0,
                'discount' => 0,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 4,
                'images' => null,
                'title' => 't-shirt vintage blue',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'price' => 224.99,
                'stock' => 0,
                'discount' => 0,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 4,
                'images' => null,
                'title' => 't-shirt vintage grijs',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'price' => 214,
                'stock' => 0,
                'discount' => 35,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 4,
                'images' => null,
                'title' => 't-shirt grijs',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'price' => 22,
                'stock' => 0,
                'discount' => 10,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 4,
                'images' => null,
                'title' => 't-shirt asd',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'price' => 22,
                'stock' => 0,
                'discount' => 10,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 4,
                'images' => null,
                'title' => 't-shirt asfgefae',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'price' => 22,
                'stock' => 0,
                'discount' => 10,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 4,
                'images' => null,
                'title' => 'broek htrthrth',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'price' => 22,
                'stock' => 0,
                'discount' => 10,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
        ];

        foreach ($columns as $column)
            DB::table('products')->insert($column);
    }
}
