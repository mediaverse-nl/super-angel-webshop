@extends('layouts.app')

@section('body')
    <div class="container product_section_container">
        <div class="row">
            <div class="col product_section clearfix">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Men's</a></li>
                    </ul>
                </div>

                <!-- Sidebar -->

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
                        <div class="sidebar_section">
                            <div class="sidebar_title">
                                <h5>{{$p[0]->p_value}}</h5>
                            </div>
                            <ul class="checkboxes {{count($p) > 5 ? '' : 'active'}}" id="{{$p[0]->p_value}}">
                                @foreach($p as $arr)
                                    <li data-isotope-checkboxes='{ "sortBy": "{{$arr->d_value}}" }'>
                                        <i class="fa fa-square-o" aria-hidden="true"></i>
                                        <span>{{$arr->d_value}}  - {{$arr->d_count}}</span>
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
                                            <span class="type_sorting_text">Default Sorting</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_type">
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                                <li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <span>Show</span>
                                            <span class="num_sorting_text">6</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_num">
                                                <li class="num_sorting_btn"><span>8</span></li>
                                                <li class="num_sorting_btn"><span>16</span></li>
                                                <li class="num_sorting_btn"><span>24</span></li>
                                                <li class="num_sorting_btn"><span>50</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="pages d-flex flex-row align-items-center">
                                        <div class="page_current">
                                            <span>1</span>
                                            <ul class="page_selection">
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                            </ul>
                                        </div>
                                        <div class="page_total"><span>of</span> 3</div>
                                        <div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
                                    </div>

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
                                            <span>Show:</span>
                                            <span class="num_sorting_text">04</span>
                                            <i class="fa fa-angle-down"></i>
                                            <ul class="sorting_num">
                                                <li class="num_sorting_btn"><span>01</span></li>
                                                <li class="num_sorting_btn"><span>02</span></li>
                                                <li class="num_sorting_btn"><span>03</span></li>
                                                <li class="num_sorting_btn"><span>04</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <span class="showing_results">Showing 1–3 of 12 results</span>
                                    <div class="pages d-flex flex-row align-items-center">
                                        <div class="page_current">
                                            <span>1</span>
                                            <ul class="page_selection">
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                            </ul>
                                        </div>
                                        <div class="page_total"><span>of</span> 3</div>
                                        <div id="next_page_1" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
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
@endpush

@push('js')
    <script src="/js/categories_custom.js" type="text/javascript"></script>
@endpush