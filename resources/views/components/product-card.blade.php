{{--<div class="col-3" style="background: #FFFFFF !important; padding: 0px 0px !important; display: inline-block !important; height: 340px !important; " class="{{!empty($product->category) ? $product->category->value : null}} @foreach($product->productDetails as $x) {!! preg_replace("/[^a-zA-Z0-9]/", "", $x->detail->value) !!}@endforeach">--}}
<div class="product-item {!! $product->category->value !!}" style="height: 340px !important; background: #FFFFFF">
    <a href="{!! route('site.product.show', [$product->urlTitle, $product->id]) !!}">
        <div class="product discount product_filter" style="border-top: 1px solid rgb(233, 233, 233); ">
            <div class="product_image">
                <img src="{!! $product->thumbnail() !!}" alt="">
            </div>
            <div class="favorite favorite_left"></div>
            @if($product->isNewProduct())
                <div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>nieuw</span></div>
            @endif
            @if($product->discount)
                <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-&euro;{{$product->discount}}</span></div>
            @endif
            <div class="product_info">
                <h6 class="product_name">
                    <a href="{!! route('site.product.show', [$product->urlTitle, $product->id]) !!}">
                        {{$product->title}}
                    </a>
                </h6>
                <div class="product_price">
                    @if($product->discount)
                        &euro;{{number_format($product->default_price - $product->discount,2)}}<span>&euro;{{number_format($product->price,2)}}</span>
                    @else
                        &euro;{{number_format($product->default_price,2)}}
                    @endif
                </div>
                <div class="product_stock">
                    <small>
                        <b>
                            @if($product->stock >= 5)
                                op voorraad
                            @elseif($product->stock >= 2)
                                nog {!! $product->stock !!} op voorraad
                            @else
                                uitverkocht
                            @endif</b>
                    </small>
                </div>
                <div class="product_properties" hidden>
                    @foreach($product->productDetails as $x){!! $x->detail->value !!}{!! $loop->last ? '' : ',' !!}@endforeach
                </div>
            </div>
        </div>
    </a>
    {{--<div class="red_button add_to_cart_button">--}}
        {{--@include('includes.cart.add', ['product' => $product])--}}
    {{--</div>--}}
</div>
