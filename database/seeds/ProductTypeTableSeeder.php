<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = new \App\Product();
        $columns = [];

        foreach ($products->get() as $product)
        {
            $price = number_format((int)(random_int(5, 120).'.'.random_int(0, 99)), random_int(0, 2));
            $this->command->line('test test'. $price);

            $productDetail = $product->productDetails()->get()->random();
            $properties = $productDetail->detail->property->details;

            $randomPropertyIds = array_random($properties->pluck('id')->toArray(), rand(0, $productDetail->detail->property->details->count()));

            $this->command->comment('count ' .$properties->count());
            $this->command->comment('taken ' .count($randomPropertyIds));
            $this->command->comment('items ' .json_encode($randomPropertyIds));

            foreach ($randomPropertyIds as $v ) {
                $this->command->comment($v);
                $columns[] = [
                    'product_id' => $product->id,
                    'price' => $price,
//                    'discount' => $price / 100 * 10,
                    'sku' => str_random(10),
                    'ean' => str_random(5),
                    'stock' => random_int(0, 30),
                ];
            }

//            Product::where('id', '=', $product->id)->update(['property_id' => $productDetail->detail->property_id]);
        }

        foreach ($columns as $column)
            DB::table('product_types')->insert($column);
    }
}
