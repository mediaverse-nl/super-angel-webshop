<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container main-container text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase">{!! Editor('footer_title', 'text', false, 'Footer Content') !!}</h5>
                <p>{!! Editor('footer_title_description', 'richtext', false, 'Here you can use rows and columns here to organize your footer content.') !!}</p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase">Menu</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="{!! route('home') !!}">Home</a>
                    </li>
                    <li>
                        <a href="{!! route('site.activiteiten') !!}">Activiteiten</a>
                    </li>
                    <li>
                        <a href="{!! route('site.categorieen') !!}">Categorieen</a>
                    </li>
                    <li>
                        <a href="{!! route('site.about') !!}">Over ons</a>
                    </li>
                    <li>
                        <a href="{!! route('site.faq') !!}">F.A.Q.</a>
                    </li>
                    <li>
                        <a href="{!! route('site.contact.index') !!}">Contact</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase">Volg ons</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="https://www.facebook.com/fundoe.nl" target="_blank"><i class="fa-fw fab fa-facebook"></i> Facebook</a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/fundoe.nl" target="_blank"><i class="fa-fw fab fa-instagram"></i> instagram</a>
                    </li>
                    <li>
                        <a href="https://www.twitter.com/fundoe3" target="_blank"><i class="fa-fw fab fa-twitter-square"></i> Twitter</a>
                    </li>
                    <li>
                        <a href="https://www.pinterest.com/fundoeNederland" target="_blank"><i class="fa-fw fab fa-pinterest"></i> Pinterest</a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/fundoe" target="_blank"><i class="fa-fw fab fa-linkedin"></i> LinkedIn</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-left">
                        <a href="{!! route('site.terms') !!}">Voorwaarden </a> |
                        <a href="{!! route('site.privacy') !!}">Privacy </a>
                    </p>
                </div>
                <div class="col">
                    <p class="text-right"> © 2018 Copyright:<a href="#"> Fundoe.nl</a></p>
                </div>
            </div>

        </div>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->