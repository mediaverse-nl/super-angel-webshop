@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.product_type.edit', $productType) !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($productType, ['route' => ['admin.detail.update-detail', $productType->id], 'method' => 'PATCH']) !!}
                {!! $productType !!}

                    <div class="form-group">
                        {!! Form::label('stock', 'stock') !!}
                        {!! Form::number('stock', null, ['class' => 'form-control'.(!$errors->has('stock') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'stock'])
                    </div>

                    {{--{!! $productType->productVariants !!}--}}
                    <div class="row">
                        @foreach($productType->productVariants as $i)
                            <div class="col-4">
                                {!! Form::label($i->detail->property->value, $i->value) !!}
                                {!! Form::select('properties[]',
                                $i->detail->property->details->pluck('value', 'id'),
                                null,
                                ['placeholder' => '-- select --', 'class' => 'form-control'.(!$errors->has('category') ? '': ' is-invalid ')
                                ]) !!}
                            </div>
                        @endforeach

                    </div>
                    <br>
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
                        {!! Form::text('ean', null, ['class' => 'form-control'.(!$errors->has('discount') ? '': ' is-invalid '), 'step' => 'any']) !!}
                        @include('components.error', ['field' => 'discount'])
                    </div>
                    <div class="form-group">
                        {!! Form::label('sku', 'sku') !!}
                        {!! Form::text('sku', null, ['class' => 'form-control'.(!$errors->has('discount') ? '': ' is-invalid '), 'step' => 'any']) !!}
                        @include('components.error', ['field' => 'discount'])
                    </div>

                        @component('components.model', [
                            'id' => 'CreateCategory',
                            'title' => 'Create entry ',
                            'actionRoute' => route('admin.detail.store'),
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
    </div>

    @component('components.rich-textarea-editor')
    @endcomponent

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
