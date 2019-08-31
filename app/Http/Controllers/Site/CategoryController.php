<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Product;
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

    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
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
//        $this->seo()
//            ->setTitle($category->value .' | site.nl')
//            ->setDescription($this->getPageSeo()->description);
//        //opengraph
//        $this->seo()
//            ->opengraph()
//            ->setUrl(url()->current())
//            ->addProperty('type', 'website');
//        //twitter
//        $this->seo()
//            ->twitter()
//            ->setSite('@username');

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

        $baseProducts = $category->products()->get();
        $baseProperties = $this->product
            ->where('category_id', '=', $id)
            ->join('product_details', 'products.id', '=', 'product_details.product_id')
            ->join('details', 'product_details.detail_id', '=', 'details.id')
            ->join('properties', 'details.property_id', '=', 'properties.id')
            ->select(
                '*',
                DB::raw('COUNT(details.value) as d_count'),
                DB::raw('details.value as d_value'),
                DB::raw('properties.value as p_value')
            )
            ->groupBy('details.value')
            ->groupBy('properties.value')
            ->get();

        $test= $category
            ->with(['products.productDetails.detail.property' => function($query){
                $query->groupBy('value');
            }])->get();

        $products = $this->product
//            ->whereHas('activity', function ($q) use ($category, $filter) {
//                $q->where('category_id', '=', $category->id);
//
//                if(!empty($filter['regios']) && $filter['regios'] !== null){
//                    $i = 1;
//                    foreach ($filter['regios'] as $v){
//                         if ($i == 1){
//                            $q->where('activity.region', $v);
//                        } else{
//                            $q->orWhere('region', '=', $v);
//                        }
//                        $i++;
//                    }
//                }
//            })
//            ->where(function ($q) use ($filter){
//                if(!empty($filter['groep']) && $filter['groep'] !== null){
//                    $i = 1;
//                    foreach ($filter['groep'] as $i){
//                        if ($i == 1){
//                            $q->where('target_group', '=', $i);
//                        } else{
//                            $q->orWhere('target_group', '=', $i);
//                        }
//                        $i++;
//                    }
//                }
//            })
//            ->where(function ($q) use ($filter){
//                if (!empty($filter['van_datum'])){
//                     $q->whereDate('start_datetime', '>=', $filter['van_datum']);
//                }
//                if (!empty($filter['tot_datum'])){
//                    $q->whereDate('start_datetime', '<=', $filter['tot_datum']);
//                }
//            })
//            ->where(function ($q) use ($filter){
//                if (!empty($filter['prijs']) ){
//                    $q->whereBetween('price', [explode(',',$filter['prijs'])[0], explode(',',$filter['prijs'])[1]]);
//                }
//            })
//            ->where('status', '=', 'public')
//            ->whereDate('start_datetime', '>=', $from)
//            ->orderBy('start_datetime', 'asc')
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
