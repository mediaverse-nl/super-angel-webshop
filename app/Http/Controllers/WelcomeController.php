<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $category = new Category();
        $product = new Product();

        $products = $product->limit(10)->get();
        $categories = $category->parents()->get();

        return view('site.welcome', compact('categories', 'products'));
    }
}
