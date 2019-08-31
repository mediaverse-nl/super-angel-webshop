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

        <div class="row justify-content-md-center">

            <div class="get_in_touch_contents col-12 col-sm-12 col-md-8 col-lg-8">
                {!! Form::open(['route' => ['admin.category.store'], 'method' => 'POST', 'style' => 'width: auto !important;']) !!}
                <h1>Get In Touch With Us!</h1>
                <p>Fill out the form below to recieve a free and confidential.</p>
                     <br>

                        <div class="form-group row" style="margin: 0px;">
                            {!! Form::label('email', 'E-mail', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                            {!! Form::email('email', null, ['class' => 'col-12 col-lg-9 col-md-7 form_input'.(!$errors->has('value') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>
                        <div class="form-group row" style="margin: 0px;">
                            {!! Form::label('Naam', 'Naam', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                            {!! Form::text('email', null, ['class' => 'col-12 col-lg-9 col-md-7 form_input'.(!$errors->has('value') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>
                        <div class="form-group row" style="margin: 0px;">
                            {!! Form::label('Straat', 'Straat', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                            {!! Form::text('email', null, ['class' => 'col-12 col-lg-9 col-md-7 form_input'.(!$errors->has('value') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>
                        <div class="form-group row" style="margin: 0px;">
                            {!! Form::label('Huisnummer', 'Huisnummer', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                            {!! Form::text('email', null, ['class' => 'col-12 col-lg-9 col-md-7 form_input'.(!$errors->has('value') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>
                        <div class="form-group row" style="margin: 0px;">
                            {!! Form::label('Postcode', 'Postcode', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                            {!! Form::text('Postcode', null, ['class' => 'col-12 col-lg-9 col-md-7 form_input'.(!$errors->has('value') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>
                        <div class="form-group row" style="margin: 0px;">
                            {!! Form::label('Woonplaats', 'Woonplaats', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                            {!! Form::text('Woonplaats', null, ['class' => 'col-12 col-lg-9 col-md-7 form_input'.(!$errors->has('value') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>
                        <div class="form-group row" style="margin: 0px;">
                            {!! Form::label('Land', 'Land', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                            {!! Form::text('Land', null, ['class' => 'col-12 col-lg-9 col-md-7 form_input'.(!$errors->has('value') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>
                        <div class="form-group row" style="margin: 0px;">
                            {!! Form::label('Telefoonnummer vast', 'Telefoonnummer vast', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                            {!! Form::text('Land', null, ['class' => 'col-12 col-lg-9 col-md-7 form_input'.(!$errors->has('value') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>
                        <div class="form-group row" style="margin: 0px;">
                            {!! Form::label('Telefoonnummer mobiel', 'Telefoonnummer mobiel', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                            {!! Form::text('Land', null, ['class' => 'col-12 col-lg-9 col-md-7 form_input'.(!$errors->has('value') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>
                        <div class="form-group row" style="margin: 0px;">
                            {!! Form::label('Aflevernotitie', 'Aflevernotitie', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                            {!! Form::text('Land', null, ['class' => 'col-12 col-lg-9 col-md-7 form_input'.(!$errors->has('value') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>
                        <div class="form-group row" style="margin: 0px;">
                            {!! Form::label('Opmerking bij bestelling', 'Opmerking bij bestelling', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                            {!! Form::textarea('Land', null, ['class' => 'col-12 col-lg-9 col-md-7 form_input'.(!$errors->has('value') ? '': ' is-invalid '), 'rows' => '3', 'style' => 'height: auto !important;']) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>
                        <div class="form-group row" style="margin: 0px;">
                            <div class="col-12 col-lg-3 col-md-5 "></div>
                            <div class="col-12 col-lg-9 col-md-7 ">
                                <div class="form-check form-check-inline float-right">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" style="margin-left: -10px;">
                                    <label class="form-check-label font-weight-bold" for="defaultCheck1">
                                        Gaat u akkoort met de algemene voorwaarden en privacy statement van site.nl
                                    </label>
                                </div>
                            </div>
                            @include('components.error', ['field' => 'email'])
                        </div>

                    <button id="review_submit" type="submit" class="float-right red_button newsletter_submit_btn trans_300" style="padding: 20px !important; width: auto !important;" value="Submit">bestelling afronden</button>

                {!! Form::close() !!}
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


