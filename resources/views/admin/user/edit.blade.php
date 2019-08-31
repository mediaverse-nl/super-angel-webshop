@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.user.edit', $user) !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-9 col-lg-9">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($user, ['route' => ['admin.user.update', $user->id], 'method' => 'PATCH']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Naam') !!}
                            {!! Form::text('name', null, ['class' => 'form-control'.(!$errors->has('name') ? '': ' is-invalid '), 'disabled']) !!}
                            @include('components.error', ['field' => 'name'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'email') !!}
                            {!! Form::text('email', null, ['class' => 'form-control'.(!$errors->has('email') ? '': ' is-invalid '), 'disabled']) !!}
                            @include('components.error', ['field' => 'email'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('first_name', 'first_name') !!}
                            {!! Form::text('first_name', null, ['class' => 'form-control'.(!$errors->has('first_name') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'first_name'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('last_name', 'last_name') !!}
                            {!! Form::text('last_name', null, ['class' => 'form-control'.(!$errors->has('last_name') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'last_name'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('country', 'country') !!}
                            {!! Form::text('country', null, ['class' => 'form-control'.(!$errors->has('country') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'country'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('city', 'city') !!}
                            {!! Form::text('city', null, ['class' => 'form-control'.(!$errors->has('city') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'city'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('zipcode', 'zipcode') !!}
                            {!! Form::text('zipcode', null, ['class' => 'form-control'.(!$errors->has('zipcode') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'zipcode'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('street_name', 'street_name') !!}
                            {!! Form::text('street_name', null, ['class' => 'form-control'.(!$errors->has('street_name') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'street_name'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('street_nr', 'street_nr') !!}
                            {!! Form::text('street_nr', null, ['class' => 'form-control'.(!$errors->has('street_nr') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'street_nr'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('created_at', 'created_at') !!}
                            {!! Form::text('created_at', null, ['class' => 'form-control'.(!$errors->has('created_at') ? '': ' is-invalid '), 'disabled']) !!}
                            @include('components.error', ['field' => 'created_at'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('updated_at', 'updated_at') !!}
                            {!! Form::text('updated_at', null, ['class' => 'form-control'.(!$errors->has('updated_at') ? '': ' is-invalid '), 'disabled']) !!}
                            @include('components.error', ['field' => 'updated_at'])
                        </div>

                        <div class="form-group">
                            {!! Form::label('deleted_at', 'deleted_at') !!}
                            {!! Form::text('deleted_at', null, ['class' => 'form-control'.(!$errors->has('updated_at') ? '': ' is-invalid '), 'disabled']) !!}
                            @include('components.error', ['field' => 'deleted_at'])
                        </div>

                        @component('components.model', [
                            'id' => 'userTableBtn'.$user->id,
                            'title' => 'Edit entry '.$user->id,
                            'actionRoute' => route('admin.user.edit', $user->id),
                            'btnClass' => 'btn btn-warning',
                            'btnIcon' => null,
                            'btnTitle' => 'edit',
                        ])
                            @slot('description')
                                If u proceed u will <b>edit</b> this entry
                            @endslot
                        @endcomponent

                    {!! Form::close() !!}


                </div>
            </div>
        </div>

        <div class="col-12 col-md-3 col-lg-3">
            <div class="card">
                <div class="card-body">
                    @component('components.model', [
                            'id' => 'userTableBtn'.$user->id,
                            'title' => ($user->trashed() ? 'Restore' : 'Delete').' entry '.$user->id,
                            'actionRoute' => route('admin.user.destroy', $user->id),
                            'btnClass' => 'btn btn-danger btn-block',
                            'btnIcon' => 'fa '.($user->trashed() ? 'fa-undo' : 'fa-trash'),
                            'btnTitle' => $user->trashed() ? 'restore' : 'delete',
                        ])
                        @slot('description')
                            If u proceed u will <b>{!! $user->trashed() ? 'restore' : 'delete' !!}</b> all relations
                        @endslot
                    @endcomponent
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    {{--<h3>Charge backs requests</h3>--}}
                    {{--@foreach($user->chargeBacks()->orderByDesc('id')->get() as $refunds)--}}
                        {{--@if(!$refunds->status)--}}
                            {{--<span class="badge badge-warning">pending</span><br>--}}
                        {{--@else--}}
                            {{--<span class="badge badge-success">paid out</span><br>--}}
                        {{--@endif--}}
                        {{--<b>Name: </b> {!! $refunds->name !!}<br>--}}
                        {{--<b>IBAN: </b> {!! $refunds->iban !!}<br>--}}
                        {{--<b>Amount: </b> &euro;{!! number_format($refunds->total_refund_amount, 2) !!}<br>--}}
                        {{--<b>Administration Costs: </b> &euro;{!! number_format( $refunds->administration_costs, 2) !!}<br>--}}
                        {{--@if(!$refunds->status)--}}
                            {{--@component('components.model', [--}}
                             {{--'id' => 'userPayOutBtn'.$user->id,--}}
                             {{--'title' => 'Charge Back ',--}}
                             {{--'actionRoute' => route('admin.user.chargeback', $refunds->id),--}}
                             {{--'btnClass' => 'btn btn-warning btn-block',--}}
                             {{--'btnTitle' => 'Charge Back',--}}
                         {{--])--}}
                                {{--@slot('description')--}}
                                    {{--This action is not reversible--}}
                                {{--@endslot--}}
                            {{--@endcomponent--}}
                        {{--@endif--}}
                            {{--<hr>--}}
                    {{--@endforeach--}}
                </div>
            </div>
        </div>

    </div>

    @component('components.rich-textarea-editor')
    @endcomponent

@endsection

{{--@push('css')--}}
    {{--<style>--}}

    {{--</style>--}}
{{--@endpush--}}

{{--@push('js')--}}
    {{--<script>--}}

    {{--</script>--}}
{{--@endpush--}}