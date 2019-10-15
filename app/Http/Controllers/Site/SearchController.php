<?php

namespace App\Http\Controllers\Site;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function find(Request $request)
    {
//        return Event::find(2)->activity->title;

        return Product::search($request->get('q'))
//            ->with('activity')
            ->get();
    }
}
