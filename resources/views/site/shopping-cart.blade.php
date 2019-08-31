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
                                    <div class="py-2 text-uppercase">Price</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Quantity</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Remove</div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row" class="border-0">
                                    <div class="p-2">
                                        <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-1_zrifhn.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                                        <div class="ml-3 d-inline-block align-middle">
                                            <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">Timex Unisex Originals</a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: Watches</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="border-0 align-middle"><strong>$79.00</strong></td>
                                <td class="border-0 align-middle"><strong>3</strong></td>
                                <td class="border-0 align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="p-2">
                                        <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-3_cexmhn.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                                        <div class="ml-3 d-inline-block align-middle">
                                            <h5 class="mb-0"><a href="#" class="text-dark d-inline-block">Lumix camera lense</a></h5><span class="text-muted font-weight-normal font-italic">Category: Electronics</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="align-middle"><strong>$79.00</strong></td>
                                <td class="align-middle"><strong>3</strong></td>
                                <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="p-2">
                                        <img src="https://res.cloudinary.com/mhmd/image/upload/v1556670479/product-2_qxjis2.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                                        <div class="ml-3 d-inline-block align-middle">
                                            <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block">Gray Nike running shoe</a></h5><span class="text-muted font-weight-normal font-italic">Category: Fashion</span>
                                        </div>
                                    </div>
                                <td class="align-middle"><strong>$79.00</strong></td>
                                <td class="align-middle"><strong>3</strong></td>
                                <td class="align-middle"><a href="#" class="text-dark"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
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
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                    <div class="p-4">
                        <p class="font-italic mb-4">Shipping and additional costs are calculated based on values you have entered.</p>
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>$390.00</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Shipping and handling</strong><strong>$10.00</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>$0.00</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                <h5 class="font-weight-bold">$400.00</h5>
                            </li>
                        </ul><a href="{!! route('site.cart.create') !!}" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
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


