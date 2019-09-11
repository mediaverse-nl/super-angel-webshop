<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\OrderStoreRequest;
use App\Mail\OrderConfirmation;
use App\Order;
use App\Product;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Mollie\Laravel\Facades\Mollie;

class OrderController extends Controller
{
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'paid';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_FAILED = 'failed';

    protected $mollie;
    protected $order;
    protected $product;

    public function __construct(Order $order, Product $product)
    {
        $this->order = $order;
        $this->product = $product;
        $this->mollie = Mollie::api();
    }

    public function store(OrderStoreRequest $request)
    {
        $order = $this->order;

        $order->name = $request->naam;
        $order->email = $request->email;
        $order->user_id = auth()->check() ? auth()->user()->id : null;
        $order->country = $request->land;
        $order->state = null;
        $order->city = $request->woonplaats;
        $order->postal_code = $request->postcode;
        $order->address = $request->straat;
        $order->address_number = $request->huisnummer;
        $order->telephone_home = $request->telefoonnummer_vast;
        $order->telephone_mobile = $request->telefoonnummer_mobiel;
        $order->total_paid = number_format(Cart::total() +  env('SHIPPING_COST'), 2);
        $order->shipping_costs = env('SHIPPING_COST');
        $order->payment_id = null;
        $order->payment_method = null;
        $order->delivery_note = $request->aflevernotitie;
        $order->note = $request->opmerking;
        $order->status = self::STATUS_PENDING;

        $order->save();

        $products = [];
        foreach (Cart::content() as $i){
            $products[] = [
                'product_id' => $i->id,
                'order_id' => $order->id,
                'order_qty' => $i->qty,
                'unit_price' => $i->options[0]->price(),
            ];
        }

        $order->productOrders()->insert($products);

        $payment =  $this->mollie->payments()->create([
            "amount"      => number_format($order->total_paid,2),
            "description" => "Order Nr. ". $order->id,
            "redirectUrl" => route('site.order.show', encrypt($order->id)),
            'webhookUrl'   => route('webhooks.mollie'),
            'metadata'    => [
                'order_id' => $order->id,
            ],
        ]);

        session(['order' => encrypt($payment->id)]);

        $order->update(['payment_id' => $payment->id]);

        // redirect customer to Mollie checkout page
        return redirect($payment->getPaymentUrl(), 303);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = decrypt($id);

        $order = $this->order->findOrFail($id, [
            'country',
            'city',
            'postal_code',
            'address',
            'address_number',
            'name',
            'email',
            'telephone_home',
            'telephone_mobile',
            'total_paid',
            'payment_id',
            'shipping_costs',
            'note',
            'delivery_note',
            'payment_method',
            'status',
            'created_at',
            'user_id',
            'updated_at',
        ]);

        $paymentId = session('order');

        if (auth()->check() && $order->user_id !== null){
            if($order->user_id !== (auth()->check() ? auth()->user()->id : null)){
                abort(403);
            }
        }

        if ($order->payment_id !== decrypt($paymentId)){
            abort(403);
        }

        $payment =  $this->mollie->payments()->get($order->payment_id);

        if ($payment->isPaid())
        {
            if ($order->status != 'paid'){
                Mail::to($order->email)
                    ->send(new OrderConfirmation($order));
            }

            $order->status = self::STATUS_COMPLETED;
            $order->payment_method = $payment->method;
            $order->save();

            return view('site.show-order')
                ->with('order', $order->toArray())
                ->with('payment', $payment);
        } elseif (! $payment->isOpen())
        {
            $order->status = self::STATUS_CANCELLED;
            $order->save();
            abort(404);
        }

    }
}
