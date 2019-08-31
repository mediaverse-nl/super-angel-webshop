<?php

namespace App\Http\Controllers\Site;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function show($id)
    {
        return view('site.product');
    }
}
