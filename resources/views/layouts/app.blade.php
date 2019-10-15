<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="copyright" content="Tante Martje - All rights reserved">
    <meta name="author" content="Tante Martje">

    {!! SEO::generate() !!}

    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">

    @if(Auth::check() && Auth::user()->admin == 1)
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
        <style>
            .note-air-popover{
                background-color: #e83e8c;
                width: 380px;
                max-width: 380px;
                min-width: 200px;
                border-radius: 0px !important;
            }
            .popover-content.note-children-container{
                background-color: #cecece;
                color: #eeeeee;
            }
            input[type="button"]
            {
                width:120px;
                height:60px;
                margin-left:35px;
                display:block;
                background-color:gray;
                color:white;
                border: none;
                outline:none;
            }
        </style>
    @endif

    <style>
        /*// Small devices (landscape phones, 576px and up)*/
        @media (min-width: 576px) {
            #productContainers{
                display: inline-flex;
            }
            .product-item{
                height: 470px !important;
            }
        }
        /*// Medium devices (tablets, 768px and up)*/
        @media (min-width: 768px) {

            .product-item{
                height: 460px !important;
            }
        }
        /*// Large devices (desktops, 992px and up)*/
        @media (min-width: 992px) {
            #productContainers{
                display: inline-f lex;
            }
            .product-item{
                height: 320px !important;
            }
        }
        /*// Extra large devices (large desktops, 1200px and up)*/
        @media (min-width: 1200px) {
            #productContainers{
                display: inline-f lex;
            }
            .product-item{
                height: 340px !important;
            }
        }
    </style>

    @stack('css')

</head>

<body>

<div class="super_container">

    <!-- Header -->
    @include('includes.header')

    @yield('body')

    <!-- Newsletter -->
    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                        <h4>Nieuwsbrief</h4>
                        <p>Abonneer u op onze nieuwsbrief en ontvang alle nieuwsberichten</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="post">
                        <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                            <input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
                            <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('includes.footer')

    @include('cookieConsent::index')

</div>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/styles/bootstrap4/popper.js"></script>
<script src="/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/plugins/easing/easing.js"></script>
<script src="/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

@if(Auth::check() && Auth::user()->admin == 1)
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
@endif

@stack('js')

</body>

</html>
