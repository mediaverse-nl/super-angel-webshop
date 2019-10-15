@extends('layouts.app')

@section('body')
    <div class="container product_section_container">
        <div class="row">
            <div class="col product_section clearfix">

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="{!! route('home') !!}">Home</a></li>
                        <li><a href="{!! route('site.category.index') !!}"><i class="fa fa-angle-right" aria-hidden="true"></i>Categories</a></li>
                        <li class="active"><a href="{!! route('site.category.index') !!}"><i class="fa fa-angle-right" aria-hidden="true"></i>{!! $category->value !!}</a></li>
                    </ul>
                </div>


                <div class="sidebar">


                    {!! Form::open(['route' => ['site.category.show', $category->id], 'method' => 'get', 'id' => 'filterForm']) !!}

                        {{--categories--}}
                        <div class="sidebar_section">
                            <div class="sidebar_title">
                                <h5>Categorieën</h5>
                            </div>
                            <ul class="sidebar_categories">
                                @foreach($categories as $category)
                                    <li class="{!! $category->id == $id ? 'active' : '' !!}">
                                        <a href="{!! route('site.category.show', $category->id) !!}">
                                            @if($category->id == $id)
                                                <span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
                                            @endif
                                            {!! $category->value !!}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <br>

                        {{--{!! dd($baseProducts) !!}--}}

                        @if(floor($baseProducts->min('price')) !== number_format($baseProducts->max('price'),0))
                            <div class="sidebar_s ection" style="margin-bottom: 30px !important; padding-bottom: 30px !important;">
                                <div class="sidebar_title">
                                    <h5>Prijsrange</h5>
                                </div>
                                <p>
                                    <span id="minPriceSpan">
                                        <input name="priceRangeMin" value="" type="text" readonly oninput="validity.valid||(value='1');" id="min_price" class="price-range-field" />
                                    </span>
                                    <span id="maxPriceSpan">
                                        <input name="priceRangeMax" value="" type="text" readonly oninput="validity.valid||(value='{!! $baseProducts->max('price') !!}');" id="max_price" class="price-range-field" />
                                    </span>

                                 </p>
                                <div id="slider-range"></div>
                            </div>
                        @endif

                        {{--{!! dd($filter) !!}--}}
                        {{--filter checkboxes--}}
                        @foreach(collect($baseProperties)->groupBy('property_id') as $p)
                            <fieldset data-group="{{preg_replace("/[^a-zA-Z0-9]/", "", $p[0]->p_value)}}">
                                <div class="sidebar_section">
                                    <div class="sidebar_title">
                                        <h5>{{$p[0]->p_value}}</h5>
                                    </div>
                                    <ul class="checkboxes {{count($p) > 5 ? '' : 'active'}}" id="{{$p[0]->p_value}}">
                                        @foreach($p as $arr)
                                            <li>
                                                {{--<i class="fa fa-square-o" aria-hidden="true" style="display: inline-block !important;:"></i>--}}
                                                <label for="detail{!! $arr->detail_id !!}" class="checkboxLabel" for="{!! $arr->d_value !!}" style="width: 100% !important;">
                                                    {{$arr->d_value}}
                                                    <input type="checkbox"  class="checkmark" id="detail{!! $arr->detail_id !!}" name="checkboxItems[]" value="{!! $arr->d_value !!}" {!! !empty($filter['checkboxItems']) ? (in_array($arr->d_value, $filter['checkboxItems']) ? 'checked' : '') : '' !!}>
                                                    <span class="checkmark"></span>
                                                    <span class="float-right">
                                                        <span class="count float-right">{!! null //$arr->d_count !!}</span>
                                                    </span>
                                                </label>
                                            </li>
                                        @endforeach
                                        {{--<li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>M</span></li>--}}
                                    </ul>
                                    @if(count($p) > 5)
                                        <div class="show_more" data-id="{{$p[0]->p_value}}">
                                            <span><span>+</span>laat meer zien</span>
                                        </div>
                                    @endif
                                </div>
                            </fieldset>
                        @endforeach

                    {!! Form::close() !!}

                </div>

                <!-- Main Content -->
                <div class="main_content">

                    <!-- Products -->
                    <div class="products_iso">
                        <div class="row">
                            <div class="col">

                                <!-- Product Sorting -->
                                <div class="product_sorting_container product_sorting_container_top">
                                    <ul class="product_sorting">
                                        <li>
                                            <span class="type_sorting_text">Standaard</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_type">
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Standaard</span></li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Prijs</span></li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Naam</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <ul class="product_sorting float-right">
                                        <li  style="margin-right: 0px; width: auto !important; padding-right: 20px; border: none">
                                            gevonden product <b>{!! $products->count() !!}</b> van de <b>{!! $baseProducts->count() !!}</b>
                                        </li>
                                    </ul>
                                    <br>
                                    <br>
                                </div>

                                <!-- Product Grid -->

                                <div class="container">
                                    <div class="row" id="prod uctContainers" style="width: 100% !important; padding: 0px !important; margin: 0px;">
                                        @foreach($products as $product)
                                            {{--<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 productContainer"--}}
                                                 {{--style="--}}
                                                    {{--background: #FFFFFF !important;--}}
                                                    {{--padding: 0px 0px !important;--}}
                                                    {{--display: inline-block !important;--}}
                                                {{--" class="{{!empty($product->product->category) ? $product->product->category->value : null}}        @foreach($product->product->productDetails as $x)--}}
{{--                                            {!! preg_replace("/[^a-zA-Z0-9]/", "", $x->detail->value) !!}@endforeach">--}}
                                                @component('components.product-card', [
                                                    'product' => $product->product,
                                                    'classes' => 'col-xs-12 col-sm-12 col-md-6 col-lg-3',
                                                    'style' => 'padding:0px !important;'
                                                    ])
                                                @endcomponent
                                            {{--</div>--}}
                                        @endforeach
                                    </div>
                                </div>

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
    <link rel="stylesheet" type="text/css" href="/styles/categories_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_responsive.css">
    <style>
        .price-range-field{
            width: 49% !important;
            display: inline-block;
            border: none !important;
            padding: 0px;
            margin: 0px;
        }
        #min_price{
            text-align: left;
        }
        #max_price{
            text-align: right;
        }
        .checkboxes li {
            position: relative;
        }
        .checkboxes li i {
            /*position: absolute;*/
            color: #b3b7c8;
            cursor: pointer;
            margin-right: 22px;
        }
        .sidebar_section h5{
            margin-bottom: 10px !important;
        }
        .sidebar_section {
             padding-bottom: 15px !important;
            margin-bottom: 20px !important;
            border-bottom: solid 1px #ebebeb;
        }
        .productContainer > div{
            width: 100% !important;
        }
        /* The container */
        .checkboxLabel {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .checkboxLabel input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 9px;
            left: 0;
            height: 18px;
            width: 18px;
            background-color: #eee;

        }

        /* On mouse-over, add a grey background color */
        .checkboxLabel:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .checkboxLabel input:checked ~ .checkmark {
            background-color: #fe4c50;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .checkboxLabel input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .checkboxLabel .checkmark:after {
            left: 6px;
            top: 1px;
            width: 6px;
            height: 13px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .input-symbol-euro:before {
            position: absolute;
            top: 0;
            content:"€";
            left: 5px;
        }

        /*#min_price{*/
            /*padding-right: 25px;*/
        /*}*/

        /*#minPriceSpan::before {*/
            /*content: "€";*/
            /*!*padding-left: 20px;*!*/
            /*color: black;*/
            /*font-size: 14px;*/
            /*!*left: 3px;*!*/
            /*!*margin-right: 25px;*!*/
            /*position: absolute;*/
            /*line-height: inherit;*/
        /*}*/
        /*#maxPriceSpan::before {*/
            /*content: "€";*/
            /*color: black;*/
            /*font-size: 14px;*/
            /*right: 3px;*/
            /*margin-right: 25px;*/
            /*position: absolute;*/
            /*line-height: inherit;*/
        /*}*/
    </style>

@endpush

@push('js')
    {{--<script src="/js/categories_custom.js" type="text/javascript"></script>--}}
    <script>
        var min = {!! round($baseProducts->min('default_price'), 0) -1 > 0 ? round($baseProducts->min('default_price'), 0) -1 : 1!!};
        var max = {!! round($baseProducts->max('default_price'), 0) +1 !!};
        var setMin = {!! isset($filter['priceRangeMin']) ? $filter['priceRangeMin'] : (round($baseProducts->min('default_price'), 0) -1 > 0 ? round($baseProducts->min('default_price'), 0) -1 : 1) !!};
        var setMax = {!! isset($filter['priceRangeMax']) ? $filter['priceRangeMax'] : round($baseProducts->max('default_price'), 0) +1 !!};
        {{--{!! dd( ($filter['priceRangeMax'])) !!}--}}
        $("#min_price").val(setMin);
        $("#max_price").val(setMax);


//        $("#min_price").before("€");
//        $("#max_price").before("€");

        $("#slider-range").slider({
            range: true,
            orientation: "horizontal",
            min: min,
            max: max,
            values: [setMin, setMax],
            step: 1,
            slide: function (event, ui) {
                console.log('212');

                if (ui.values[0] == ui.values[1]) {
                    return false;
                }

                var minPrice = $("#min_price");
                    minPrice.val(ui.values[0]);

                var maxPrice = $("#max_price");
                    maxPrice.val(ui.values[1]);

                intervalTimer();
            }
        });

        $("#amount").change(function(){
            var priceRange = $('#amount').val();
            console.log(priceRange);
        });


        var timer;
        function intervalTimer() {
            if (timer) clearInterval(timer);
            timer = setInterval(function() {
                clearInterval(timer);
                submitForm();
            }, 1500);
        }
        function submitForm(){
            $( "#filterForm" ).submit();
        }
        $('#datetimepicker1').change(function() {
            intervalTimer();
        });

        $('#filterForm').change(function() {
            intervalTimer();
        });

//        function initCheckboxes()
//        {
        if($('.checkboxes li').length)
        {
            var boxes = $('.checkboxes li');

            boxes.each(function()
            {
                var box = $(this);

                box.on('click', function()
                {
                    if(box.hasClass('active'))
                    {
                        box.find('i').removeClass('fa-square');
                        box.find('i').addClass('fa-square-o');
                        box.toggleClass('active');
                    }
                    else
                    {
                        box.find('i').removeClass('fa-square-o');
                        box.find('i').addClass('fa-square');
                        box.toggleClass('active');
                    }
                    // box.toggleClass('active');
                });
            });

            if($('.show_more').length)
            {
                $('.show_more').on('click', function(e)
                {
                    var checkboxes = $('.checkboxes#'+this.getAttribute('data-id'));
                    var checkboxesActive = $('.checkboxes.active#'+this.getAttribute('data-id'));

                    var contentName = $(this);

                    if(checkboxesActive.length >= 1){
                        contentName.html('<span><span>+</span>laat meer zien</span>')
                    }else {
                        contentName.html('<span><span>-</span>laat minder zien</span>')
                    }

                    checkboxes.toggleClass('active');
                });
            }
        };
//        }
    </script>
@endpush