<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        return view('site.shopping-cart');
    }

    public function create()
    {
        return view('site.create-order');
    }
}
