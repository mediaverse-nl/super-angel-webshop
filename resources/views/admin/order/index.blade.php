@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.order.index') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-12">

            @component('components.datatable')
                @slot('head')
                    <th>id</th>
                    <th>event</th>
                    <th>email</th>
                    <th>ticket_amount</th>
                    <th>price</th>
                    <th>payment_id</th>
                    <th>status</th>
                    <th class="no-sort"></th>
                @endslot

                @slot('table')
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->event->activity->title}} - {{$order->event->activity->region}} - {{$order->event->start_datetime}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->ticket_amount}}x</td>
                            <td>{{number_format($order->total_paid, 2)}}</td>
                            <td>{{$order->payment_id}}</td>
                            <td>{{$order->status}}</td>
                            <td>
                                <a href="{{route('admin.order.show', $order->id)}}" class="rounded-circle edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @if($order->status != 'refunded' && $order->status == 'paid')
                                    @component('components.model', [
                                        'id' => 'orderTableBtn'.$order->id,
                                        'title' => 'Refund',
                                        //'actionRoute' => route('admin.mollie.refund', $order->id),
                                        'actionRoute' => route('admin.order.chargeback', $order->id),
                                        'btnClass' => 'rounded-circle delete',
                                        'btnIcon' => 'fa fa-inbox'
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
                            </td>
                        </tr>
                    @endforeach
                @endslot

            @endcomponent

        </div>
    </div>

@endsection

@push('css')
    <style>
        a.disabled {
            /* Make the disabled links grayish*/
            color: gray;
            opacity: 0.3;
            /* And disable the pointer events */
            pointer-events: none;
        }
    </style>
@endpush

@push('js')
    <script>

    </script>
@endpush