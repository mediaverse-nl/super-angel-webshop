<form method="POST" action="{{route('site.cart.decrease')}}" style="display: inline-block">
    <input type="hidden" name="row" value="{{$item->rowId}}">
    <input type="hidden" name="qty" value="{{$item->qty - 1}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-fefault btn-xs add-to-cart" style=""
            {{$item->qty != 1 ? : 'disabled'}}>
        <i class="fa fa-minus"></i>
    </button>
</form>