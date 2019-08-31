<?php

namespace App\Http\Controllers\Auth;

use App\Order;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $pdf;
    protected $order;

    public function __construct(PDF $pdf, Order $order)
    {
        $this->pdf = $pdf;
        $this->order = $order;
    }

    public function index()
    {
        return view('auth.order.index');
    }

    public function show($id)
    {
        if (!in_array($id, auth()->user()->orders()->pluck('id')->toArray())){
            return abort(404);
        }

        $order = $this->order->findOrFail($id);

        return view('auth.order.show')
            ->with('order', $order);
    }

    public function view($id)
    {
        $order = $this->order->findOrFail($id);

        if (auth()->user()->id != $order->user_id){
            abort(403);
        }

        $pdf = $this->pdf->loadView('pdf.invoice', ['order' => $order]);

        return $pdf->stream();
    }

    public function download($id)
    {
        $order = $this->order->findOrFail($id);

        if (auth()->user()->id != $order->user_id){
            abort(403);
        }

        $pdf = $this->pdf->loadView('pdf.invoice', ['order' => $order]);

        return $pdf->download('fundoe-factuur-'.$order->id.'.pdf');
    }
}
