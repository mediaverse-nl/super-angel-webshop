@extends('layouts.admin')

@section('breadcrumb')
    {!! Breadcrumbs::render('admin.product.index') !!}
@endsection

@section('content')

    <!-- DataTables Example -->
    @component('components.datatable')
        @slot('head')
            <th>id</th>
            <th>category</th>
            <th>title</th>
            <th>price</th>
            <th>stock</th>
             <th class="no-sort"></th>
        @endslot
        @slot('table')
            @foreach($products as $product)
                <tr class="{!! $product->trashed() ? 'table-danger' : '' !!}">
                    <td>{!! $product->id !!}</td>
                    <td>{!! $product->category ? $product->category->value : '' !!}</td>
                    <td>{!! $product->title !!}</td>
                    <td>&euro; {!! number_format($product->default_price, 2) !!}</td>
                    <td>
                        {!! $product->productTypes->sum('stock') == 0 ? 0 : $product->productTypes->sum('stock') !!} in stock
                        of {!! $product->productTypes->count() !!} variant
                    </td>
                    <td>
                        @component('components.model', [
                               'id' => 'userTableBtn'.$product->id,
                               'title' => ($product->trashed() ? 'Restore' : 'Delete').' entry '.$product->id,
                               'actionRoute' => route('admin.product.destroy', $product->id),
                               'btnClass' => 'rounded-circle delete',
                               'btnIcon' => 'fa '.($product->trashed() ? 'fa-undo' : 'fa-trash')
                           ])
                            @slot('description')
                                If u proceed u will <b>{!! $product->trashed() ? 'restore' : 'delete' !!}</b> all relations
                            @endslot
                        @endcomponent
                        <a href="{{route('admin.product.edit', $product->id)}}" class="rounded-circle edit">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

@endsection

@push('css')
    <style></style>
@endpush

@push('scripts')
    <script></script>
@endpush