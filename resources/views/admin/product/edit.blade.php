@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.product.edit', $product) !!}
@endsection

@section('content')
    {!! Form::model($product, ['route' => ['admin.product.update', $product->id], 'method' => 'PATCH']) !!}

    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', null, ['class' => 'form-control'.(!$errors->has('title') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'title'])
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control'.(!$errors->has('description') ? '': ' is-invalid '), 'rows' => 3]) !!}
                        @include('components.error', ['field' => 'description'])
                    </div>

                    <div class="form-group">
                        <label for="">Images</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="productThumbnail" data-preview="imgHolder" class="btn btn-primary text-white" style="border-radius: 0px !important;">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="productThumbnail" class="form-control" type="text" disabled
                                   value="{!! $product->images !!}">
                            {!! Form::hidden('images', $product->images, ['id' => 'productThumbnailCopy', 'class' => 'form-control'.(!$errors->has('images') ? '': ' is-invalid ')]) !!}
                        </div>
                        <div id="imgHolder" style="margin-top:15px;max-height:100px;">
                            @if(!empty($product->images))
                                @foreach($product->images() as $image)
                                    <img src="{!! $image !!}" style="height: 5rem;">
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('category_id', 'category') !!}
                        {!! Form::select('category_id', \App\Category::parents()->pluck('value', 'id'), null, ['class' => 'form-control'.(!$errors->has('category_id') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'category'])
                    </div>

                    <div class="form-group">
                        {!! Form::label('stock', 'stock') !!}
                        {!! Form::number('stock', null, ['class' => 'form-control'.(!$errors->has('stock') ? '': ' is-invalid ')]) !!}
                         @include('components.error', ['field' => 'stock'])
                    </div>


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
                        {!! Form::label('meta_title', 'Meta Title') !!}
                        {!! Form::text('meta_title', null, ['class' => 'form-control'.(!$errors->has('meta_title') ? '': ' is-invalid ')]) !!}
                        @include('components.error', ['field' => 'meta_title'])
                    </div>

                    <div class="form-group">
                        {!! Form::label('meta_description', 'Meta Description') !!}
                        {!! Form::textarea('meta_description', null, ['class' => 'form-control'.(!$errors->has('meta_description') ? '': ' is-invalid '), 'rows' => 3]) !!}
                        @include('components.error', ['field' => 'meta_description'])
                    </div>

                    @component('components.model', [
                        'id' => 'CreateCategory',
                        'title' => 'Edit entry ',
                        'actionRoute' => route('admin.product.store'),
                        'btnClass' => 'btn btn-warning',
                        'btnIcon' => null,
                        'btnTitle' => 'edit',
                    ])
                        @slot('description')
                            If u proceed u will <b>edit</b> this entry
                        @endslot
                    @endcomponent

                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="card">
                <div class="card-body">
                    <h2>properties</h2>
                    <hr>
                    <div class="row">
                        @foreach($properties as $property)
                            <div class="col-6">
                                <b>{!! $property->value !!}</b>
                                {!! Form::select('properties[]',
                                    $property->details->pluck('value', 'id'),
                                    $product->getSelectedDetail($property->details),
                                    ['placeholder' => '-- select --', 'class' => 'form-control'.(!$errors->has('category') ? '': ' is-invalid ')
                                ]) !!}
                            </div>
                        @endforeach
                     </div>
                </div>
            </div>

        </div>
    </div>

    {!! Form::close() !!}

@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <style>

    </style>
@endpush

@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#productThumbnail').change(function() {
            $('#productThumbnailCopy').val($(this).val());
        });

        var route_prefix = "{!! url(config('lfm.url_prefix')) !!}";

        $('#lfm').filemanager('file', {prefix: route_prefix});

    </script>
@endpush