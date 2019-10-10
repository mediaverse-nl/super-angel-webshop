<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $orders = $this->order->orderBy('id', 'DESC')->get();

        return view('admin.order.index')
            ->with('orders', $orders);
    }

    public function show($id)
    {
        $order = $this->order->findOrFail($id);

        return view('admin.order.show')
            ->with('order', $order);
    }

    public function chargeback(Request $request, $id)
    {
        $order = $this->order->findOrFail($id);
        $user = $order->user;

//        dd($user);

        $credit = $user->credit;

//        dd($credit != null ? $credit : 0);

        if ($order->status != 'refunded'
            && $order->status == 'paid')
        {
            $user->credit = ($credit != null ? $credit : 0) + $order->total_paid;
            $user->save();
        }

        $order->status = 'refunded';
        $order->save();

        return redirect()
            ->back();
    }
}
