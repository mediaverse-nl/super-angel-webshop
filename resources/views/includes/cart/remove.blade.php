<form method="POST" action="{{route('site.cart.remove')}}" style="display: inline-block; ">
    <input type="hidden" name="row" value="{{$item->rowId}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <button type="submit" class="btn btn-trash  btn-xs add-to-cart" style="margin-left: 15px;">
        <i class="fa fa-trash"></i>
    </button>
</form>