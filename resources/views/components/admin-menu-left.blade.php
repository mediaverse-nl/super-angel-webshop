<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

    <li class="nav-item {{Request::is('admin/dashboard') ? 'active' : ''}} {{Request::is('admin') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.dashboard')}}" >
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{Request::is('admin/user*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.user.index')}}">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Users</span>
        </a>
    </li>

    <li class="nav-item {{Request::is('admin/order*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.order.index')}}">
            <i class="fa fa-fw fa-inbox"></i>
            <span class="nav-link-text">Orders</span>
        </a>
    </li>

    {{--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">--}}
        {{--<a class="nav-link nav-link-collapse {{Request::is('admin/event*') ? '' : 'collapsed'}}" data-toggle="collapse" href="#eventComponents" data-parent="#exampleAccordion" aria-expanded="false">--}}
            {{--<i class="fa fa-fw fa-calendar"></i>--}}
            {{--<span class="nav-link-text">Event</span>--}}
        {{--</a>--}}
        {{--<ul class="sidenav-second-level collapse {{Request::is('admin/event*') ? 'show' : ''}}" id="eventComponents" style="">--}}
            {{--<li class="{{Request::is('admin/event/create') ? '' : (Request::is('admin/event*') ? 'active' : '')}}">--}}
                {{--<a href="{{route('admin.event.index')}}">--}}
                    {{--<i class="fa fa-fw fa-list"></i>--}}
                    {{--<span class="nav-link-text">index</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="{{Request::is('admin/event/create') ? 'active' : ''}}">--}}
                {{--<a href="{{route('admin.event.create')}}">--}}
                    {{--<i class="fa fa-fw fa-plus"></i>--}}
                    {{--<span class="nav-link-text">create</span>--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}

    {{--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">--}}
        {{--<a class="nav-link nav-link-collapse {{Request::is('admin/activity*') ? '' : 'collapsed'}}" data-toggle="collapse" href="#activityComponents" data-parent="#exampleAccordion" aria-expanded="false">--}}
            {{--<i class="fa fa-fw fa-trophy"></i>--}}
            {{--<span class="nav-link-text">Activity</span>--}}
        {{--</a>--}}
        {{--<ul class="sidenav-second-level collapse {{Request::is('admin/activity*') ? 'show' : ''}}" id="activityComponents" style="">--}}
            {{--<li class="{{Request::is('admin/activity/create') ? '' : (Request::is('admin/activity*') ? 'active' : '')}}">--}}
                {{--<a href="{{route('admin.activity.index')}}">--}}
                    {{--<i class="fa fa-fw fa-list"></i>--}}
                    {{--<span class="nav-link-text">index</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class="{{Request::is('admin/activity/create') ? 'active' : ''}}">--}}
                {{--<a href="{{route('admin.activity.create')}}">--}}
                    {{--<i class="fa fa-fw fa-plus"></i>--}}
                    {{--<span class="nav-link-text">create</span>--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">
        <a class="nav-link nav-link-collapse {{Request::is('admin/category*') ? '' : 'collapsed'}}" data-toggle="collapse" href="#categoryComponents" data-parent="#exampleAccordion" aria-expanded="false">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Category</span>
        </a>
        <ul class="sidenav-second-level collapse {{Request::is('admin/category*') ? 'show' : ''}}" id="categoryComponents" style="">
            <li class="{{Request::is('admin/category/create') ? '' : (Request::is('admin/category*') ? 'active' : '')}}">
                <a href="{{route('admin.category.index')}}">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">index</span>
                </a>
            </li>
            <li class="{{Request::is('admin/category/create') ? 'active' : ''}}">
                <a href="{{route('admin.category.create')}}">
                    <i class="fa fa-fw fa-plus"></i>
                    <span class="nav-link-text">create</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">
        <a class="nav-link nav-link-collapse {{Request::is('admin/detail*') ? '' : 'collapsed'}}" data-toggle="collapse" href="#detailComponents" data-parent="#exampleAccordion" aria-expanded="false">
            <i class="fa fa-fw fa-cubes"></i>
            <span class="nav-link-text">Details</span>
        </a>
        <ul class="sidenav-second-level collapse {{Request::is('admin/detail*') ? 'show' : ''}}" id="detailComponents" style="">
            <li class="{{Request::is('admin/detail/create') ? '' : (Request::is('admin/detail*') ? 'active' : '')}}">
                <a href="{{route('admin.detail.index')}}">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">index</span>
                </a>
            </li>
            <li class="{{Request::is('admin/detail/create') ? 'active' : ''}}">
                <a href="{{route('admin.detail.create')}}">
                    <i class="fa fa-fw fa-plus"></i>
                    <span class="nav-link-text">create</span>
                </a>
            </li>
        </ul>
    </li>


    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">
        <a class="nav-link nav-link-collapse {{Request::is('admin/product*') ? '' : 'collapsed'}}" data-toggle="collapse" href="#productComponents" data-parent="#productComponents" aria-expanded="false">
            <i class="fa fa-fw fa-barcode"></i>
            <span class="nav-link-text">Products</span>
        </a>
        <ul class="sidenav-second-level collapse {{Request::is('admin/product*') ? 'show' : ''}}" id="productComponents" style="">
            <li class="{{Request::is('admin/product/create') ? '' : (Request::is('admin/product*') ? 'active' : '')}}">
                <a href="{{route('admin.product.index')}}">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">index</span>
                </a>
            </li>
            <li class="{{Request::is('admin/product/create') ? 'active' : ''}}">
                <a href="{{route('admin.product.create')}}">
                    <i class="fa fa-fw fa-plus"></i>
                    <span class="nav-link-text">create</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item {{Request::is('admin/seo-manager*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.seo-manager.index')}}">
            <i class="fa fa-fw fa-search"></i>
            <span class="nav-link-text">SEO</span>
        </a>
    </li>
    <li class="nav-item {{Request::is('admin/file-manager*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.file-manager.index')}}">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Images</span>
        </a>
    </li>
    <li class="nav-item {{Request::is('admin/editor*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.editor.index')}}">
            <i class="fa fa-fw fa-align-left"></i>
            <span class="nav-link-text">Text</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="" data-original-title="Components">
        <a class="nav-link nav-link-collapse {{Request::is('admin/faq*') ? '' : 'collapsed'}}" data-toggle="collapse" href="#faqComponents" data-parent="#exampleAccordion" aria-expanded="false">
            <i class="fa fa-fw fa-question"></i>
            <span class="nav-link-text">FAQ</span>
        </a>
        <ul class="sidenav-second-level collapse {{Request::is('admin/faq*') ? 'show' : ''}}" id="faqComponents" style="">
            <li class="{{Request::is('admin/faq/create') ? '' : (Request::is('admin/faq*') ? 'active' : '')}}">
                <a href="{{route('admin.faq.index')}}">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">index</span>
                </a>
            </li>
            <li class="{{Request::is('admin/faq/create') ? 'active' : ''}}">
                <a href="{{route('admin.faq.create')}}">
                    <i class="fa fa-fw fa-plus"></i>
                    <span class="nav-link-text">create</span>
                </a>
            </li>
        </ul>
    </li>
</ul>

<ul class="navbar-nav sidenav-toggler">
    <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
        </a>
    </li>
</ul>
