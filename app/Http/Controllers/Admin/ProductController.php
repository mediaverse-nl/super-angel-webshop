<?php

namespace App\Http\Controllers\Admin;

use App\Detail;
use App\Notifications\StoreModelNotification;
use App\Notifications\UpdateModelNotification;
use App\Product;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $product;
    protected $property;

    public function __construct(Product $product, Property $property)
    {
        $this->product = $product;
        $this->property = $property;
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
    public function store(Request $request)
    {
        $product = $this->product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->images = $request->images;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->stock = $request->stock;
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

        auth()->user()->notify(new StoreModelNotification($product));

        return redirect()->route('admin.product.index');
    }

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
    public function update(Request $request, $id)
    {
        $product = $this->product->findOrFail($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->images = $request->images;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;

        $product->save();

        $properties = [];

        $product
            ->productDetails()
            ->where('product_id', '=', $product->id)
            ->delete();

//        dd(collect($request->properties)->filter());

        foreach (collect($request->properties)->filter() as $property){
            $properties[] = [
                'product_id' => $product->id,
                'detail_id' => (int)$property,
            ];
        }

        $product->productDetails()->insert($properties);

        auth()->user()->notify(new UpdateModelNotification($product));

        return redirect()->route('admin.product.edit', $product->id);
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
