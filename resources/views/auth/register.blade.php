@extends('layouts.app')

@section('body')

<div class="container" style="margin-top: 150px;">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h3 class="card-title text-center">Registeren</h3>
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">

                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="inputName">Naam</label>
                            <input id="name" type="text" class="form_input input_name input_ph" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="inputEmail">E-mail</label>
                            <input id="email" type="email" class="form_input input_name input_ph" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm">Wachtwoord</label>
                            <input id="password-confirm" type="password" class="form_input input_name input_ph" name="password_confirmation" required>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="inputPassword">Wachtwoord</label>
                            <input id="password" type="password" class="form_input input_name input_ph" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registeren</button>

                        <hr class="my-4">
                        <a href="{!! route('login.redirect', 'facebook') !!}" class="btn btn-lg btn-facebook btn-block text-uppercase">
                            <i class="fa fa-facebook-square"></i> registeren met Facebook
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<link href="{{ asset('/css/site/login.css') }}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="/styles/responsive.css">
@endpush

@push('js')
<script src="/js/custom.js"></script>
@endpush
