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
                {!! Form::model(auth()->user(), ['route' => ['site.order.store'], 'method' => 'POST', 'style' => 'width: auto !important;']) !!}
                    <h1>Bestelling afronden</h1>
                    <p>Vul het formulier in en druk op <b>bestelling afronden</b> om naar betalen te gaan.</p>
                    <br>
                    <small class="muted"><b>Alle velden met een * moeten ingevuld zijn.</b></small>
                    <br>
                    <div class="form-group row" style="margin: 0px;">
                        {!! Form::label('email', 'E-mail *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                        <div class="col-12 col-lg-9 col-md-7">
                            {!! Form::email('email', null, ['class' => 'form_input'.(!$errors->has('email') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 0px;">
                        {!! Form::label('naam', 'Naam *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                        <div class="col-12 col-lg-9 col-md-7">
                            {!! Form::text('naam', null, ['class' => 'form_input'.(!$errors->has('naam') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'naam'])
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row" style="margin: 0px;">
                        {!! Form::label('straat', 'Straat *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                        <div class="col-12 col-lg-9 col-md-7">
                            {!! Form::text('straat', null, ['class' => 'form_input'.(!$errors->has('straat') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'straat'])
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 0px;">
                        {!! Form::label('Huisnummer', 'Huisnummer *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                        <div class="col-12 col-lg-9 col-md-7">
                            {!! Form::text('huisnummer', null, ['class' => 'form_input'.(!$errors->has('huisnummer') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'huisnummer'])
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 0px;">
                        {!! Form::label('postcode', 'Postcode *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                        <div class="col-12 col-lg-9 col-md-7">
                            {!! Form::text('postcode', null, ['class' => 'form_input'.(!$errors->has('postcode') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'postcode'])
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 0px;">
                        {!! Form::label('woonplaats', 'Woonplaats *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                        <div class="col-12 col-lg-9 col-md-7">
                            {!! Form::text('woonplaats', null, ['class' => 'form_input'.(!$errors->has('woonplaats') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'woonplaats'])
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 0px;">
                        {!! Form::label('land', 'Land *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                        <div class="col-12 col-lg-9 col-md-7">
                            {!! Form::select('land', ['nederland' => 'nederland', 'belgie' => 'belgie'], null, ['class' => 'form_input'.(!$errors->has('land') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'land'])
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row" style="margin: 0px;">
                        {!! Form::label('telefoonnummer_vast', 'Telefoonnummer vast', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                        <div class="col-12 col-lg-9 col-md-7">
                            {!! Form::text('telefoonnummer_vast', null, ['class' => 'form_input'.(!$errors->has('telefoonnummer_vast') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'telefoonnummer_vast'])
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 0px;">
                        {!! Form::label('telefoonnummer_mobiel', 'Telefoonnummer mobiel *', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                        <div class="col-12 col-lg-9 col-md-7">
                            {!! Form::text('telefoonnummer_mobiel', null, ['class' => 'form_input'.(!$errors->has('telefoonnummer_mobiel') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'telefoonnummer_mobiel'])
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row" style="margin: 0px;">
                        {!! Form::label('aflevernotitie', 'Aflevernotitie', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                        <div class="col-12 col-lg-9 col-md-7">

                            {!! Form::text('aflevernotitie', null, ['class' => 'form_input'.(!$errors->has('aflevernotitie') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'aflevernotitie'])
                        </div>
                    </div>
                    <div class="form-group row" style="margin: 0px;">
                        {!! Form::label('Opmerking bij bestelling', 'Opmerking bij bestelling', ['class' => 'col-12 col-lg-3 col-md-5 col-form-label font-weight-bold']) !!}
                        <div class="col-12 col-lg-9 col-md-7 col-">
                            {!! Form::textarea('opmerking', null, ['class' => 'form_input'.(!$errors->has('opmerking') ? '': ' is-invalid '), 'rows' => '3', 'style' => 'height: auto !important;']) !!}
                            @include('components.error', ['field' => 'opmerking'])
                        </div>
                    </div>
                    <div class="form-check row" style="margin: 0px;">
                        <div class="col-12 col-lg-9 col-md-7 float-right" style="padding-left: 30px; padding-top: 20px;">
                            <div class="form-check form-check-inline float-right {!! !$errors->has('algemene_voorwaarden') ? '': ' is-invalid ' !!}">
                                <input class="form-check-input form-check-label" type="checkbox" name="algemene_voorwaarden" id="algemeneVoorwaarden" style="margin-left: -10px;">
                                <label class="form-check-label font-weight-bold" for="algemeneVoorwaarden">
                                    Gaat u akkoort met de <a href="{!! route('site.terms') !!}">algemene voorwaarden</a> en
                                    <a href="{!! route('site.privacy') !!}">privacy statement</a> van site.nl
                                    @include('components.error', ['field' => 'algemene_voorwaarden'])
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button id="review_submit" type="submit" class="float-right red_button newsletter_submit_btn trans_300" style="padding: 20px !important; width: 100% !important;" value="Submit">bestelling afronden</button>
                    </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="/styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/contact_responsive.css">

<style>
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


