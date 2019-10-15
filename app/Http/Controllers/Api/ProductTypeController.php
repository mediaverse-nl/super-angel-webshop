<?php

namespace App\Http\Controllers\Api;

use App\ProductType;
use App\Http\Controllers\Controller;

class ProductTypeController extends Controller
{
    public function get($productId){
        $data = request()->input('data');

        $searchableItems = !empty($data) ? explode(',', $data) : null;

        $productTypes = new ProductType();

        $response = $productTypes
            ->with('productVariants.detail')
            ->where('product_id', '=', $productId)
            ->where('status', '=', 1)
            ->where(function($sub) use ($searchableItems, $data){
                if (isset($data))
                    foreach ($searchableItems as $i){
                        $sub->whereHas('productVariants.detail', function ($q) use ($i) {
                            $q->where('value', '=', $i);
                        });
                    }
            })->orderBy('stock')->get();

        $array = [];

        foreach ($response as $variants){
            foreach (collect($variants->productVariants)->sortByDesc('stock') as $i){
                $array[$i->detail->property->value][$i->detail->value] = $i->productType->stock;
            }
        }

        return response()
            ->json([
                'filter_options' => $array,
                'product_count' => $response->count(),
                'product_id' => $response->count() >= 1 ? encrypt($response->first()->id) : null,
                'product_variant' => $response->count() >= 1 ? $response->first() : null,
            ]);
    }
}
