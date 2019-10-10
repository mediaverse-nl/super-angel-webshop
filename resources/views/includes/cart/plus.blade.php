<form method="POST" action="{{route('site.cart.increase')}}" style="display: inline-block">
    <input type="hidden" name="row" value="{{$item->rowId}}">
    <input type="hidden" name="qty" value="{{$item->qty + 1}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-fefault btn-xs add-to-cart" style="background: #f3f3f3;"
            {{$item->qty < \App\ProductType::find($item->id)->stock ? : 'disabled'}}>
        <i class="fa fa-plus"></i>
    </button>
</form>