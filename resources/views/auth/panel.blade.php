 {{----}}

    {{--<div class="container">--}}

        {{--<div class="row">--}}

            {{--<div class="col-lg-3">--}}
                {{--@include('auth.includes.menu')--}}
            {{--</div>--}}
            {{--<!-- /.col-lg-3 -->--}}

            {{--<div class="col-lg-9">--}}



            {{--</div>--}}
            {{--<!-- /.col-lg-9 -->--}}

        {{--</div>--}}
        {{--<!-- /.row -->--}}

    {{--</div>--}}
    {{----}}
    {{--<br>--}}
@extends('layouts.app')

@section('breadcrumb')
    {!! Breadcrumbs::render('auth.order.index') !!}
@endsection

@section('body')
    <div class="container product_section_container">

        <div class="row" style="margin-top:150px !important;">
            <div class="banner">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            @include('auth.includes.menu')
                        </div>
                        <div class="col-9">


                            {!! Form::model(auth()->user(), ['class' => 'form-horizontal']) !!}
                            <div class="row justify-content-md-center">

                                <div class="get_in_touch_contents col-12 col-sm-12 col-md-8 col-lg-10">


                                    <div class="form-group row" style="margin: 0px;">
                                        {!! Form::label('email', 'E-mail *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                                        <div class="col-12 col-lg-9 col-md-7">
                                            {!! Form::email('email', null, ['disabled', 'class' => 'form_input'.(!$errors->has('email') ? '': ' is-invalid ')]) !!}
                                            @include('components.error', ['field' => 'email'])
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin: 0px;">
                                        {!! Form::label('naam', 'Naam *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                                        <div class="col-12 col-lg-9 col-md-7">
                                            {!! Form::text('naam', null, ['disabled', 'class' => 'form_input'.(!$errors->has('naam') ? '': ' is-invalid ')]) !!}
                                            @include('components.error', ['field' => 'naam'])
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row" style="margin: 0px;">
                                        {!! Form::label('straat', 'Straat *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                                        <div class="col-12 col-lg-9 col-md-7">
                                            {!! Form::text('straat', null, ['disabled', 'class' => 'form_input'.(!$errors->has('straat') ? '': ' is-invalid ')]) !!}
                                            @include('components.error', ['field' => 'straat'])
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin: 0px;">
                                        {!! Form::label('Huisnummer', 'Huisnummer *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                                        <div class="col-12 col-lg-9 col-md-7">
                                            {!! Form::text('huisnummer', null, ['disabled', 'class' => 'form_input'.(!$errors->has('huisnummer') ? '': ' is-invalid ')]) !!}
                                            @include('components.error', ['field' => 'huisnummer'])
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin: 0px;">
                                        {!! Form::label('postcode', 'Postcode *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                                        <div class="col-12 col-lg-9 col-md-7">
                                            {!! Form::text('postcode', null, ['disabled', 'class' => 'form_input'.(!$errors->has('postcode') ? '': ' is-invalid ')]) !!}
                                            @include('components.error', ['field' => 'postcode'])
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin: 0px;">
                                        {!! Form::label('woonplaats', 'Woonplaats *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                                        <div class="col-12 col-lg-9 col-md-7">
                                            {!! Form::text('woonplaats', null, ['disabled', 'class' => 'form_input'.(!$errors->has('woonplaats') ? '': ' is-invalid ')]) !!}
                                            @include('components.error', ['field' => 'woonplaats'])
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin: 0px;">
                                        {!! Form::label('land', 'Land *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                                        <div class="col-12 col-lg-9 col-md-7">
                                            {!! Form::select('land', ['nederland' => 'nederland', 'belgie' => 'belgie'], null, ['disabled', 'class' => 'form_input'.(!$errors->has('land') ? '': ' is-invalid ')]) !!}
                                            @include('components.error', ['field' => 'land'])
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row" style="margin: 0px;">
                                        {!! Form::label('telefoonnummer_vast', 'Telefoonnummer vast', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                                        <div class="col-12 col-lg-9 col-md-7">
                                            {!! Form::text('telefoonnummer_vast', null, ['disabled', 'class' => 'form_input'.(!$errors->has('telefoonnummer_vast') ? '': ' is-invalid ')]) !!}
                                            @include('components.error', ['field' => 'telefoonnummer_vast'])
                                        </div>
                                    </div>
                                    <div class="form-group row" style="margin: 0px;">
                                        {!! Form::label('telefoonnummer_mobiel', 'Telefoonnummer mobiel *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                                        <div class="col-12 col-lg-9 col-md-7">
                                            {!! Form::text('telefoonnummer_mobiel', null, ['disabled', 'class' => 'form_input'.(!$errors->has('telefoonnummer_mobiel') ? '': ' is-invalid ')]) !!}
                                            @include('components.error', ['field' => 'telefoonnummer_mobiel'])
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {!! Form::close() !!}
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

     <link rel="stylesheet" type="text/css" href="/styles/contact_styles.css">
     <link rel="stylesheet" type="text/css" href="/styles/contact_responsive.css">
    <style>
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
        .list-group a{
            color: #fe4c50;
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
        .form-check.is-invalid{
            color: #dc3545!important;
        }
        .form_input.is-invalid{
            border-color: #dc3545!important;
        }

        .form_input{
            margin-bottom: 0px;
            margin-top: 20px;
        }
        .col-form-label {
            margin-top: 15px !important;
        }

    </style>
@endpush

@push('js')
    <script src="/js/categories_custom.js" type="text/javascript"></script>
@endpush