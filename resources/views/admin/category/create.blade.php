@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.category.create') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.category.store'], 'method' => 'POST']) !!}

                        <div class="form-group">
                            {!! Form::label('value', 'value') !!}
                            {!! Form::text('value', null, ['class' => 'form-control'.(!$errors->has('value') ? '': ' is-invalid ')]) !!}
                            @include('components.error', ['field' => 'value'])
                        </div>

                        @component('components.model', [
                            'id' => 'CreateCategory',
                            'title' => 'Create entry ',
                            'actionRoute' => route('admin.category.store'),
                            'btnClass' => 'btn btn-warning',
                            'btnIcon' => null,
                            'btnTitle' => 'Save',
                        ])
                            @slot('description')
                                If u proceed u will <b>edit</b> this entry
                            @endslot
                        @endcomponent
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
