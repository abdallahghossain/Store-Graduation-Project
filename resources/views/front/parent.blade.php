<!DOCTYPE html>
<html lang="en">

<head>
    <title>Minishop @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('cms/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/css/style.css') }}">
    @stack('css')
</head>

<body class="goto-here">
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand " href="{{ route('home') }}">Minishop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                    aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto ">
                        <li class="nav-item "><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Catalog</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="{{ route('shop.ShowAllProducts') }}">Shop</a>
                                <a class="dropdown-item" href="{{ route('cart') }}">Cart</a>
                                <a class="dropdown-item" href="{{ route('checkout') }}">Checkout</a>
                            </div>
                        </li>
                        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="{{ route('blog') }}" class="nav-link">Blog</a></li>
                        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                        <li class="nav-item cta cta-colored"><a href="{{ route('cart') }}" class="nav-link"><span
                                    class="icon-shopping_cart"></span>{{ count(session('cart.items') ?? []) }}</a></li>

                        @auth('web')
                            <li class="nav-item"><a href="{{ route('auth.userLogout') }}" class="nav-link">logout</a></li>
                        @endauth
                        @guest('web')
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">Login</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown04">
                                    <a class="dropdown-item" href="{{ route('auth.userLogin') }}">Login</a>
                                    <a class="dropdown-item" href="{{ route('auth.userRegister') }}">Register</a>
                                </div>
                            </li>
                        @endguest
                </div>
            </div>
        </nav>
        <!-- END nav -->

        @yield('content')

        <!-- loader -->
        <!-- Footer-->
        <footer class="ftco-footer ftco-section">
            <div class="container">
                <div class="row">
                    <div class="mouse">
                        <a href="#" class="mouse-icon">
                            <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
                        </a>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Minishop</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.
                            </p>
                            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                </li>
                                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
                                </li>
                                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4 ml-md-5">
                            <h2 class="ftco-heading-2">Menu</h2>
                            <ul class="list-unstyled">
                                <li><a href="#" class="py-2 d-block">Shop</a></li>
                                <li><a href="{{ route('about') }}" class="py-2 d-block">About</a></li>
                                <li><a href="#" class="py-2 d-block">Journal</a></li>
                                <li><a href="{{ route('contact') }}" class="py-2 d-block">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Help</h2>
                            <div class="d-flex">
                                <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                                    <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                                    <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                                    <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                                    <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                                </ul>
                                <ul class="list-unstyled">
                                    <li><a href="#" class="py-2 d-block">FAQs</a></li>
                                    <li><a href="#" class="py-2 d-block">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="ftco-footer-widget mb-4">
                            <h2 class="ftco-heading-2">Have a Questions?</h2>
                            <div class="block-23 mb-3">
                                <ul>
                                    <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St.
                                            Mountain View, San Francisco, California, USA</span></li>
                                    <li><a href="#"><span class="icon icon-phone"></span><span
                                                class="text">+2
                                                392 3929 210</span></a></li>
                                    <li><a href="#"><span class="icon icon-envelope"></span><span
                                                class="text">info@yourdomain.com</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">

                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | <a
                                href="https://en.ucas.edu.ps/" target="_blank">UCAS</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!--End Footer-->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none"
                    stroke-width="4" stroke="#eeeeee" />
                <circle class="path" cx="24" cy="24" r="22" fill="none"
                    stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
            </svg></div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
        <script src="{{ asset('cms/js/jquery.min.js') }}"></script>
        <script src="{{ asset('cms/js/jquery-migrate-3.0.1.min.js') }}"></script>
        <script src="{{ asset('cms/js/popper.min.js') }}"></script>
        <script src="{{ asset('cms/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('cms/js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('cms/js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('cms/js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('cms/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('cms/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('cms/js/aos.js') }}"></script>
        <script src="{{ asset('cms/js/jquery.animateNumber.min.js') }}"></script>
        <script src="{{ asset('cms/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ asset('cms/js/scrollax.min.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="{{ asset('cms/js/google-map.js') }}"></script>
        <script src="{{ asset('cms/js/main.js') }}"></script>
        @stack('js')

</body>

</html>
