@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.detail.create') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => ['admin.product-type.store'], 'method' => 'POST']) !!}

                    {{--@foreach($product->productDetails as $d)--}}
                        {{--{!! $d->detail !!} <br>--}}
                    {{--@endforeach--}}

                    {{--{!! $product->productDetails()->first()->detail()->pluck('value', 'id') !!}--}}

                    <div class="form-group">
                    {!! Form::label('stock', 'stock') !!}
                    {!! Form::number('stock', null, ['class' => 'form-control'.(!$errors->has('stock') ? '': ' is-invalid ')]) !!}
                    @include('components.error', ['field' => 'stock'])
                    </div>


                    <div class="form-group">
                        {!! Form::label('stock', 'property') !!}
                        {!! Form::select('properties[]',
                        [1,2],
                        1,
                        ['placeholder' => '-- select --', 'class' => 'form-control'.(!$errors->has('category') ? '': ' is-invalid ')
                        ]) !!}
                    </div>
                    {{--{!! Form::select('properties[]',--}}
                    {{--$product->productDetails()->first()->details->pluck('value', 'id'),--}}
                    {{--$product->getSelectedDetail( $product->productDetails()->first()->details),--}}
                    {{--['placeholder' => '-- select --', 'class' => 'form-control'.(!$errors->has('category') ? '': ' is-invalid ')--}}
                    {{--]) !!}--}}

                    <div class="form-group">
                    {!! Form::label('price', 'price') !!}
                    {!! Form::number('price', null, ['class' => 'form-control'.(!$errors->has('price') ? '': ' is-invalid '), 'step' => 'any']) !!}
                    @include('components.error', ['field' => 'price'])
                    </div>

                    <div class="form-group">
                    {!! Form::label('discount', 'discount') !!}
                    {!! Form::number('discount', null, ['class' => 'form-control'.(!$errors->has('discount') ? '': ' is-invalid '), 'step' => 'any']) !!}
                    @include('components.error', ['field' => 'discount'])
                    </div>

                    <div class="form-group">
                    {!! Form::label('ean', 'ean') !!}
                    {!! Form::number('ean', null, ['class' => 'form-control'.(!$errors->has('discount') ? '': ' is-invalid '), 'step' => 'any']) !!}
                    @include('components.error', ['field' => 'discount'])
                    </div>
                    <div class="form-group">
                    {!! Form::label('barcode', 'barcode') !!}
                    {!! Form::number('barcode', null, ['class' => 'form-control'.(!$errors->has('discount') ? '': ' is-invalid '), 'step' => 'any']) !!}
                    @include('components.error', ['field' => 'discount'])
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

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        var route_prefix = "{!! url(config('lfm.url_prefix')) !!}";

        $('#lfm').filemanager('file', {prefix: route_prefix});

        function getImagePath(el) {
            $('#productThumbnailCopy').val(el);
        }

        getImagePath($('#productThumbnail').val());

        $('#productThumbnail').change(function() {
            getImagePath($(this).val());
        });
    </script>
@endpush
