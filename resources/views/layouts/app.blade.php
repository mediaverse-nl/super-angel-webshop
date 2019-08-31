<!DOCTYPE html>
<html lang="en">
<head>
    <title>Colo Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/styles/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">


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
                        <h4>Newsletter</h4>
                        <p>Subscribe to our newsletter and get 20% off your first purchase</p>
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
</div>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/styles/bootstrap4/popper.js"></script>
<script src="/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/plugins/easing/easing.js"></script>
<script src="/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>

@stack('js')

</body>

</html>
