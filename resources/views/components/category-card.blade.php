<div class="col-md-4" style="margin-bottom: 30px;">
    <div class="banner_item align-items-center" style="background-image:url({!! $category->thumbnail()!!})">
    {{--<div class="banner_item align-items-center" style="background-image:url(images/banner_{!! $category->id !!}.jpg)">--}}
        <div class="banner_category">
            <a href="{!! route('site.category.show', $category->id) !!}">{!! $category->value !!}</a>
        </div>
    </div>
</div>