@extends('layouts.app')

@section('body')
    <div class="container product_section_container" style="margin-top: 150px; ">
        <div class="row">
            <div class="col">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="{!! route('home') !!}">Home</a></li>
                        <li class="active"><a href="{!! route('site.category.index') !!}"><i class="fa fa-angle-right" aria-hidden="true"></i>Categories</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="row" >
            <div class="banner" style="margin-top: 0px !important;">
                <div class="container">
                    <div class="row">
                        @foreach($categories as $category)
                            @component('components.category-card', ['category' => $category])
                            @endcomponent
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('includes.benefit')

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/responsive.css">

    <link rel="stylesheet" type="text/css" href="/styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/contact_responsive.css">
@endpush

@push('js')
    <script src="/js/categories_custom.js" type="text/javascript"></script>
@endpush