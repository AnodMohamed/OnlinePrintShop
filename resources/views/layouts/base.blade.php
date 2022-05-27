<!DOCTYPE html>
<html lang="en">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    {{-------text editor------}}
    <script src="https://cdn.tiny.cloud/1/hj792k117l0inekz8p0lwczrmdvvlgz7lf0vx3dooh2q937o/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
    {{----datetimepicker-----}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js" integrity="sha512-EnXkkBUGl2gBm/EIZEgwWpQNavsnBbeMtjklwAa7jLj60mJk932aqzXFmdPKCG6ge/i8iOCK0Uwl1Qp+S0zowg==" crossorigin="anonymous"></script>
    <!-- JS Page Level -->
     <!-- Head Libs -->
 
     .
    <!--[if lt IE 9]>
    <script src="assets/plugins/iesupport/html5shiv.js"></script>
    <script src="assets/plugins/iesupport/respond.min.js"></script>
    <![endif]-->

    @livewireStyles
    
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
                            <div class="media-body">
                                <div>
                                    <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal">Close</a><!--
                                    --><a href="{{ route('product.cart')}}" class="btn btn-theme btn-theme-transparent btn-call-checkout">Cart</a>
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
                            <li><a href=""><i class="fa fa-envelope"></i> <span>os2063718@gmail.com</span></a></li>
                        </ul>
                    @else
                        <ul class="list-inline">
                            <li class="icon-user"><a href="{{ route('login') }}"><img src="assets/img/icon-1.png" alt=""/> <span>Login</span></a></li>
                            <li class="icon-form"><a href="{{ route('register') }}"><img src="assets/img/icon-2.png" alt=""/> <span class="colored">Sign Up</span></span></a></li>
                            <li><a href=""><i class="fa fa-envelope"></i> <span>os2063718@gmail.com</span></a></li>
                        </ul>
                    @endif
                @endif
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

                <!-- Header shopping cart -->
                @livewire('cart-header-component');
                <!-- Header shopping cart -->

            </div>
        </div>
      
    </header>
    <!-- /HEADER -->

	{{ $slot }}

	{{---@livewire('footer-component');----}}
	 <!-- FOOTER -->
	 <footer class="footer">
       
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

<script src="{{ asset('assets/js/theme.js')}}"></script>

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{ asset('assets/plugins/jquery.cookie.js')}}"></script>
<!--<![endif]-->
    <script>
$('.dropdown-toggle').dropdown()
	</script>
	@livewireScripts
	
	@stack('scripts') 
	</body>
</html>