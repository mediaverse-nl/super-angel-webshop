@extends('layouts.app')

@section('body')
    <!-- Slider -->

    <div class="container single_product_container">
        <div class="row">
            <div class="col">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="{!! route('home') !!}">Home</a></li>
                        <li><a href="{!! route('site.category.index') !!}"><i class="fa fa-angle-right" aria-hidden="true"></i>Categories</a></li>
                        @if($product->category)
                            <li><a href="{!! route('site.category.show', $product->category->id) !!}"><i class="fa fa-angle-right" aria-hidden="true"></i>{!! $product->category->value !!}</a></li>
                        @endif
                        <li class="active"><a href="{!! route('site.product.show', [$product->title, $product->id]) !!}"><i class="fa fa-angle-right" aria-hidden="true"></i>{!! $product->title !!}</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <div class="single_product_pics">
                    <div class="row">
                        <div class="col-lg-3 thumbnails_col order-lg-1 order-2">
                            <div class="single_product_thumbnails">
                                <ul>
{{--                                    {!! dd() !!}--}}
                                    @if(!empty($product->images()))
                                        @foreach($product->images() as $i)
                                            @if ($loop->first)
                                                <li class="active">
                                                    <img src="{!! $product->thumbnail() !!}" alt="" data-image="{!! $product->thumbnail() !!}" style="height: 100%; object-fit: cover;">
                                                </li>
                                            @else
                                                <li><img src="{!! $i !!}" alt="" data-image="{!! $i !!}" style="height: 100%; object-fit: cover;"></li>
                                            @endif
                                        @endforeach
                                    @endif
                                    {{--<li><img src="/images/desc_1.jpg" alt="" data-image="/images/desc_1.jpg"></li>--}}
                                    {{--<li><img src="/images/single_1_thumb.jpg" alt="" data-image="/images/single_1.jpg"></li>--}}
                                    {{--<li><img src="/images/single_3_thumb.jpg" alt="" data-image="/images/single_3.jpg"></li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 image_col order-lg-2 order-1">
                            <div class="single_product_image">
                                <div class="single_product_image_background" style="background-image:url('{!! $product->thumbnail() !!}')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="product_details">
                    <div class="product_details_title">
                        <h2>{!! $product->title !!}</h2>
                        <p>{!! $product->description !!}</p>
                    </div>
                    @if($product->productPrice >= 75)
                        <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                            <span class="ti-truck"></span><span>gratis verzending</span>
                        </div>
                    @endif
                    @if( $product->discount)
                        <div class="original_price">{!! $product->productPrice !!}</div>
                        <div class="product_price">&euro;{!! $product->price() !!}</div>
                    @else
                        <div class="product_price">{!! $product->productPrice !!}</div>
                    @endif
                    <ul class="star_rating" style="margin-right: 10px;">
                        @for($i = 1; $i <= ceil($product->reviews->avg('rating') ); $i++)
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        @endfor
                        @for($i = 1; $i <= 5 - ceil($product->reviews->avg('rating') ); $i++)
                            <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                        @endfor
                    </ul>
                    <small><b>{!! $product->reviews->avg('rating') == null ?  'geen reviews' :   $product->reviews->avg('rating').' / 5'!!} </b></small>


                    <br>
                    <br>
                    <table>
                    @foreach($product->productDetails as $d)
                        <tr>
                            <td style="padding: 2px 5px;"><b>{!! $d->detail->property->value !!}:</b></td>
                            <td>{!! $d->detail->value !!}</td>
                        </tr>
                    @endforeach
                    </table> 
                    <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                        <span>Aantal:</span>

                        <div class="quantity_selector">
                            <span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
                            <span id="quantity_value">1</span>
                            <span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        </div>

                        @if($product->stock >= 1)
                            {!! Form::model($product, array('route' => 'site.cart.add', 'method' => 'post')) !!}
                                <input type="hidden" value="1" name="qty" id="qtyInput">
                                <input type="hidden" value="{{$product->id}}" name="product_id" class="pull-left">
                                <button class="red_button add_to_cart_button" style="color: #FFFFFF; border: none !important;">winkelmandje</button>
                            {{ Form::close() }}
                        @else
                            <button class="red_button add_to_cart_button disabled" style="color: #FFFFFF; border: none !important;">winkelmandje</button>

                        @endif

                        {{--<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>--}}
                        <div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Tabs -->

    <div class="tabs_section_container">

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabs_container">
                        <ul class="tabs d-flex flex-sm-row flex-column align-items-left align-items-md-center justify-content-center">
                            {{--<li class="tab active" data-active-tab="tab_1"><span>Description</span></li>--}}
                            <li class="tab " data-active-tab="tab_2"><span>Product Informatie</span></li>
                            <li class="tab active" data-active-tab="tab_3"><span>Reviews (2)</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <!-- Tab Additional Info -->

                    <div id="tab_2" class="tab_container ">
                        <div class="row">
                            <div class="col additional_info_col">
                                <div class="tab_title additional_info_title">
                                    <h4>Product Informatie</h4>
                                </div>

                                @foreach($product->productDetails as $d)
                                    <p>{!! $d->detail->property->value !!}:<span>{!! $d->detail->value !!}</span></p>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <!-- Tab Reviews -->

                    <div id="tab_3" class="tab_container active">
                        <div class="row">

                            <!-- User Reviews -->

                            <div class="col-lg-6 reviews_col">
                                <div class="tab_title reviews_title">
                                    <h4>Reviews ({!! $product->reviews->count() !!})</h4>
                                </div>

                                <!-- User Review -->

                                @foreach($product->reviews()->orderBy('id')->get() as $r)
                                    <div class="user_review_container d-flex flex-column flex-sm-row">
                                        <div class="user">
                                            <div class="user_pic"></div>
                                            <div class="user_rating">
                                                <ul class="star_rating">
                                                    @for($i = 1; $i <= $r->rating; $i++)
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    @endfor
                                                    @for($i = 1; $i <= 5 - $r->rating; $i++)
                                                        <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                    @endfor
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="review">
                                            <div class="review_date">{!! $r->created_at->format('d M Y - H:i') !!}</div>
                                            <div class="user_name">{!! $r->naam !!}</div>
                                            <p>{!! $r->text !!}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <!-- Add Review -->

                            <div class="col-lg-6 add_review_col">

                                <div class="add_review">

                                    @if(auth()->check())
                                    {!! Form::open(array('route' => 'site.review.store', 'method' => 'POST', 'id' => 'review_form')) !!}
                                        <div>
                                            <h1>Schrijf een review</h1>
                                            <br>
                                            {!! Form::hidden('product_id', encrypt($product->id)) !!}
                                            {!! Form::hidden('beoordeling', null, ['id' => 'ratingInput']) !!}
                                            {!! Form::text('naam', auth()->user()->name, ['id' => 'review_name', 'style' => 'margin-top: 0px !important;', 'placeholder' => 'Naam *', 'class' => 'form_input input_name'.(!$errors->has('naam') ? '': ' is-invalid ')]) !!}
                                            @include('components.error', ['field' => 'naam'])
                                        </div>
                                        <div>
                                            <h1>Uw Beoordeling:</h1>
                                            <ul class="user_star_rating">
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                                            </ul>
                                            @include('components.error', ['field' => 'beoordeling'])
                                            <br>
                                            <br>
                                            {!! Form::textarea('text', null, ['id' => 'review_message', 'rows' => 4, 'style' => 'margin-top: 0px !important;', 'placeholder' => 'Schrijf je review hier', 'class' => 'input_review'.(!$errors->has('text') ? '': ' is-invalid ')]) !!}
                                            @include('components.error', ['field' => 'text'])
                                        </div>
                                        <div class="text-left text-sm-right">
                                            <button id="review_submit" type="submit" class="red_button review_submit_btn trans_300" value="Submit">submit</button>
                                        </div>

                                    {{ Form::close() }}

                                </div>

                            @else
                                <div>
                                    <h1>Je moet ingelogd zijn om een review te schrijven</h1>
                                    <br>
                                </div>
                                <div class="">
                                    <a href="{!! route('login') !!}" id="review_submit" class="red_button review_submit_btn trans_300" >Inloggen</a> <span style="padding: 15px;">of</span>
                                    <a href="{!! route('register') !!}" id="review_submit" class="red_button review_submit_btn trans_300" >Registeren</a>
                                </div>
                            @endif
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    @include('includes.benefit')


@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="/styles/single_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/single_responsive.css">
@endpush

@push('js')
    <script src="/js/single_custom.js"></script>
    <script>

    </script>
@endpush