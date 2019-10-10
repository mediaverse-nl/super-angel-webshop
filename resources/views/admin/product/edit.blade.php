@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.product.edit', $product) !!}
@endsection

@section('content')
    {!! Form::model($product, ['route' => ['admin.product.update', $product->id], 'method' => 'PATCH']) !!}

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @component('components.model', [
                       'id' => 'CreateCategory',
                       'title' => 'Edit entry ',
                       'actionRoute' => route('admin.product.store'),
                       'btnClass' => 'btn btn-warning',
                       'btnIcon' => null,
                       'btnTitle' => 'save',
                    ])
                        @slot('description')
                            If u proceed u will <b>edit</b> this entry
                        @endslot
                    @endcomponent

                    <span style="padding-left: 30px;">
                        created at: <b>{!! $product->created_at ? $product->created_at->format('d M Y') : 'n/a'!!}</b> and
                        updated at: <b>{!!  $product->updated_at ? $product->updated_at->format('d M Y') : 'n/a' !!}</b>
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xl-6">
            <div class="card">
                <div class="card-body">

                    <h2>product template</h2>
                    <hr>
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
                        {!! Form::label('default_price', 'default price') !!}
                        {!! Form::number('default_price', null, ['class' => 'form-control'.(!$errors->has('title') ? '': ' is-invalid '), 'step' => 'any']) !!}
                        @include('components.error', ['field' => 'default_price'])
                    </div>

                    <div class="form-group">
                        {!! Form::label('discount', 'discount price') !!}
                        {!! Form::number('discount', null, ['class' => 'form-control'.(!$errors->has('discount') ? '': ' is-invalid '), 'step' => 'any']) !!}
                        @include('components.error', ['field' => 'discount'])
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

                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <h2>product SEO</h2>
                    <hr>
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
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h2>properties</h2>
                    <hr>
                    <div class="row">
                        @foreach($properties->sortBy('value') as $property)
                            <div class="col-6">
                                {{--filterable--}}
                                <div class="row">
                                    {{--<div class="col-2" style="padding-top: 25px;">--}}
                                    {{--<label class="radio">--}}
                                    {{--{!! Form::radio('property_id', $property->id, null, ['class' => 'checkround float-right']) !!}--}}
                                    {{--<span class="checkround"></span>--}}
                                    {{--</label>--}}
                                    {{--</div>--}}
                                    <div class="col-12">

                                        <b>{!! $property->value !!}</b>
                                        {!! Form::select('properties[]',
                                            $property->details->pluck('value', 'id'),
                                            $product->getSelectedDetail($property->details),
                                            ['placeholder' => '-- select --', 'class' => 'form-control'.(!$errors->has('category') ? '': ' is-invalid ')
                                        ]) !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xl-6">

            <div class="card">
                <div class="card-body">
                    {{--start--}}
                    <h2>
                        product variant(s)
                    </h2>

                    {!! Form::checkbox('more_variants', null, !$product->hasOneProductType(), ['id' => 'moreVariants']) !!}
                    {!! Form::label('more_variants', 'more variants', ['id' => 'moreVariants']) !!}

                    <div id="variantsDiv" style="display: {!! !$product->hasOneProductType() ? '' : 'none'!!}">
                        {!! $product->productTypes->sum('stock') == 0 ? 0 : $product->productTypes->sum('stock') !!} in stock
                        of {!! $product->productTypes->count() !!} variant
                        <hr>
                        <div class="row" id="optionRow">
                            @foreach($properties->sortBy('value') as $option)
                                <div class="col-md-4 col-sm-6 col-xl-4 d-none selected-item-{!! $option->value !!}" id="baseOption">
                                    <div class="form-group">
                                        {!! Form::label('value', $option->value, ['class' => 'selectedOption']) !!} <br>
                                        <select name="variant_options[{!! $option->id !!}][]"  class="selectpicker" multiple data-live-search="true" id="selectedInput{!! $option->value !!}">
                                            @foreach($option->details as $detail)
                                                <option value="{!! $detail->id !!}">{!! $detail->value !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="input-group mb-3 " id="existingList">
                            <div class="input-group-prepend">
                                <button id="addOption" class="btn btn-outline-seco ndary btn-success" type="button">
                                    Change option(s)
                                </button>
                            </div>
                            <div class="custom-select" style="padding: 0px !important;">
                                <select class="selectpicker" id="inputGroupSelected" data-max-options="3" multiple style="border-radius: 0px !important; ">
                                    @foreach($properties->sortBy('value') as $property)
                                        <option value="{!! $property->value !!}" data-filter-options='{!!($property->details()->pluck('id', 'value'))!!}' >
                                            {!! $property->value !!}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="border-top: none;"><i class="fa fa-eye"></i></th>
                                <th style="border-top: none; width: 200px;">property</th>
                                <th style="border-top: none;width:100px;">stock</th>
                                <th style="width:120px; border-top: none;">price</th>
                                <th style="border-top: none;">barcode</th>
                                <th style="border-top: none;">sku</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!$product->hasOneProductType())
                                @foreach($product->productTypes->sortByDesc('status') as $type)
                                    <tr>
                                        <th>
                                            {!! Form::hidden('variants['.$type->id.'][status]'.$type->id, '0') !!}
                                            {!! Form::checkbox('variants['.$type->id.'][status]'.$type->id, 1, $type->status == 0 ? false : true) !!}
                                        </th>
                                        <td>
                                            @foreach($type->productVariants->pluck('detail.value') as $property)
                                                <small class="badge badge-pill badge-secondary">{!!$property !!}</small>
                                            @endforeach
                                        </td>
                                        <th>
                                            <div class="form-group">
                                                {!! Form::number('variants['.$type->id.'][stock]'.$type->id.'', $type->stock, ['class' => 'form-control', 'step' => 'any']) !!}
                                                @include('components.error', ['field' => 'variants.'.$type->id.'.stock'])

                                            </div>
                                        </th>
                                        <th>
                                            <div class="form-group">
                                                {!! Form::number('variants['.$type->id.'][price]'.$type->id, $type->price, ['class' => 'form-control', 'step' => 'any']) !!}
                                                @include('components.error', ['field' => 'variants.'.$type->id.'.price'])
                                            </div>
                                        </th>
                                        <th>
                                            <div class="form-group">
                                                {!! Form::text('variants['.$type->id.'][ean]', $type->ean, ['class' => 'form-control']) !!}
                                                @include('components.error', ['field' => 'variants.'.$type->id.'.ean'])
                                            </div>
                                        </th>
                                        <th>
                                            <div class="form-group">
                                                {!! Form::text('variants['.$type->id.'][sku]', $type->sku, ['class' => 'form-control']) !!}
                                            </div>
                                        </th>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div id="oneVariant" style="display: {!! $product->hasOneProductType() ? '' : 'none'!!}">
                        <table class="table">
                            <thead>
                            <tr>
                                <th style="border-top: none;width:100px;">stock</th>
                                <th style="border-top: none;">barcode</th>
                                <th style="border-top: none;">sku</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>
                                        <div class="form-group">
                                            {!! Form::number('variant[stock]', $product->hasOneProductType() ? ($product->productTypes ? $product->productTypes()->first()->stock : null) : null, ['class' => 'form-control', 'step' => 'any']) !!}
                                            @include('components.error', ['field' => 'variant.stock'])

                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            {!! Form::text('variant[ean]', $product->hasOneProductType() ? ($product->productTypes ? $product->productTypes()->first()->ean : null) : null, ['class' => 'form-control']) !!}
                                            @include('components.error', ['field' => 'variant.ean'])
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            {!! Form::text('variant[sku]', $product->hasOneProductType() ? ($product->productTypes ? $product->productTypes()->first()->sku : null) : null, ['class' => 'form-control']) !!}
                                        </div>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <style>
        .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
            width: 100% !important;
        }
        .table .form-group{
            margin-bottom: 0px !important;
        }
        .table .form-control{
            height: calc(1.45rem + 2px) !important;
        }

    </style>
@endpush

@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>

        moreVariants();

        $('#moreVariants').change(function(){
            moreVariants();
        });

        function moreVariants() {
            if($('#moreVariants').is(":checked")){
                $('#variantsDiv').show();
                $('#oneVariant').hide();
            } else  {
                $('#variantsDiv').hide();
                $('#oneVariant').show();
            }
        };

        selectedOptionsVisable();

        $("#addOption").click(function(event){
            event.preventDefault();
            selectedOptionsVisable();
        })

        function selectedOptionsVisable( ) {

            $("#inputGroupSelected > option").each(function() {
                if ($('#inputGroupSelected.d-none').length == 0) {
                    $('.selected-item-' + this.value).addClass('d-none');
                    $('.selected-item-'+ this.value + ' select').prop('disabled',true);
                    $('.selected-item-'+ this.value + ' select').selectpicker('refresh');
                }
            });

            $("#inputGroupSelected > option:selected").each(function() {
                $('.selected-item-'+ this.value).removeClass('d-none');
                $('.selected-item-'+ this.value + ' select').prop('disabled',false);
                $('.selected-item-'+ this.value + ' select').selectpicker('refresh');
            });
        }

        function showSelectedItems() {
            selectedOptionsVisable();
            $('#inputGroupSelected>option').removeAttr('selected');
        }

        $('#productThumbnail').change(function() {
            $('#productThumbnailCopy').val($(this).val());
        });

        var route_prefix = "{!! url(config('lfm.url_prefix')) !!}";

        $('#lfm').filemanager('file', {prefix: route_prefix});

    </script>
@endpush