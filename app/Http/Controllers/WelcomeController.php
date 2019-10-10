<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Traits\SeoManager;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    use SEOTools, SeoManager;

    public function __invoke()
    {
        //default seo
        $this->seo()
            ->setTitle($this->getPageSeo()->title .' | tantemartje.nl')
            ->setDescription($this->getPageSeo()->description);
        //opengraph
        $this->seo()
            ->opengraph()
            ->setUrl(url()->current())
            ->addProperty('type', 'website');
        //twitter
        $this->seo()
            ->twitter()
            ->setSite('@username');

        $category = new Category();
        $product = new Product();

        $products = $product->limit(10)->get();
        $categories = $category->parents()->get();

        return view('site.welcome', compact('categories', 'products'));
    }
}
