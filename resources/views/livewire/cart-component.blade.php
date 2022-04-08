
<div>
    <div class="content-area">
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="page-header">
                    <h1> Shopping Cart </h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="{{ route('home')}}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ul>
            </div>
        </section>
        <section class="page-section ">
            <div class="container">
                <h3 class="block-title alt"><i class="fa fa-angle-down"></i>2. Orders</h3>
                @if(Cart::instance('cart')->count() > 0)

                    @if(Session::has('success_message'))
                        <div class="alert alert-success ">
                            <strong> Success! </strong>{{ Session::get('success_message') }}
                        </div>
                    @endif                
                    <div class="row orders">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Quantity</th>
                                    <th>Product Name</th>
                                    <th>Total</th>
                                    <th>Action </th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach (Cart::instance('cart')->content() as $item )

                                    <tr>
            
                                        <td class="quantity">
                                            <div class="quantity-input">                                                
                                                <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{ $item->rowId }}')"><i class="fa fa-minus"></i></a>
                                                <input type="text" name="product-quatity" value="{{ $item->qty }}" data-max="120" pattern="[0-9]*" >
                                                <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{ $item->rowId }}')"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                        </td>
                                        <td class="description">
                                            <h4><a href="#">{{$item->name}}</a></h4>
                                            
                                        </td>
                                        <td>
                                            {{$item->subtotal}}
                                        </td>
                                    

                                        <td class="total">
                                            
                                            <a href="#" class="btn btn-delete" title="" wire:click.prevent="remove('{{ $item->rowId }}')">
                                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" class="btn btn-delete" title="" wire:click.prevent="remove('{{ $item->rowId }}')">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                       
                        <div class="col-md-4">
                            <h3 class="block-title"><span>Shopping cart</span></h3>
                            <div class="shopping-cart">
                                <table>
                                    <tr>
                                        <td>tax:</td>
                                        <td>{{ Cart::instance('cart')->tax() }}</td>
                                    </tr>
                                    <tfoot>
                                    <tr>
                                        <td>Total:</td>
                                        <td>>{{ Cart::instance('cart')->total() }}</td>
                                    </tr>
                                    </tfoot>
                                </table>

                                <button class="btn btn-theme btn-theme-dark btn-block">Apply Coupon</button>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="update-clear">
                                <a class="btn btn-theme btn-theme-dark btn-block" href="#" wire:click.prevent="destroy_all_cart()">Clear Shopping Cart</a>
                            </div>
                        </div>  

                        <div class="col-md-4">
                            <div class="update-clear">
                                <a class="btn btn-theme btn-theme-dark btn-block" href="#" wire:click.prevent="checkout()">Check out</a>
                            </div>
                        </div>  

                    </div>
                   
  
                @else
                    <p> No item in cart</p>
                @endif 
            </div>
        </section>
    </div>
</div>
