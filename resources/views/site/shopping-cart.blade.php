@extends('layouts.app')

@section('body')

    <div class="container" style="margin-top: 150px; padding-bottom: 0px !important;">
        <div class="row">
            <div class="col">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center" style="margin-bottom: 0px !important;">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Winkelwagen</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>



    @include('includes.benefit')

    <!-- Contact Us -->
    <div class="container" style="margin-top: 74px !important; padding-bottom: 0px !important;">

            <div class="row">
                <div class="col-lg-12">
                {{--<div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">--}}

                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">Product</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Prijs</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Aantal</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase"></div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(\Gloudemans\Shoppingcart\Facades\Cart::count() !== 0)
                                    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $i)
                                        <tr>
                                             <th scope="row" class="border-0">
                                                <div class="p-2">
                                                    <img src="{!! $i->options[0]->thumbnail() !!}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> <a href="{!! route('site.product.show', [$i->options[0]->urlTitle, $i->options[0]->id]) !!}" class="text-dark d-inline-block align-middle">{!! $i->name !!}</a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: {!! $i->options[0]->category->value !!}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle price-row">
                                                @if($i->options[0]->discount)
                                                    <strong>{!! $i->options[0]->discountPrice !!}</strong>
                                                    <small style="text-decoration: line-through;">{!! $i->options[0]->productPrice !!}</small>
                                                @else
                                                    <strong>{!! $i->options[0]->productPrice !!}</strong>
                                                @endif
                                            </td>
                                            <td class="border-0 align-middle">
                                                @include('includes.cart.min', ['item' => $i])
                                                <strong style="padding: 0px 10px;">{!! $i->qty !!}</strong>
                                                @include('includes.cart.plus', ['item' => $i])
                                            </td>
                                            <td class="border-0 align-middle">
                                                @include('includes.cart.remove', ['item' => $i])
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <th scope="row" class="border-0" colspan="4">
                                            <p class="pr-1">Uw winkel wagen is leeg.</p>
                                            <hr>
                                        </th>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>

            {{--<div class="row py-5 p-4 bg-white rounded shadow-sm">--}}
            <div class="row  ">
                <div class="col-lg-6">
                    {{--<div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>--}}
                    {{--<div class="p-4">--}}
                        {{--<p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>--}}
                        {{--<div class="input-group mb-4 border rounded-pill p-2">--}}
                            {{--<input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-0">--}}
                            {{--<div class="input-group-append border-0">--}}
                                {{--<button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for seller</div>--}}
                    {{--<div class="p-4">--}}
                        {{--<p class="font-italic mb-4">If you have some information for the seller you can leave them in the box below</p>--}}
                        {{--<textarea name="" cols="30" rows="2" class="form-control"></textarea>--}}
                    {{--</div>--}}
                </div>
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">
                        OVERZICHT VAN DE BESTELLING
                    </div>
                    <div class="p-4">
                        <p class="font-italic mb-4">

                        </p>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom">
                                <strong class="text-muted">Subtotaal </strong>
                                <strong>&euro;{!!  number_format(Cart::subtotal(), 2) !!}</strong>
                            </li>
                            <li class="d-flex justify-content-between py-3 border-bottom">
                                <strong class="text-muted">Verzendingskosten</strong>
                                <strong>&euro;{!! env('SHIPPING_COST') !!}</strong>
                            </li>
                            <li class="d-flex justify-content-between py-3 border-bottom">
                                <strong class="text-muted">
                                    BTW
                                    <small>21%</small>
                                </strong>
                                <strong>&euro;{!! number_format(Cart::tax(), 2) !!}</strong>
                            </li>
                            <li class="d-flex justify-content-between py-3 border-bottom">
                                <strong class="text-muted">Totaal</strong>
                                <h5 class="font-weight-bold">&euro;{!! number_format(Cart::total() + env('SHIPPING_COST'), 2) !!}</h5>
                            </li>
                        </ul>
                        <a href="{!! route('site.cart.create') !!}" class="btn btn-dark rounded-pill py-2 btn-block">Bestelling afronden</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="/styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/contact_responsive.css">
    <style>

        @media
        only screen and (max-width: 760px),
            (min-device-width: 768px) and (max-device-width: 1024px)
        {
            .price-row{
    padding-top: 19px !important;
            }

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr { border-bottom: 1px solid #ccc; }

            td {
                /* Behave  like a "row" */
                border: none;
                /*border-bottom: 1px solid #eee;*/
                position: relative;
                padding-left: 50% !important;
                height: 62px !important;
            }

            td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 6px;
                left: 6px;
                text-align: right !important;
                width: 45%;
                padding-right: 10px;
                padding-top: 13px !important;
                white-space: nowrap;
            }

            /*
            Label the data
            */
            td:nth-of-type(1):before { content: "prijs"; }
            td:nth-of-type(2):before { content: "aantal"; }
            td:nth-of-type(3):before { content: "verwijderen"; }
            td:nth-of-type(4):before { content: "Favorite Color"; }
            td:nth-of-type(5):before { content: "Wars of Trek?"; }
            td:nth-of-type(6):before { content: "Secret Alias"; }
            td:nth-of-type(7):before { content: "Date of Birth"; }
            td:nth-of-type(8):before { content: "Dream Vacation City"; }
            td:nth-of-type(9):before { content: "GPA"; }
            td:nth-of-type(10):before { content: "Arbitrary Data"; }
        }

        .btn-trash{
            margin: 0px !important;
        }

        .benefit
        {
            margin-top: 74px;
        }
        .benefit_row
        {
            padding-left: 15px;
            padding-right: 15px;
        }
        .benefit_col
        {
            padding-left: 0px;
            padding-right: 0px;
        }
        .benefit_item
        {
            height: 100px;
            background: #f3f3f3;
            border-right: solid 1px #FFFFFF;
            padding-left: 25px;
        }
        .benefit_col:last-child .benefit_item
        {
            border-right: none;
        }
        .benefit_icon i
        {
            font-size: 30px;
            color: #fe4c50;
        }
        .benefit_content
        {
            padding-left: 22px;
        }
        .benefit_content h6
        {
            text-transform: uppercase;
            line-height: 18px;
            font-weight: 500;
            margin-bottom: 0px;
        }
        .benefit_content p
        {
            font-size: 12px;
            line-height: 18px;
            margin-bottom: 0px;
            color: #51545f;
        }


        .quantity {
            float: left;
            margin-right: 15px;
            background-color: #eee;
            position: relative;
            width: 80px;
            overflow: hidden
        }

        .quantity input {
            margin: 0;
            text-align: center;
            width: 15px;
            height: 15px;
            padding: 0;
            float: right;
            color: #000;
            font-size: 20px;
            border: 0;
            outline: 0;
            background-color: #F6F6F6
        }

        .quantity input.qty {
            position: relative;
            border: 0;
            width: 100%;
            height: 40px;
            padding: 10px 25px 10px 10px;
            text-align: center;
            font-weight: 400;
            font-size: 15px;
            border-radius: 0;
            background-clip: padding-box
        }

        .quantity .minus, .quantity .plus {
            line-height: 0;
            background-clip: padding-box;
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            -webkit-background-size: 6px 30px;
            -moz-background-size: 6px 30px;
            color: #bbb;
            font-size: 20px;
            position: absolute;
            height: 50%;
            border: 0;
            right: 0;
            padding: 0;
            width: 25px;
            z-index: 3
        }

        .quantity .minus:hover, .quantity .plus:hover {
            background-color: #dad8da
        }

        .quantity .minus {
            bottom: 0
        }
        .shopping-cart {
            margin-top: 20px;
        }
    </style>
@endpush

@push('js')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
    <script src="/js/contact_custom.js"></script>
@endpush


