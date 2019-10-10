@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('auth.order.show', $order) !!}
@endsection

@section('body')
    <div class="container product_section_container">

        <div class="row" style="margin-top:150px !important;">
            <div class="banner">
                <div class="container">
                    <div class="row">

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3">
                                    @include('auth.includes.menu')
                                </div>
                                <div class="col-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="">Bestelling</h2>

                                            We hebben uw bestelling goed ontvangen
                                            <br>
                                            <br>
                                            Zie hier uw factuur
                                            <br>


                                        </div>
                                    </div>
                                </div>
                            </div>
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