@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('auth.order.index') !!}
@endsection

@section('body')
    <div class="container product_section_container">

        <div class="row" style="margin-top:150px !important;">
            <div class="banner">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3">
                            @include('auth.includes.menu')
                        </div>
                        <div class="col-9">
                            <h2 class="">Bestellingen</h2>
                            <br>
                            <table id="table_id" class="display table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>datum</th>
                                    <th>aantal p.</th>
                                    <th>totaal</th>
                                    <th>status</th>
                                    <th>opties</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(auth()->user()->orders()->orderBy('id', 'DESC')->get() as $orders)
                                    <tr>
                                        <td>
                                            {!! $orders->id !!}
                                        </td>
                                        <td>
                                            {!! $orders->created_at->format('d M Y') !!}
                                        </td>
                                        <td>
                                            x{!! $orders->productOrders()->count() !!}
                                        </td>
                                        <td>
                                            &euro; {!! number_format($orders->total_paid, 2)!!}
                                         </td>
                                        <td>
                                            {!! $orders->status !!}
                                         </td>
                                        <td>
                                            @if($orders->status == 'paid')
                                                <a class="btn btn-sm btn-success text-white" href="{!! route('auth.order.download', $orders->id) !!}" >downloaden</a>
                                            @else
                                                <a class="btn btn-sm btn-success text-white disabled" href="#" >download</a>
                                                {{--<a class="btn btn-sm btn-success text-white disabled" href="#" target="_black">bekijken</a>--}}
                                            @endif
                                                <a class="btn btn-sm btn-success text-white" href="{!! route('auth.order.view', $orders->id) !!}" target="_black">factuur bekijken</a>

                                                {{--<a class="btn btn-sm btn-success" href="{!! route('auth.order.show', $orders->id) !!}">bekijken</a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/responsive.css">
    <style>

        .list-group a{
            color: #fe4c50;
        }
        .card{
            border-radius: 0px;
        }
        .card .card-header{
            background: #fafafa;
        }
        .faq-container{
            border-top: 1px solid rgba(0, 0, 0, 0.125);
            padding: 20px 15px;
            background: #FFFFFF;
        }
        .list-group-item:first-child {
             border-top-left-radius: 0px;
             border-top-right-radius: 0px;
        }
        .list-group-item:last-child {
            margin-bottom: 0;
            border-bottom-right-radius: 0px;
            border-bottom-left-radius: 0px;
        }
    </style>
@endpush

@push('js')
    <script src="/js/categories_custom.js" type="text/javascript"></script>
@endpush