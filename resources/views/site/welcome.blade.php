@extends('layouts.app')

@section('body')
    <!-- Slider -->

    <div class="main_slider" style="background-image:url(images/slider_1.jpg)">
        <div class="container fill_height">
            <div class="row align-items-center fill_height">
                <div class="col">
                    <div class="main_slider_content">
                        {!! Editor('welcome_banner_notitie', 'richtext', false, '<h6>Spring / Summer Collection 2017</h6><h1>Get up to 30% Off New Arrivals</h1>') !!}
                        <div class="red_button shop_now_button"><a href="{!! route('site.category.show', 1) !!}">Nu winkelen</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->

    <div class="banner">
        <div class="container">
            <div class="row">
                @foreach($categories->take(3) as $category)
                    @component('components.category-card', ['category' => $category])
                    @endcomponent
                @endforeach
            </div>
        </div>
    </div>

    @include('includes.new-arrivals')

    <div class="deal_ofthe_week" style="padding-bottom: 50px;">
        @include('includes.best-seller')
    </div>

    @include('includes.benefit')
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/responsive.css">
@endpush

@push('js')
    <script src="/js/custom.js"></script>
@endpush


