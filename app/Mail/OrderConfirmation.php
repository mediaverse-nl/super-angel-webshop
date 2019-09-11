<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = $this->order;

        $pdf = PDF::loadView('pdf.invoice', [
            'order' => $order
        ]);
        return $this
            ->from('no-reply@tantemartje.nl')
            ->markdown('emails.order.confirmation')
            ->attachData($pdf->stream(),'factuur-tante-martje-'.$this->order->id.'.pdf', [
                    'mime' => 'application/pdf',
                ]
            );
    }
}
