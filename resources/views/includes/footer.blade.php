<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                    <ul class="footer_nav">
                        {{--<li><a href="#">Blog</a></li>--}}
                        <li><a href="{!! route('site.faq') !!}">FAQs</a></li>
                        <li><a href="{!! route('site.category.index') !!}">Shop</a></li>
                        <li><a href="{!! route('site.about') !!}">Over Ons</a></li>
                        <li><a href="{!! route('site.contact.index') !!}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                    <ul>
                        <li><a href="https://www.facebook.com/Tante-Martje-1930162150640318/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        {{--<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        {{--<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_nav_container">
                    <div class="cr" style="margin-right: 0px !important;">©2018 All Rights Reserverd.
                        <div class="float-right text-left">
                            <a href="{!! route('site.terms') !!}" style="margin-right: 15px;">Algemene Voorwaarden</a> |
                            <a href="{!! route('site.privacy') !!}" style="margin-left: 15px; margin-right: 0px;">Privacy Policy & Cookie Beleid</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
