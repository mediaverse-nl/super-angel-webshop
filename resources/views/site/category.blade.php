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
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Product Category</h5>
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

                    <!-- Price Range Filtering -->
                    <div class="sidebar_section">
                        <div class="sidebar_title">
                            <h5>Filter by Price</h5>
                        </div>
                        <p>
                            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                        </p>
                        <div id="slider-range"></div>
                        <div class="filter_button"><span>filter</span></div>
                    </div>

                    @foreach(collect($baseProperties)->groupBy('property_id') as $p)
                        <fieldset data-group="{{preg_replace("/[^a-zA-Z0-9]/", "", $p[0]->p_value)}}">
                            <div class="sidebar_section">
                                <div class="sidebar_title">
                                    <h5>{{$p[0]->p_value}}</h5>
                                </div>
                                <ul class="checkboxes {{count($p) > 5 ? '' : 'active'}}" id="{{$p[0]->p_value}}">
                                    @foreach($p as $arr)
                                        <li>

                                            {{--<i class="fa fa-square-o" aria-hidden="true"></i>--}}
                                            <label class="selected_detail" for="{!! $arr->d_value !!}" style="width: 100% !important;">
                                                <input type="checkbox" id="detail" name="{!! $p[0]->p_value!!}" value=".{!! preg_replace("/[^a-zA-Z0-9]/", "", $arr->d_value) !!}">
                                                {{--(<span class="count">0</span>)--}}

                                                {{$arr->d_value}}
                                                {{--<span class="float-right">--}}
                                                    <span class="count float-right">0</span>
                                                {{--</span>--}}
                                            </label>

                                        </li>
                                    @endforeach
                                    {{--<li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>M</span></li>--}}
                                </ul>
                                @if(count($p) > 5)
                                    <div class="show_more" data-id="{{$p[0]->p_value}}">
                                        <span><span>+</span>Show More</span>
                                    </div>
                                @endif
                            </div>
                        </fieldset>
                    @endforeach

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
                                        <li>
                                            <span>Zichtbaar:</span>
                                            <i class="fa fa-angle-down"></i>
                                            <span class="num_sorting_text  float-right  " style="padding: 0px 15px; margin-left: 0px;">6</span>
                                            <ul class="sorting_num">
                                                <li class="num_sorting_btn"><span>8</span></li>
                                                <li class="num_sorting_btn"><span>16</span></li>
                                                <li class="num_sorting_btn"><span>24</span></li>
                                                <li class="num_sorting_btn"><span>50</span></li>
                                                <li class="num_sorting_btn"><span>100</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    {{--<div class="pages d-flex flex-row align-items-center">--}}
                                        {{--<div class="page_current">--}}
                                            {{--<span>1</span>--}}
                                            {{--<ul class="page_selection">--}}
                                                {{--<li><a href="#">1</a></li>--}}
                                                {{--<li><a href="#">2</a></li>--}}
                                                {{--<li><a href="#">3</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="page_total"><span>of</span> 3</div>--}}
                                        {{--<div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>--}}
                                    {{--</div>--}}

                                </div>

                                <!-- Product Grid -->

                                <div class="product-grid">
                                    @foreach($products as $product)
                                        @component('components.product-card', ['product' => $product])
                                        @endcomponent
                                    @endforeach
                                </div>

                                <!-- Product Sorting -->

                                <div class="product_sorting_container product_sorting_container_bottom clearfix">
                                    <ul class="product_sorting">
                                        <li>
                                            <span>Zichtbaar:</span>
                                            <i class="fa fa-angle-down"></i>
                                            <span class="num_sorting_text float-right" style="padding: 0px 5px; margin-left: 0px;">6</span>
                                            <ul class="sorting_num">
                                                <li class="num_sorting_btn"><span>8</span></li>
                                                <li class="num_sorting_btn"><span>16</span></li>
                                                <li class="num_sorting_btn"><span>24</span></li>
                                                <li class="num_sorting_btn"><span>50</span></li>
                                                <li class="num_sorting_btn"><span>100</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    {{--<span class="showing_results">Showing 1–3 of 12 results</span>--}}
                                    {{--<div class="pages d-flex flex-row align-items-center">--}}
                                        {{--<div class="page_current">--}}
                                            {{--<span>1</span>--}}
                                            {{--<ul class="page_selection">--}}
                                                {{--<li><a href="#">1</a></li>--}}
                                                {{--<li><a href="#">2</a></li>--}}
                                                {{--<li><a href="#">3</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                        {{--<div class="page_total"><span>of</span> 3</div>--}}
                                        {{--<div id="next_page_1" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>--}}
                                    {{--</div>--}}

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
@endpush

@push('js')
    <script src="/js/categories_custom.js" type="text/javascript"></script>
@endpush