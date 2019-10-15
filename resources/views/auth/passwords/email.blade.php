@extends('layouts.app')

@section('body')

    <div class="container" style="margin-top: 150px;">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h3 class="card-title text-center">Wachtwoord reset</h3>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="form-group col-12">
                                <label for="inputEmail">E-mail</label>
                                <input id="email" type="email" class=" {!! $errors->has('email') ? 'is-invalid' : '' !!} form_input input_name input_ph" name="email" value="{{ old('email') }}" required="" autofocus="">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-12">
                                <button type="submit" class=" btn btn-primary btn-block">
                                    Stuur wachtwoord reset e-mail
                                </button>
                            </div>

                            {{--<div class="col-md-12">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Send Password Reset Link') }}--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        </div>
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

