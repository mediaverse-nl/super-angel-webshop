<?php

namespace App\Http\Controllers\Site;

use App\Mail\OrderConfirmation;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Mollie\Laravel\Facades\Mollie;

class WebhookController extends Controller
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @param Request $request
     */
    public function handle(Request $request) {
        if (! $request->has('id')) {
            return;
        }

        $id = $request->has('id');

        $payment = Mollie::api()
            ->payments()
            ->get($request->id);

        $order = $this->order->findOrFail($payment->metadata->order_id);

        $order->status = $payment->status;
        $order->payment_method = $payment->method;

        if ($payment->isPaid()) {
            /*
             * The payment is paid and isn't refunded or charged back.
             * At this point you'd probably want to start the process of delivering the product to the customer.
             */
            Mail::to($order->email)->send(new OrderConfirmation($order));

        } elseif ($payment->isOpen()) {
            /*
             * The payment is open.
             */
        } elseif ($payment->isPending()) {
            /*
             * The payment is pending.
             */
        } elseif ($payment->isFailed()) {
            /*
             * The payment has failed.
             */
        } elseif ($payment->isExpired()) {
            /*
             * The payment is expired.
             */
        } elseif ($payment->isCanceled()) {
            /*
             * The payment has been canceled.
             */
        } elseif ($payment->hasRefunds()) {
            /*
             * The payment has been (partially) refunded.
             * The status of the payment is still "paid"
             */
        } elseif ($payment->hasChargebacks()) {
            /*
             * The payment has been (partially) charged back.
             * The status of the payment is still "paid"
             */
        }

        $order->save();
    }
}
