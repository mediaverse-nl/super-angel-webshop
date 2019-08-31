@extends('layouts.app')

@section('body')
    <div class="container product_section_container">

        <div class="row" style="margin-top:150px !important;">
            <div class="banner">
                <div class="container">
                    <div class="row">
                        <div class="col-10 mx-auto">
                            <h1 class="py-1 text-center" style="font-size: 50px !important;">Over Ons</h1>
                            <div class="accordion" id="faq">

                            </div>
                            <br>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <!--container-->
            </div>
        </div>

    </div>

    {{--@include('includes.benefit')--}}

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/responsive.css">
<style>
    #faq .card{
        border-radius: 0px;
    }
    #faq .card .card-header{
        background: #fafafa;
    }
    .faq-container{
        border-top: 1px solid rgba(0, 0, 0, 0.125);
        padding: 20px 15px;
        background: #FFFFFF;
    }
</style>
@endpush

@push('js')
    <script src="/js/categories_custom.js" type="text/javascript"></script>

@endpush