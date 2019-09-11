<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\OrderStoreRequest;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mollie\Laravel\Facades\Mollie;

class CartController extends Controller
{
    protected $product;
    protected $mollie;

    public function __construct(Product $product)
    {
        $this->product =  $product;
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

    public function add(Request $request)
    {
        $p = $this->product->find($request->product_id);

        Cart::add([
            'id' => $p->id,
            'name' => $p->title,
            'qty' => $request->qty ? $request->qty : 1,
            'options' => [$p],
            'price' => $p->taxPrice(),
        ]);
        $this->cartContent();

        return redirect()->route('site.cart.index');
    }

    public function cartContent(){
        $cart = Cart::content();
        foreach ($cart as $item){
            $product = $this->product->findOrFail($item->id);
            Cart::update($item->rowId, [
                'qty' => $product->stock > $item->qty ? $item->qty : $product->stock,
                'price' => $product->taxPrice(),
            ]);
        }
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


}
