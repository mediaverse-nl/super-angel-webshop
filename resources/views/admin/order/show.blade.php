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

                            <table cellspacing="5">

                                <thead>
                                    <tr>
                                        <td rowspan="2"><h4>customer notes</h4></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>delivery note</b></td>
                                        <td>{!! $order->delivery_note !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>note</b></td>
                                        <td>{!! $order->note !!}</td>
                                    </tr>
                                </tbody>

                                <thead>
                                    <tr>
                                        <td rowspan="2" style="padding-top: 30px;"><h4>address</h4></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>country</b></td>
                                        <td>{!! $order->country !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>state</b></td>
                                        <td>{!! $order->state ? $order->state : 'N/A' !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>city</b></td>
                                        <td>{!! $order->city !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>postal_code</b></td>
                                        <td>{!! $order->postal_code !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>address</b></td>
                                        <td>{!! $order->address !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>address_number</b></td>
                                        <td>{!! $order->address_number !!}</td>
                                    </tr>
                                </tbody>

                                <thead>
                                    <tr>
                                        <td rowspan="2"><h4 style="padding-top: 30px;">contact</h4></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>name</b></td>
                                        <td>{!! $order->name !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>email</b></td>
                                        <td>{!! $order->email !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>telephone_home</b></td>
                                        <td>{!! $order->telephone_home ? $order->telephone_home : 'N/A' !!}</td>

                                    </tr>
                                    <tr>
                                        <td><b>telephone_mobile</b></td>
                                        <td>{!! $order->telephone_mobile ? $order->telephone_mobile : 'N/A' !!}</td>
                                    </tr>
                                </tbody>

                                <thead>
                                    <tr>
                                        <td rowspan="2"><h4 style="padding-top: 40px;">order details</h4></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>currency</b></td>
                                        <td>{!! $order->currency !!} N/A</td>
                                    </tr>
                                    <tr>
                                        <td><b>total_paid</b></td>
                                        <td>&euro; {!! number_format($order->total_paid) !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>shopping_cost</b></td>
                                        <td> {!!  $order->shipping_costs != 0 ? '€'.number_format($order->shipping_costs,2) : 'gratis'!!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>payment_id</b></td>
                                        <td>{!! $order->payment_id ? $order->payment_id : 'N/A'!!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>payment_method</b></td>
                                        <td>{!! $order->payment_method ? $order->payment_method : 'N/A' !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>status</b></td>
                                        <td>{!! $order->status !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>created_at</b></td>
                                        <td>{!! $order->created_at !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>updated_at</b></td>
                                        <td>{!! $order->updated_at !!}</td>
                                    </tr>
                                </tbody>
                            </table>

                            {{--@if($order->status != 'refunded' && $order->status == 'paid')--}}
                                {{--@component('components.model', [--}}
                                    {{--'id' => 'orderTableBtn'.$order->id,--}}
                                    {{--'title' => 'Refund',--}}
                                    {{--//'actionRoute' => route('admin.mollie.refund', $order->id),--}}
                                    {{--'actionRoute' => route('admin.order.chargeback', $order->id),--}}
                                    {{--'btnClass' => 'btn btn-danger btn-block',--}}
                                    {{--'btnIcon' => 'fa fa-inbox',--}}
                                    {{--'btnTitle' => 'refund to credits'--}}
                                {{--])--}}
                                    {{--@slot('description')--}}
                                        {{--If u proceed u will refund this order # {!! $order->id !!}--}}
                                    {{--@endslot--}}
                                {{--@endcomponent--}}
                            {{--@else--}}
                                {{--<a class="rounded-circle delete disabled" style="color: #FFFFFF;">--}}
                                    {{--<i class="fa fa-inbox" style="color: #FFFFFF !important;"></i>--}}
                                {{--</a>--}}
                            {{--@endif--}}
                    {{--@endcomponent--}}
                        </div>
                    </div>
                </div>

                    <div class="col-md-12 col-lg-6">
                        <div class="row">
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        factuur
                                    </div>
                                    <div class="card-body">
                                        <a href="{!! route('admin.pdf.downloadInvoice', $order->id) !!}" class="btn btn-block btn-warning">download</a>
                                        <a href="{!! route('admin.pdf.streamInvoice', $order->id) !!}" target="_black" class="btn btn-block btn-warning">view</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-header">
                                        Bestelling
                                    </div>
                                    <div class="card-body">
                                        <a id="printMyPackingSlip" class="btn btn-block btn-warning">Print pakbon</a>
                                        <a id="printMyLabel" class="btn btn-block btn-warning">Print label</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                pakbon
                            </div>
                            <div class="card-body" id="printPackingSlip">
                                <div id="printLabel" class="d-no ne">
                                    <table style="border: 1px solid #dee2e6">
                                        <tr style="border: 1px solid #dee2e6;">
                                            <td style=" padding: 0px 10px;">
                                                {!! ucfirst($order->company_name) !!}
                                                {!! ucwords($order->name) !!}<br>
                                                {!! ucfirst($order->address) !!} {!! $order->address_number !!},<br>
                                                {!! strtoupper($order->postal_code) !!} {!! ucfirst($order->city) !!}<br>
                                                {!! ucfirst($order->country) !!}
                                            </td>
                                            <td style="padding: 0px 10px; ">
                                                {!! '<img style="width:100% !important;" src="data:image/png;base64,' . \DNS1D::getBarcodePNG("$order->id", "CODABAR",3,33) . '" alt="barcode"   />' !!}
                                                <br>
                                                {!! ucfirst($order->created_at->format('d-m-Y H:m')) !!}
                                            </td>
                                        </tr>

                                    </table>
                                    {{--{!! $order->ean13() !!}--}}
                                </div>
                                <br>

                                <table class="table"  cellpadding="5">
                                    <tr>
                                        <th  colspan="4">Bestelling #{!! $order->id !!}</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>product</th>
                                        <th>aantal</th>
                                        <th>ean</th>
                                    </tr>
                                    @foreach($order->productOrders as $item)

                                        <tr>
                                            <td>
                                                {!! $item->product->id !!}
                                            </td>
                                            <td>
                                                {!! $item->product->title !!}
                                                <b>{!! (!$item->product->hasOneProductType() ? (' - '.json_decode($item->data, true)['variants']): '') !!}</b>
                                            </td>
                                            <td>
                                                {!! $item->order_qty!!}
                                            </td>
                                            <td>
                                                {!! json_decode($item->data, true)['ean']!!}
                                            </td>
                                        </tr>

                                    @endforeach

                                </table>
                                {{--{!! dd($order->productOrders) !!}--}}


                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection

@push('css')
@endpush

@push('scripts')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js.map"></script>--}}
    <script>
        $( document ).ready(function() {
            $('#printMyLabel').on("click", function () {
                $('#printLabel').printThis({
                    importCSS: true,
                    importStyle: true,
                    printContainer: true
                });
            });

            $('#printMyPackingSlip').on("click", function () {
                $('#printPackingSlip').printThis({
                    importCSS: true,
                    importStyle: true,
                    printContainer: true
                });
            });
        });
    </script>
@endpush