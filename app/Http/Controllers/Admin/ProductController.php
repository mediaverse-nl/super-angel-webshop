<?php

namespace App\Http\Controllers\Admin;

use App\Detail;
use App\Http\Requests\ProductUpdateRequest;
use App\Notifications\StoreModelNotification;
use App\Notifications\UpdateModelNotification;
use App\Product;
use App\ProductType;
use App\Property;
use App\ProductVariants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $product;
    protected $property;
    protected $productVariants;
    protected $productTypes;

    public function __construct(Product $product, Property $property, ProductVariants $productVariants, ProductType $productTypes)
    {
        $this->product = $product;
        $this->productVariants = $productVariants;
        $this->property = $property;
        $this->productTypes = $productTypes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->get();

        return view('admin.product.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $properties = $this->property->get();

        return view('admin.product.create')
            ->with('properties', $properties);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(FaqStoreRequest $request)
    public function store(ProductUpdateRequest $request)
    {
        $product = $this->product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->images = $request->images;
        $product->default_price = $request->default_price;
        $product->discount = $request->discount;
        $product->category_id = $request->category_id;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;

        $product->save();

        $properties = [];
        foreach (collect($request->properties)->filter() as $property){
            $properties[] = [
                'product_id' => $product->id,
                'detail_id' => (int)$property,
            ];
        }
        $product->productDetails()->insert($properties);

        if(isset($request->more_variants))
        {
            if (isset($request->variant_options))
            {
                foreach ($this->get_combinations($request->variant_options) as $variants)
                {
                    $typeId = $product->productTypes()->insertGetId([
                        'product_id' => $product->id,
                        'price' => $product->default_price,
                        'stock' => 0,
                        'ean' => mt_rand(100000,999999),
                        'sku' => '',
                        'status' => 1,
                    ]);

                    foreach ($variants as $variant)
                    {
                        $this->productVariants->insert([
                            'product_type_id' => $typeId,
                            'detail_id' => $variant,
                        ]);
                    }
                }
            }else{
                foreach (collect($request->variants)->filter() as $key => $variant){
                    $type = $this->productTypes->find($key);
                    $type->ean = $variant['ean'];
                    $type->sku =  $variant['sku'];
                    $type->status =  $variant['status'];
                    $type->stock =  $variant['stock'];
                    $type->price =  $variant['price'];
                    $type->save();
                }
            }
        }else{
            $type = [];
            foreach ($request->variant as $key => $value){
                $type[$key] = $value;
            }
            $type['status'] =  '1';
            $type['price'] =  $product->default_price;

            $product->productTypes()->updateOrCreate(
                ['product_id' => $product->id],
                $type
            );
        }

        auth()->user()->notify(new StoreModelNotification($product));

        return redirect()->route('admin.product.edit', $product->id);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->findOrFail($id);
        $properties = $this->property->get();

        return view('admin.product.edit')
            ->with('product', $product)
            ->with('properties', $properties);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function update(FaqUpdateRequest $request, $id)
    public function update(ProductUpdateRequest $request, $id)
    {
        $product = $this->product->findOrFail($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->images = $request->images;
        $product->default_price = $request->default_price;
        $product->discount = $request->discount;
        $product->category_id = $request->category_id;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;

        $product->save();

        $product
            ->productDetails()
            ->where('product_id', '=', $product->id)
            ->delete();

        $properties = [];
        foreach (collect($request->properties)->filter() as $property){
            $properties[] = [
                'product_id' => $product->id,
                'detail_id' => (int)$property,
            ];
        }
        $product->productDetails()->insert($properties);


//        dd($request->more_variants);
        if(isset($request->more_variants))
        {
            if (isset($request->variant_options))
            {
                $product->productTypes()->delete();

                foreach ($this->get_combinations($request->variant_options) as $variants)
                {
                    $typeId = $product->productTypes()->insertGetId([
                        'product_id' => $product->id,
                        'price' => $product->default_price,
                        'stock' => 0,
                        'ean' => mt_rand(100000,999999),
                        'sku' => '',
                        'status' => 1,
                    ]);

                    foreach ($variants as $variant)
                    {
                        $this->productVariants->insert([
                            'product_type_id' => $typeId,
                            'detail_id' => $variant,
                        ]);
                    }
                }
            }else{
                foreach (collect($request->variants)->filter() as $key => $variant){
                    $type = $this->productTypes->find($key);
                    $type->ean = $variant['ean'];
                    $type->sku =  $variant['sku'];
                    $type->status =  $variant['status'];
                    $type->stock =  $variant['stock'];
                    $type->price =  $variant['price'];
                    $type->save();
                }

                $this->product->where('id', $id)
                    ->update(['default_price' => $product->productTypes()->min('price')]);
            }
        }else{
            $type = [];
            foreach ($request->variant as $key => $value){
                $type[$key] = $value;
            }
            $type['status'] =  '1';
            $type['price'] =  $product->default_price;

            if($product->hasOneProductType() == false){
                $product->productTypes()->delete();
            }
            $product->productTypes()->updateOrCreate(
                ['product_id' => $product->id],
                $type
            );
        }

        auth()->user()->notify(new UpdateModelNotification($product));

        return redirect()->route('admin.product.edit', $product->id);
    }

    function get_combinations($arrays) {
        $arrays = array_values($arrays);
        $sizeIn = sizeof($arrays);
        $size = $sizeIn > 0 ? 1 : 0;
        foreach ($arrays as $array)
            $size = $size * sizeof($array);
        for ($i = 0; $i < $size; $i ++)
        {
            $result[$i] = array();
            for ($j = 0; $j < $sizeIn; $j ++)
                array_push($result[$i], current($arrays[$j]));
            for ($j = ($sizeIn -1); $j >= 0; $j --)
            {
                if (next($arrays[$j]))
                    break;
                elseif (isset ($arrays[$j]))
                    reset($arrays[$j]);
            }
        }
        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);

        $product->delete();

        auth()->user()->notify(new DeleteModelNotification($product));

        return redirect()
            ->route('admin.product.index');
    }
}
