@extends('layouts.app')

@section('body')

    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Inloggen</h5>
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="inputEmail">E-mail</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="inputPassword">Wachtwoord</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                {{--<input type="checkbox" class="custom-control-input" id="customCheck1">--}}
                                <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="custom-control-label" for="customCheck1">Wachtwoord onthouden</label>
                            </div>

                            <a class="btn btn-block btn-link" href="{{ route('password.request') }}">
                                Wachtwoord vergeten?
                            </a>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Inloggen</button>

                            <hr class="my-4">
                            <a href="{!! route('login.redirect', 'facebook') !!}" class="btn btn-lg btn-facebook btn-block text-uppercase">login met Facebook</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
<link href="{{ asset('/css/site/login.css') }}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="/styles/responsive.css">
@endpush

@push('js')
<script src="/js/custom.js"></script>
@endpush
