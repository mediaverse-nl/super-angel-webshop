<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function refund(Request $request, $id)
    {
        $order = $this->order->findOrFail($id);

        $payment = Mollie::api()->payments()->get($order->payment_id);

        if ($payment->canBeRefunded() && $payment->amountRemaining >= 2.00)
        {
             $refund = Mollie::api()
                ->payments()
                ->refund($payment, $payment->amount);

            $order->status = 'pending';
            $order->save();
//            echo "{$refund->amount->currency} {$refund->amount->value} of payment {$paymentId} refunded.", PHP_EOL;
        } else {
            return 'fail';
//            echo "Payment {$paymentId} can not be refunded.", PHP_EOL;
        }

        return redirect()->back();
    }
}
