<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $columns = [];

        $products = new \App\Product();

        foreach ($products->get() as $product)
        {
            foreach ($this->properties() as $k => $v ) {
                $columns[] = [
                    'product_id' => $product->id,
                    'detail_id' => $v,
                ];
            }
        }

        foreach ($columns as $column)
            DB::table('product_details')->insert($column);
    }


    public function properties()
    {
        $properties = new \App\Property();

        $columns = [];

        foreach ($properties->get() as $property)
        {
            $columns[] = array_rand(collect($property->details->pluck('id', 'id'))->toArray(), 1);
        }

        return $columns;
    }
}
