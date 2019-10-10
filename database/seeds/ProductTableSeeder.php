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
                'default_price' => "25.20",
//                'stock' => 2,
//                'discount' => 4,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 2,
                'images' => null,
                'title' => 'lange broek',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'default_price' => "22.20",
//                'stock' => 20,
//                'discount' => 0,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 3,
                'images' => null,
                'title' => 't-shirt',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'default_price' => "32.25",
//                'stock' => 6,
//                'discount' => 2,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 3,
                'images' => null,
                'title' => 't-shirt vintage',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'default_price' => "100",
//                'stock' => 0,
//                'discount' => 0,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 4,
                'images' => null,
                'title' => 't-shirt vintage red',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'default_price' => "300.10",
//                'stock' => 0,
//                'discount' => 0,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 4,
                'images' => null,
                'title' => 't-shirt vintage blue',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'default_price' => "5",
//                'stock' => 0,
//                'discount' => 0,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 4,
                'images' => null,
                'title' => 't-shirt vintage grijs',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'default_price' => "5.5",
//                'stock' => 0,
//                'discount' => 35,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 4,
                'images' => null,
                'title' => 't-shirt grijs',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'default_price' => "2.05",
//                'stock' => 0,
//                'discount' => 10,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 4,
                'images' => null,
                'title' => 't-shirt asd',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'default_price' => "22.20",
//                'stock' => 0,
//                'discount' => 10,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 4,
                'images' => null,
                'title' => 't-shirt asfgefae',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'default_price' => "22.20",
//                'stock' => 0,
//                'discount' => 10,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
            [
                'category_id' => 4,
                'images' => null,
                'title' => 'broek htrthrth',
                'description' => 'ads iasdja nm sdoma sdeff sdfsdf ',
                'default_price' => "22.20",
//                'stock' => 0,
//                'discount' => 10,
                'created_at' => \Carbon\Carbon::now()->day(-random_int(1, 90)),
            ],
        ];

        foreach ($columns as $column)
            DB::table('products')->insert($column);
    }
}
