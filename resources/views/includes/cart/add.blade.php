@if($product->stock >= 1)
    {!! Form::model($product, array('route' => 'site.cart.add', 'method' => 'post', 'style' => 'width: 100% !important; height: 100% !important;')) !!}
    <input type="hidden" value="{{$product->id}}" name="product_id" class="pull-left">
    {{--<input class="btn  btn-block" value="winkelmandje" style="" type="submit">--}}
    <input class="btn  btn-block" value="winkelmandje" style="color: white; background: transparent; width: 100% !important; height: 100% !important; padding: 0px !important;" type="submit">
    {{ Form::close() }}
@else
    <input class="btn btn-default center-block" value="uitverkocht" style="color: white; background: transparent; width: 100% !important; height: 100% !important; padding: 0px !important;" disabled>
@endif