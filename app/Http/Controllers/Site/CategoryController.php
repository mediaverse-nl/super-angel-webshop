<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Product;
use App\ProductType;
use App\Traits\SeoManager;
use Artesaos\SEOTools\Traits\SEOTools;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    use SEOTools, SeoManager;

    protected $category;
    protected $product;
    protected $productType;

    public function __construct(Category $category, Product $product, ProductType $productType)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productType = $productType;
    }

    public function index()
    {
        $categories = $this->category->parents()->get();

        return view('site.categories', compact('categories'));
    }

    public function show($id)
    {
        $category = $this->category->findOrFail($id);

        //default seo
        $this->seo()
            ->setTitle($category->value .' | site.nl')
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

        $query = collect(request()->query)->toArray();

        $queryWithOutFilter = array_except($query, ['filter']);

        if (!Input::has('filter') && !empty($queryWithOutFilter)){
            $encrypted = Crypt::encryptString(json_encode($query));
            return redirect(
                route('site.category.show', $id).'?filter='.$encrypted
            );
        }

        if (Input::has('filter') ){
            try {
                $decrypted = Crypt::decryptString(Input::get('filter'));
            } catch (DecryptException $e) {
                return redirect(
                    route('site.category.show', $id)
                );
            }

            $filter = json_decode($decrypted, true);

            if (empty(array_filter($filter))) {
                return redirect(
                    route('site.category.show', $id)
                );
            }
        }else{
            $filter = [];
        }

        $categories = $this->category->where('category_id', '=', null)->get();

        $baseProducts = $this->product->where('category_id', '=', $id)->get();

        $baseProperties = $this->productType
            ->whereHas('product', function ($q) use ($id){
                $q->where('category_id', '=', $id);
            })
            ->where('status', '=', 1)
            ->leftJoin('product_variants', 'product_types.id', '=', 'product_variants.product_type_id')
            ->leftJoin('details', 'product_variants.detail_id', '=', 'details.id')
            ->leftJoin('properties', 'details.property_id', '=', 'properties.id')
            ->select(
                '*',
                DB::raw('COUNT(details.value) as d_count'),
                DB::raw('details.value as d_value'),
                DB::raw('properties.value as p_value')
            )
            ->where('details.value', '!=', 'null')
            ->groupBy('details.value')
            ->groupBy('properties.value')
            ->get();

        $products =  $this->productType
            ->where('status', '=', 1)
            ->whereHas('product', function ($q) use ($id, $filter){
                $q->where('category_id', '=', $id);

//                if (isset($filter['filterOrder'])){
//                    $q->orderBy('default_price', 'desc');
//                }

                if (isset($filter['priceRangeMin']) || isset($filter['priceRangeMax'])){
                    $q->whereBetween('default_price', [$filter['priceRangeMin'], $filter['priceRangeMax']]);
                }
            })
            ->where(function($sub) use ($filter){
                if (isset($filter['checkboxItems'])) {
                    $sub->whereHas('productVariants.detail', function ($q) use ($filter) {
                        $count = 0;
                        foreach ($filter['checkboxItems'] as $i) {
                            $count++;
                            if ($count == 1) {
                                $q->where('value', '=', $i);
                            } else {
                                $q->orWhere('value', '=', $i);
                            }
                        }
                    });
                }
            })
            ->groupBy('product_id')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('site.category')
            ->with('baseProducts', $baseProducts)
            ->with('baseProperties', $baseProperties)
            ->with('id', $id)
            ->with('products', $products)
            ->with('filter', $filter)
            ->with('categories', $categories)
            ->with('category', $category);
    }

}
