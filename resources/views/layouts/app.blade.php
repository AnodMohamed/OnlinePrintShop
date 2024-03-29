<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>OnlinePrintShop </title>
    
        <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.ico">
    
        <!-- CSS Global -->
        <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}"  rel="stylesheet">
        <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/prettyphoto/css/prettyPhoto.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/owl-carousel2/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/owl-carousel2/assets/owl.theme.default.min.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/plugins/animate/animate.min.css')}}" rel="stylesheet">
    
        <!-- Theme CSS -->
        <link href="{{ asset('assets/css/theme.css')}}" rel="stylesheet">
        <link href="{{ asset('assets/css/theme-green-1.css')}}" rel="stylesheet" id="theme-config-link">
    
        <!-- Head Libs -->
        <script src="{{ asset('assets/plugins/modernizr.custom.js')}}"></script>
    
        <!--[if lt IE 9]>
        <script src="assets/plugins/iesupport/html5shiv.js"></script>
        <script src="assets/plugins/iesupport/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body id="home" class="wide">
        <!-- PRELOADER -->
        <div id="preloader">
            <div id="preloader-status">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
                <div id="preloader-title">Loading</div>
            </div>
        </div>
        <!-- /PRELOADER -->
        
        <!-- WRAPPER -->
        <div class="wrapper">
        
            <!-- Popup: Shopping cart items -->
            <div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="container">
                        <div class="cart-items">
                            <div class="cart-items-inner">
        
                                <div class="media">
                                    <a class="pull-left" href="#"><img class="media-object item-image" src="assets/img/preview/shop/order-1s.jpg" alt=""></a>
                                    <p class="pull-right item-price">$450.00</p>
                                    <div class="media-body">
                                        <h4 class="media-heading item-title"><a href="#">1x Standard Product</a></h4>
                                        <p class="item-desc">Lorem ipsum dolor</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <p class="pull-right item-price">$450.00</p>
                                    <div class="media-body">
                                        <h4 class="media-heading item-title summary">Subtotal</h4>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-body">
                                        <div>
                                            <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal">Close</a><!--
                                            --><a href="shopping-cart.html" class="btn btn-theme btn-theme-transparent btn-call-checkout">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Popup: Shopping cart items -->
        
            <!-- Header top bar -->
            <div class="top-bar">
                <div class="container">
        
                    <div class="top-bar-left">
                        @if(Route::has('login'))
                            @auth
                                <ul class="list-inline">
                                    <li><a href=""><i class="fa fa-envelope"></i> <span>support@yourdomain.com</span></a></li>
                                </ul>
                            @else
                                <ul class="list-inline">
                                    <li class="icon-user"><a href="{{ route('login') }}"><img src="assets/img/icon-1.png" alt=""/> <span>Login</span></a></li>
                                    <li class="icon-form"><a href="{{ route('register') }}"><img src="assets/img/icon-2.png" alt=""/> <span class="colored">Sign Up</span></span></a></li>
                                    <li><a href=""><i class="fa fa-envelope"></i> <span>support@yourdomain.com</span></a></li>
                                </ul>
                            @endif
                        @endif
                    </div>
                    <div class="top-bar-right">
                        <ul class="list-inline">
                            <li class="hidden-xs"><a href="about.html">About</a></li>
                            <li class="hidden-xs"><a href="blog.html">Blog</a></li>
                            <li class="hidden-xs"><a href="contact.html">Contact</a></li>
                            <li class="hidden-xs"><a href="faq.html">FAQ</a></li>
                            <li class="hidden-xs"><a href="wishlist.html">My Wishlist</a></li>
                            <li class="dropdown currency">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">€ EURO<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#">€ EURO</a></li>
                                    <li><a href="#">€ EURO</a></li>
                                    <li><a href="#">€ EURO</a></li>
                                </ul>
                            </li>
        
                            <li class="dropdown flags">
                                @if(Route::has('login'))
                                    @auth
                                        @if(Auth::user()->utype == 'ADM')
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Admin : ({{ Auth::user()->name }})  <i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                                <li><a title="Edit Profile" href="{{ route('profile.show') }}">Edit Profile</a></li>
                                                <li><a title="Mange Users" href="{{ route('admin.users') }}">Mange Users</a></li>
                                                <li><a title="Mange Drivers" href="{{ route('admin.drivers') }}">Mange Drivers</a></li>
                                                <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logouut </a></li>
                                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                </form>
                                            </ul>
                                        @elseif (Auth::user()->utype == 'USER')
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> User : ({{ Auth::user()->name }})  <i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                                <a title="Edit Profile" href="{{ route('profile.show') }}">Edit Profile</a>
        
                                                <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logouut </a></li>
                                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                </form>
                                            </ul>
                                        @elseif (Auth::user()->utype == 'DRV')
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> User : ({{ Auth::user()->name }})  <i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a href="{{ route('driver.dashboard') }}">Dashboard</a></li>
                                                <a title="Edit Profile" href="{{ route('profile.show') }}">Edit Profile</a>
                                                <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logouut </a></li>
                                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                </form>
                                            </ul>
                                        @endif
        
                                    @endauth
                                @endif
                            </li>
        
        
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Header top bar -->
        
            <!-- HEADER -->
            <header class="header">
                <div class="header-wrapper">
                    <div class="container">
        
                        <!-- Logo -->
                        <div class="logo">
                            <a href=""><img src="{{ asset('assets/img/logoshop.png')}}" alt="logo"/></a>
                        </div>
                        <!-- /Logo -->
        
                        <!-- Header search -->
                        <div class="header-search">
                            <input class="form-control" type="text" placeholder="What are you looking?"/>
                            <button><i class="fa fa-search"></i></button>
                        </div>
                        <!-- /Header search -->
        
                        <!-- Header shopping cart -->
                        <div class="header-cart">
                            <div class="cart-wrapper">
                                <a href="wishlist.html" class="btn btn-theme-transparent hidden-xs hidden-sm"><i class="fa fa-heart"></i></a>
                                <a href="compare-products.html" class="btn btn-theme-transparent hidden-xs hidden-sm"><i class="fa fa-exchange"></i></a>
                                <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-cart"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs"> 0 item(s) - $0.00 </span> <i class="fa fa-angle-down"></i></a>
                                <!-- Mobile menu toggle button -->
                                <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                                <!-- /Mobile menu toggle button -->
                            </div>
                        </div>
                        <!-- Header shopping cart -->
        
                    </div>
                </div>
                <div class="navigation-wrapper">
                    <div class="container">
                        <!-- Navigation -->
                        <nav class="navigation closed clearfix">
                            <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                            <ul class="nav sf-menu">
                                <li class="active"><a href="index.html">Homepage</a>
                                    <ul>
                                        <li><a href="index.html">Homepage 1</a></li>
                                        <li><a href="index-2.html">Homepage 2</a></li>
                                        <li><a href="index-3.html">Homepage 3</a></li>
                                        <li><a href="index-4.html">Homepage 4</a></li>
                                        <li><a href="index-5.html">Homepage 5</a></li>
                                        <li><a href="index-6.html">Homepage 6</a></li>
                                        <li><a href="index-7.html">Homepage 7</a></li>
                                        <li><a href="index-8.html">Homepage 8</a></li>
                                        <li><a href="index-9.html">Homepage 9</a></li>
                                    </ul>
                                </li>
                                <li><a href="category.html">Shop</a>
                                    <ul>
                                        <li><a href="category.html">Shop Sidebar Left</a></li>
                                        <li><a href="category-right.html">Shop Sidebar Right</a></li>
                                        <li><a href="category-list.html">Shop List View</a></li>
                                        <li><a href="product-details.html">Product Page</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Blog</a>
                                    <ul>
                                        <li><a href="blog.html">Blog Sidebar Left </a></li>
                                        <li><a href="blog-right.html">Blog Sidebar Right</a></li>
                                        <li><a href="blog-post.html">Blog Single Post</a></li>
                                    </ul>
                                </li>
                                <li><a href="portfolio.html">Portfolio</a>
                                    <ul>
                                        <li><a href="portfolio.html">Portfolio 3 columns</a></li>
                                        <li><a href="portfolio-4col.html">Portfolio 4 columns</a></li>
                                        <li><a href="portfolio-alt.html">Portfolio Alternate</a></li>
                                        <li><a href="portfolio-single.html">Portfolio Single</a></li>
                                    </ul>
                                </li>
                                <li class="megamenu"><a href="#">Features</a>
                                    <ul>
                                        <li class="row">
                                            <div class="col-md-2">
                                                <h4 class="block-title"><span>Womens</span></h4>
                                                <ul>
                                                    <li><a href="#">Dresses</a></li>
                                                    <li><a href="#">Rompers & Jumpsuits</a></li>
                                                    <li><a href="#">Bodysuits</a></li>
                                                    <li><a href="#">Shirts & Blouses</a></li>
                                                    <li><a href="#">Coats & Jackets</a></li>
                                                    <li><a href="#">Blazers</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-2">
                                                <h4 class="block-title"><span>Mens</span></h4>
                                                <ul>
                                                    <li><a href="#">T-Shirts & Vests</a></li>
                                                    <li><a href="#">Sweaters & Cardigans</a></li>
                                                    <li><a href="#">Hoodies & Sweats</a></li>
                                                    <li><a href="#">Coats & Jackets</a></li>
                                                    <li><a href="#">Shirts</a></li>
                                                    <li><a href="#">Shorts</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-2">
                                                <h4 class="block-title"><span>Pages</span></h4>
                                                <ul>
                                                    <li><a href="shortcodes.html"><strong>Shortcodes</strong></a></li>
                                                    <li><a href="typography.html"><strong>Typography</strong></a></li>
                                                    <li><a href="coming-soon.html"><strong>Coming soon</strong></a></li>
                                                    <li><a href="error-page.html"><strong>404 Page</strong></a></li>
                                                    <li><a href="about.html"><strong>About</strong></a></li>
                                                    <li><a href="login.html"><strong>Login</strong></a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3">
                                                <h4 class="block-title"><span>Paragraph</span></h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                                                <p>Suspendisse molestie est nec tortor placerat, vel pellentesque metus sollicitudin. Suspendisse congue sem mauris, at ultrices felis blandit non.</p>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="product-list">
                                                    <div class="media">
                                                        <a class="pull-left media-link" href="#">
                                                            <img class="media-object" src="{{ asset('assets/img/preview/shop/top-sellers-2.jpg')}}" alt="">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Standard Product Header</a></h4>
                                                            <div class="rating">
                                                                <span class="star"></span><!--
                                                                --><span class="star active"></span><!--
                                                                --><span class="star active"></span><!--
                                                                --><span class="star active"></span><!--
                                                                --><span class="star active"></span>
                                                            </div>
                                                            <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <a class="pull-left media-link" href="#">
                                                            <img class="media-object" src="{{ asset('assets/img/preview/shop/top-sellers-3.jpg')}}" alt="">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading"><a href="#">Standard Product Header</a></h4>
                                                            <div class="rating">
                                                                <span class="star"></span><!--
                                                                --><span class="star active"></span><!--
                                                                --><span class="star active"></span><!--
                                                                --><span class="star active"></span><!--
                                                                --><span class="star active"></span>
                                                            </div>
                                                            <div class="price"><ins>$400.00</ins> <del>$425.00</del></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="category.html">Men</a></li>
                                <li><a href="category.html">Women</a></li>
                                <li><a href="category.html">Kids</a></li>
                                <li><a href="category.html">New</a></li>
                                <li class="sale"><a href="category.html">Sale</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- /Navigation -->
                    </div>
                </div>
            </header>
            <!-- /HEADER -->
        
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        <footer class="footer">
            <div class="footer-widgets">
                <div class="container">
                    <div class="row">
    
                        <div class="col-md-3">
                            <div class="widget">
                                <h4 class="widget-title">About Us</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sollicitudin ultrices suscipit. Sed commodo vel mauris vel dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <ul class="social-icons">
                                    <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget">
                                <h4 class="widget-title">News Letter</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <form action="#">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Enter Your Mail and Get $10 Cash"/>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-theme btn-theme-transparent">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-categories">
                                <h4 class="widget-title">Information</h4>
                                <ul>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Terms and Conditions</a></li>
                                    <li><a href="#">Private Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget widget-tag-cloud">
                                <h4 class="widget-title">Item Tags</h4>
                                <ul>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Jeans</a></li>
                                    <li><a href="#">Top Sellers</a></li>
                                    <li><a href="#">E commerce</a></li>
                                    <li><a href="#">Hot Deals</a></li>
                                    <li><a href="#">Supplier</a></li>
                                    <li><a href="#">Shop</a></li>
                                    <li><a href="#">Theme</a></li>
                                    <li><a href="#">Website</a></li>
                                    <li><a href="#">Isamercan</a></li>
                                    <li><a href="#">Themeforest</a></li>
                                </ul>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
            <div class="footer-meta">
                <div class="container">
                    <div class="row">
    
                        <div class="col-sm-6">
                            <div class="copyright">Copyright 2014OnlinePrintShop |   All Rights Reserved   |   Designed By Jthemes</div>
                        </div>
                        <div class="col-sm-6">
                            {{---
                            <div class="payments">
                                <ul>
                                    <li><img src="assets/img/preview/payments/visa.jpg" alt=""/></li>
                                    <li><img src="assets/img/preview/payments/mastercard.jpg" alt=""/></li>
                                    <li><img src="assets/img/preview/payments/paypal.jpg" alt=""/></li>
                                    <li><img src="assets/img/preview/payments/american-express.jpg" alt=""/></li>
                                    <li><img src="assets/img/preview/payments/visa-electron.jpg" alt=""/></li>
                                    <li><img src="assets/img/preview/payments/maestro.jpg" alt=""/></li>
                                </ul>
                            </div>
                            --}}
                        </div>
    
                    </div>
                </div>
            </div>
        </footer>
        <!-- /FOOTER -->
    
        <div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>
    
    </div>
    <!-- /WRAPPER -->
    <!-- JS Global -->
    <script src="{{ asset('assets/plugins/jquery/jquery-1.11.1.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/superfish/js/superfish.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/prettyphoto/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('assets/plugins/owl-carousel2/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery.sticky.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery.smoothscroll.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/smooth-scrollbar.min.js')}}"></script>
    
    <!-- JS Page Level -->
    <script src="{{ asset('assets/js/theme.js')}}"></script>
    
    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="{{ asset('assets/plugins/jquery.cookie.js')}}"></script>
    <script src="{{ asset('assets/js/theme-config.js')}}"></script>
    <!--<![endif]-->
        <script>
    $('.dropdown-toggle').dropdown()
        </script>
        @livewireScripts
        
    </body>
</html>
