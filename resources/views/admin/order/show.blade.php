@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.order.edit', $order) !!}
@endsection

@section('content')


    <div class="row">

        <div class="col">

            <h2>Order #{{$order->id}}</h2>

            <hr>

            <div class="row">
                {{--TODO use these values to make a form--}}
                <div class="col-sm-6 col-md-6 col-lg-6" id="orderDetails">
                    <div class="card">
                        <div class="card-body">
                            {{--<h4>Business</h4>--}}
                            {{--<p><b>company name:</b>{!! $order->company_name !!}</p>--}}
                            {{--<p><b>company vat:</b>{!! $order->company_vat !!}</p>--}}
                            {{--<p><b>company coc:</b>{!! $order->company_coc !!}</p>--}}
                            {{--<br>--}}
                            <h4>address</h4>
                            <p><b>country:</b>{!! $order->country !!}</p>
                            <p><b>state:</b>{!! $order->state !!}</p>
                            <p><b>city:</b>{!! $order->city !!}</p>
                            <p><b>postal code:</b>{!! $order->postal_code !!}</p>
                            <p><b>address:</b>{!! $order->address !!}</p>
                            <p><b>address number:</b>{!! $order->address_number !!}</p>
                            <div id="this" class="d-none">
                                {!! ucfirst($order->company_name) !!}<br>
                                {!! ucwords($order->name) !!}<br>
                                {!! ucfirst($order->address) !!} {!! $order->address_number !!},<br>
                                {!! strtoupper($order->postal_code) !!} {!! ucfirst($order->city) !!}<br>
                                {!! ucfirst($order->country) !!}
                                <br>
                                <br>
                                {{--{!! $order->ean13() !!}--}}
                            </div>

                            <br>
                            <h4>contact</h4>
                            <p><b>name:</b>{!! $order->name !!}</p>
                            <p><b>email:</b>{!! $order->email !!}</p>
                            <p><b>telephone:</b>{!! $order->telephone !!}</p>
                            <br>
                            <h4>order details</h4>
                            <p><b>currency:</b>{!! $order->currency !!}</p>
                            <p><b>total paid:</b>{!! $order->total_paid !!}</p>
                            {{--<p><b>shipping cost:</b>{!! $order->shipping_cost !!}</p>--}}
                            <p><b>payment id:</b>{!! $order->payment_id !!}</p>
                            <p><b>payment method:</b>{!! $order->payment_method !!}</p>
                            <p><b>status:</b>{!! $order->status !!}</p>
                            <p><b>created at:</b>{!! $order->created_at !!}</p>
                            <p><b>updated at:</b>{!! $order->updated_at !!}</p>

                            @if($order->status != 'refunded' && $order->status == 'paid')
                                @component('components.model', [
                                    'id' => 'orderTableBtn'.$order->id,
                                    'title' => 'Refund',
                                    //'actionRoute' => route('admin.mollie.refund', $order->id),
                                    'actionRoute' => route('admin.order.chargeback', $order->id),
                                    'btnClass' => 'btn btn-danger btn-block',
                                    'btnIcon' => 'fa fa-inbox',
                                    'btnTitle' => 'refund to credits'
                                ])
                                    @slot('description')
                                        If u proceed u will refund this order # {!! $order->id !!}
                                    @endslot
                                @endcomponent
                            @else
                                <a class="rounded-circle delete disabled" style="color: #FFFFFF;">
                                    <i class="fa fa-inbox" style="color: #FFFFFF !important;"></i>
                                </a>
                            @endif
                    {{--@endcomponent--}}
                        </div>
                    </div>
                </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                factuur
                            </div>
                            <div class="card-body">
                                 <a href="{!! route('admin.pdf.downloadInvoice', $order->id) !!}" class="btn btn-block btn-warning">download</a>
                                 <a href="{!! route('admin.pdf.streamInvoice', $order->id) !!}" target="_black" class="btn btn-block btn-warning">view</a>
                             </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                Event
                            </div>
                            <div class="card-body">
                               <h1 style="margin-bottom: 10px !important;"> {!! $order->event->activity->title !!}</h1>

                                <a class="btn btn-sm btn-success" href="{!! route('admin.event.edit', $order->event->id) !!}">go to event</a>
                                <br>
                                <br>
                                <b>region:</b>
                                {!! $order->event->activity->region !!}
                                <br>
                                <b>start date:</b>
                                {!! $order->event->startDatetime() !!}<br>

                                <b>sign-up closing at:</b>
                                {!! $order->event->ableToOrderDate() !!}
                                <br>

                                <b>goal:</b>
                                {!! $order->event->countSoldTickets() !!} / {!! $order->event->activity->min_number_of_people .' ~'. $order->event->activity->max_number_of_people !!}
                                <br>
                                <br>
                                @if($order->event->ableToOrderDate() <= \Carbon\Carbon::now())
                                    @if(!$order->event->reachGoal())
                                         <div class="card">
                                            <div class="card-header bg-danger text-white">
                                                goal is not reached
                                            </div>
                                        </div>
                                    @else
                                        <div class="card">
                                            <div class="card-header bg-success text-white">
                                                goal is reached
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <div class="card">
                                        <div class="card-header bg-warning text-white">
                                            pending
                                        </div>
                                    </div>
                                @endif
                                {{--<br>--}}
                                {{--<br>--}}
                                {{--{!! $order->event !!}--}}
                                {{--{!! $order->event->activity !!}--}}
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>

    </div>

@endsection

{{--@push('css')--}}
    {{--<style>--}}

    {{--</style>--}}
{{--@endpush--}}

{{--@push('js')--}}
    {{--<script>--}}

    {{--</script>--}}
{{--@endpush--}}