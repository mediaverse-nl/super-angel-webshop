{{Form::open(['route' => 'site.cart.empty'])}}
{{Form::submit(trans('button.empty'), ['class' => 'btn btn-danger btn-block', count(Cart::content()) ? '': 'disabled'])}}
{{Form::close()}}