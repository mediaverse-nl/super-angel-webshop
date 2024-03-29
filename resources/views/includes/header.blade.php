<header class="header trans_300">

    <!-- Top Navigation -->

    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left">
                        {!! Editor('menu_notitie', 'richtext', false, 'gratis verzending voor alle bestellingen binnen Nederland vanaf &euro;75') !!}
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        <ul class="top_nav_menu">
                            @if(auth()->check())
                                @if(auth()->user()->admin(false))
                                    <li class="account">
                                        <a href="{!! route('admin.dashboard') !!}" style="padding: 0px 15px;">
                                            Admin Panel
                                             <i class="fa fa-dashboard"></i>
                                        </a>
                                    </li>
                                @endif
                                <li class="account">
                                    <a href="#" style="padding: 0px 15px;">
                                        Welkom, {!! auth()->user()->name !!}
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="account_selection" style=" width: auto !important;">
                                        <li><a href="{!! route('auth.order.index') !!}" style="padding: 0px 15px;">Mijn Bestellingen</a></li>
                                        <li><a href="{!! route('auth.account.edit') !!}" style="padding: 0px 15px;">Mijn Gegevens</a></li>
                                        <li><a href="{{ url('/logout') }}" style="padding: 0px 15px; opacity: 0.5;">Uitloggen</a></li>
                                    </ul>
                                </li>
                            @else
                                <li class="account">
                                    <a href="{!! route('login') !!}">Inloggen</a>
                                </li>
                                <li class="account">
                                    <a href="{!! route('register') !!}">Registreren</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="{!! route('home') !!}">Tante<span>Martje</span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_menu">
                            <li><a href="{!! route('home') !!}">home</a></li>

                            <li class="account" style="background: transparent !important;">
                                <a href="{!! route('site.category.index') !!}" style="padding: 0px 15px;">
                                    shop
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="account_selection justify-content-center align-items-center" style="margin: 0px auto!important; width: auto !important;">
                                    @foreach($categoryMenu as $c)
                                        <li><a href="{!! route('site.category.show', [$c->id]) !!}" style="padding: 0px 15px;">{!! $c->value !!}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li><a href="{!! route('site.about') !!}">Over Ons</a></li>
                            <li><a href="{!! route('site.contact.index') !!}">contact</a></li>

                        </ul>
                        <ul class="navbar_user">
                            {{--<li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>--}}
                            <li class="checkout">
                                <a href="{!! route('site.cart.index') !!}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="checkout_items" class="checkout_items">{!! Cart::count() !!}</span>
                                </a>
                            </li>
                        </ul>
                        <div class="hamburger_container">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</header>

<div class="fs_menu_overlay"></div>
<div class="hamburger_menu">
    <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="hamburger_menu_content text-right">
        <ul class="menu_top_nav">
            <li class="menu_item has-children">
                <a href="#">
                    @if(auth()->check())
                        Welkom, {!! auth()->user()->name !!}
                    @else
                        Mijn Account
                    @endif
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    @if(auth()->check())
                        <li><a href="#" style="padding: 0px 15px;">Mijn Bestellingen -</a></li>
                        <li><a href="#" style="padding: 0px 15px;">Mijn Gegevens -</a></li>
                        <li><a href="{{ url('/logout') }}" style="opacity: 0.5; padding: 0px 15px;">Uitloggen -</a></li>
                    @else
                        <li><a href="{!! route('login') !!}" style="padding: 0px 15px;">Inloggen -</a></li>
                        <li><a href="{!! route('register') !!}" style="padding: 0px 15px;">Registreren -</a></li>
                    @endif
                </ul>
            </li>

            <li class="menu_item"><a href="{!! route('home') !!}">home</a></li>
            <li class="menu_item has-children">
                <a href="#">
                    shop
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    @foreach($categoryMenu as $c)
                        <li><a href="{!! route('site.category.show', [$c->id]) !!}" style="padding: 0px 15px;">{!! $c->value !!} -</a></li>
                    @endforeach
                </ul>
            </li>

            {{--<li class="menu_item"><a href="{!! route('site.category.index') !!}">shop</a></li>--}}
            <li class="menu_item"><a href="{!! route('site.about') !!}">Over Ons</a></li>
            <li class="menu_item"><a href="{!! route('site.contact.index') !!}">contact</a></li>
        </ul>
    </div>
</div>