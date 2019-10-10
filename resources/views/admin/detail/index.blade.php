@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.detail.index') !!}
@endsection

@section('content')
    <div class="row">
        @foreach($property
            ->chunk(ceil($property->count() / 4)) as $c)

            <div class="col-3">
                @foreach($c as $p)
                    <div class="card" style="">
                        <div class="card-body">
                            <h3>
                                {!! $p->value !!}
                                @component('components.model', [
                                       'id' => 'propertyTableBtn'.$p->id,
                                       'title' => 'Delete entry '. $p->value,
                                       'actionRoute' => route('admin.detail.delete-property', $p->id),
                                       'btnClass' => 'btn btn-sm btn-danger delete float-right',
                                       'btnIcon' => 'fa fa-trash'
                                    ])
                                    @slot('description')
                                        If u proceed u will <b>{!! 'delete' !!}</b> all relations
                                    @endslot
                                @endcomponent
                            </h3>
                            <ul class="list-group list-group-flush">
                                @foreach($p->details as $d)
                                    <li class=" custom-list-grasertivapenhrpsphp oup-item ">
                                        {!! $d->value !!}
                                        <div class="float-right">
                                            @component('components.model', [
                                               'id' => 'userTableBtn'.$d->id,
                                               'title' => 'Delete entry '. $d->value,
                                               'actionRoute' => route('admin.detail.destroy', $d->id),
                                               'btnClass' => 'btn btn-sm btn-danger delete',
                                               'btnIcon' => 'fa fa-trash'
                                            ])
                                                @slot('description')
                                                    If u proceed u will <b>{!! $d ? 'restore' : 'delete' !!}</b> all relations
                                                @endslot
                                            @endcomponent
                                            <a href="{{route('admin.detail.edit', $d->id)}}" class="btn btn-sm btn-warning edit">
                                                <i class="fa fa-edit" ></i>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                                <li class="list-group-item" style="padding: .75rem 0rem;">
                                    {!! Form::open(['url' => route('admin.detail.store-detail'), 'method' => 'POST']) !!}
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                {!! Form::hidden('property_id', $p->id) !!}
                                                {!! Form::text('value', null, ['class' => 'form-control'.(!$errors->has('value') ? '': ' is-invalid ')]) !!}
                                                @include('components.error', ['field' => 'value'])
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div style="height:100%; position:relative;">
                                                {!! Form::submit("add", ['class' => 'btn btn-success btn-block','style' => 'position:absolute; bottom:17px;']) !!}

                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </li>

                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

@endsection

@push('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .list-group-item a{
            /*display: inline-block;*/
        }
        .list-group-item a i{
            color: black !important;
        }
        .list-group-item a i{
            color: white !important;
        }

        .custom-list-group-item {
            position: relative;
            display: block;
            padding: .75rem 1.25rem;
            margin-bottom: -1px;
            background-color: #fff;
            border: 1px solid rgba(0,0,0,.125);
            border-right: 0;
            border-left: 0;
            border-radius: 0;
        }


        .list-group > .btn-group-sm > .btn, .btn-sm {
            padding: .03rem .4rem !important;
            margin-bottom: 7px;
        }
        .list-group {
            list-style: none !important;
        }

    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endpush