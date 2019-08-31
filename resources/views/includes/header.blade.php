<header class="header trans_300">

    <!-- Top Navigation -->

    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="top_nav_left">gratis verzending voor alle bestellingen binnen Nederland vanaf &euro;75</div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        <ul class="top_nav_menu">

                            <!-- My Account -->

                            <li class="account">
                                 <a href="{!! route('login') !!}">Sign In</a>
                            </li>
                            <li class="account">
                                <a href="{!! route('register') !!}">Register</a>
                            </li>

                            {{--<li class="account">--}}
                                {{--<a href="#">--}}
                                    {{--My Account--}}
                                    {{--<i class="fa fa-angle-down"></i>--}}
                                {{--</a>--}}
                                {{--<ul class="account_selection">--}}
                                    {{--<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>--}}
                                    {{--<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
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
                            <li><a href="{!! route('site.category.index') !!}">shop</a></li>
                            <li><a href="{!! route('site.about') !!}">Over Ons</a></li>
                            <li><a href="{!! route('site.contact.index') !!}">contact</a></li>
                            {{--<li class="account">--}}
                                {{--<a href="#">--}}
                                    {{--My Account--}}
                                    {{--<i class="fa fa-angle-down"></i>--}}
                                {{--</a>--}}
                                {{--<ul class="account_selection">--}}
                                    {{--<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>--}}
                                    {{--<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        </ul>
                        <ul class="navbar_user">
                            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                            <li class="checkout">
                                <a href="{!! route('site.cart.index') !!}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="checkout_items" class="checkout_items">2</span>
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
                    My Account
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="menu_selection">
                    <li><a href="#">Sign In</a></li>
                    <li><a href="#">Register</a></li>
                </ul>
            </li>
            <li class="menu_item"><a href="{!! route('home') !!}">home</a></li>
            <li class="menu_item"><a href="{!! route('site.category.index') !!}">shop</a></li>
            <li class="menu_item"><a href="{!! route('site.contact.index') !!}">contact</a></li>
        </ul>
    </div>
</div>