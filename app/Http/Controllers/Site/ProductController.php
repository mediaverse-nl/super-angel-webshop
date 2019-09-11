<?php

namespace App\Http\Controllers\Site;

use App\Product;
use App\Traits\SeoManager;
use Artesaos\SEOTools\Traits\SEOTools;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    use SEOTools, SeoManager;

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function show($title, $id)
    {
        $product = $this->product->findOrFail($id);

        if ($product->urlTitle !== $title){
//            dd($product->urlTitle, $title);
            return redirect()->route('site.product.show', [$product->urlTitle, $product->id]);
        }

        //default seo
        $this->seo()
            ->addImages($product->thumbnail())
            ->setTitle($product->title .' | tantemartje.nl')
            ->setDescription(!empty($product->meta_description) ? $product->meta_description : $product->description);
        //opengraph
        $this->seo()
            ->opengraph()
            ->setUrl(url()->current())
            ->addProperty('type', 'website');
        //twitter
        $this->seo()
            ->twitter()
            ->setSite('@username');

        return view('site.product', compact('product'));
    }
}
