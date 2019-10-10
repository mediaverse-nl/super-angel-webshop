<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\AddCartRequest;
use App\Http\Requests\Site\OrderStoreRequest;
use App\Product;
use App\ProductType;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mollie\Laravel\Facades\Mollie;

class CartController extends Controller
{
    protected $product;
    protected $productType;
    protected $mollie;

    public function __construct(Product $product, productType $productType)
    {
        $this->product =  $product;
        $this->productType =  $productType;
        $this->mollie = Mollie::api();
    }

    public function index()
    {
        $this->cartContent();

        return view('site.shopping-cart');
    }

    public function create()
    {
        if(Cart::count() == 0){
            return redirect()->route('site.cart.index');
        }

        return view('site.create-order');
    }

    public function add(AddCartRequest $request)
    {
        $p = $this->productType->find(decrypt($request->product_id));

        if (in_array($p->id, Cart::content()->pluck('id')->toArray())){
            foreach (Cart::content() as $i){
                if ($i->id == $p->id){

                    Cart::update($i->rowId, [
                        'qty' => $i->qty + $request->qty,
                        'price' => $p->taxPrice(),
                    ]);
                }
            }
        }else{
            Cart::add([
                'id' => $p->id,
                'name' => $p->product->title,
                'qty' => $request->qty ? $request->qty : 1,
                'options' => [$p],
                'price' => $p->taxPrice(),
            ]);
        }

        ($this->cartContent());

        return redirect()->route('site.cart.index');
    }

    public function remove()
    {
        Cart::remove(Request()->get('row'));
        $this->cartContent();

        return redirect()->route('site.cart.index');
    }

    public function decrease(Request $request)
    {
        Cart::update(Request()->get('row'), Request()->get('qty') ? Request()->get('qty') : 1);
        $this->cartContent();

        return redirect()->route('site.cart.index');
    }

    public function increase(Request $request)
    {
        Cart::update(Request()->get('row'), Request()->get('qty') ? Request()->get('qty') : 1);
        $this->cartContent();

        return redirect()->route('site.cart.index');
    }

    public function destroy()
    {
        Cart::destroy();
        return redirect()->route('site.cart.index');
    }

    public function cartContent(){
        $cart = Cart::content();

        foreach ($cart as $item){
            $product = $this->productType->find($item->id);
            if ($product == null){
                Cart::remove($item->rowId);
            }else{
                Cart::update($item->rowId, [
                    'qty' => $product->stock > $item->qty ? $item->qty : $product->stock,
                    'price' => $product->taxPrice(),
                ]);
            }
        }
    }
}
