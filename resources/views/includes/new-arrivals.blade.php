<!-- New Arrivals -->

<div class="new_arrivals">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="section_title new_arrivals_title">
                    <h2>Nieuwe Producten</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col text-center">
                <div class="new_arrivals_sorting">
                    <ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
                        <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
                        {{--{!! dd($products->groupBy('category_id')) !!}--}}
                        @foreach($products->groupBy('category_id') as $category)
{{--                            {{dd($category[0]->category->value)}}--}}
                            <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".{{$category[0]->category->value}}">{{$category[0]->category->value}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

                    @foreach($products as $product)
                        @component('components.product-card', ['product' => $product])
                        @endcomponent
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>