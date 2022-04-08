<div class="header-cart">
    <div class="cart-wrapper">
        <a href="compare-products.html" class="btn btn-theme-transparent hidden-xs hidden-sm"><i class="fa fa-exchange"></i></a>
        <a href="" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-cart">
        <i class="fa fa-shopping-cart"></i> 
        <span class="hidden-xs">
        
        @if(Cart::instance('cart')->count() > 0)
            {{Cart::instance('cart')->count()}} item(s)
        @else
             0 item(s) 
        @endif

        
        </span> 
        <i class="fa fa-angle-down"></i></a>
        <!-- Mobile menu toggle button -->
    </div>

</div>
