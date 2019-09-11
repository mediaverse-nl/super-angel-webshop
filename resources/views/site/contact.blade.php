@extends('layouts.app')

@section('body')

    <div class="container contact_container">
        <div class="row">
            <div class="col">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="{!! route('home') !!}">Home</a></li>
                        <li class="active"><a href="{!! route('site.contact.index') !!}"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Map Container -->

        <div class="row">
            <div class="col">
                <div id="google_map">
                    <div class="map_container">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Us -->

        <div class="row">

            <div class="col-lg-6 contact_col">
                <div class="contact_contents">
                    {!! Editor('contact_paragraaf_1', 'richtext', false, 'lorem ipsum') !!}
                </div>

                <!-- Follow Us -->

                <div class="follow_us_contents">
                    <h1>Volg Ons Op</h1>
                    <ul class="social d-flex flex-row">
                        <li><a href="#" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        {{--<li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>--}}
                        <li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>

            </div>

            <div class="col-lg-6 get_in_touch_col">
                <div class="get_in_touch_contents">
                    <h1>Contactformulier</h1>
                    {!! Editor('contact_paragraaf_2', 'richtext', false, '<p>Fill out the form below to recieve a free and confidential.</p>') !!}
                    {!! Form::open(array('route' => 'site.contact.store', 'method' => 'post')) !!}
                        <div>

                            @include('components.error', ['field' => 'naam'])
                            {{ Form::text('naam', null, ['class' => 'form_input input_name input_ph'.(!$errors->has('naam') ? '': ' is-invalid '), 'placeholder' => 'Naam']) }}

                            @include('components.error', ['field' => 'email'])
                            {{ Form::email('email', null, ['class' => 'form_input input_name input_ph'.(!$errors->has('email') ? '': ' is-invalid '), 'placeholder' => 'E-mail']) }}

                            @include('components.error', ['field' => 'bericht'])
                            {{ Form::textarea('bericht', null, ['class' => 'input_ph input_message'.(!$errors->has('bericht') ? '': ' is-invalid '), 'id' => 'input_message', 'placeholder' => 'Bericht/Opmerking']) }}

                        </div>
                        <div>
                            <button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">verzend bericht</button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>

        </div>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="/styles/contact_styles.css">
    <link rel="stylesheet" type="text/css" href="/styles/contact_responsive.css">
@endpush

@push('js')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCkb7vvU9U7_uvJxXdADV4P1BMZv_6Zfas"></script>
    <script src="/js/contact_custom.js"></script>
@endpush


