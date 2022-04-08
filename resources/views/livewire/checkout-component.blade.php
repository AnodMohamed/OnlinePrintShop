<main>
    <div class="content-area">
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="page-header">
                    <h1>Add Driver</h1>
                </div>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="{{ route('admin.drivers') }}">Manage Drivers</a></li>
                    <li class="active">Add Driver</li>
                </ul>
            </div>
        </section>
        <section class="page-section ">
            <div class="container"  style="width:1000px">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                 @endif
                <form name="contact-form"   wire:submit.prevent="placeOrder" class="contact-form" id="contact-form">

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label for="firstname">First name</label>
                            <input type="text" wire:model="firstname" name="firstname" id="firstname" placeholder="firstname" value="" size="30" data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="First Name is required">
                            @error('firstname')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="lastname">Last name</label>
                            <input type="text" wire:model="lastname" name="lastname" id="lastname" placeholder="lastname" value="" size="30" data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Last Name is required">
                            @error('lastname')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="email">Email</label>
                            <input type="email" wire:model="email" name="email" id="email" placeholder="Email" value="" size="30" data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Email is required">
                            @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                             @enderror
                        </div>
                    </div>

                    
                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="mobile">Mobile</label>
                            <input type="text" wire:model="mobile" name="mobile" id="mobile" placeholder="mobile" value="" size="30" data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="Mobile is required">
                            @error('mobile')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="line1">line1</label>
                            <input type="text" wire:model="line1" name="line1" id="line1" placeholder="line1" value="" size="30" data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="line1 is required">
                            @error('line1')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="line1">line2</label>
                            <input type="text" wire:model="line2" name="line2" id="line2" placeholder="line2" value="" size="30" data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="line2 is required">
                        
                        </div>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="province">Province</label>
                            <input type="text" wire:model="province" name="province" id="province" placeholder="province" value="" size="30" data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="province is required">
                            @error('province')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="outer required">
                        <div class="form-group af-inner">
                            <label  for="zipcode">Zipcode</label>
                            <input type="text" wire:model="zipcode" name="zipcode" id="zipcode" placeholder="zipcode" value="" size="30" data-toggle="tooltip" title="" class="form-control placeholder" data-original-title="zipcode is required">
                            @error('zipcode')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="summary summary-checkout">
                        <div class="summary-item payment-method">
                            <h4 class="title-box">Payment Method</h4>
                           
                            
                            <p class="summary-info"><span class="title">Check / Money order</span></p>
                            <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                            <div class="choose-payment-methods">
                                <label class="payment-method">
                                    <input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
                                    <span>Cash On Delivery</span>
                                    <span class="payment-desc">Order Now Pay on Delivery </span>
                                   
                                </label>
                                <label class="payment-method">
                                    <input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
                                   
                                    <span>Debit / Credit Card  </span>
                                    <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                                    
                                </label>
                                <label class="payment-method">
                                    <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentmode">
                                    
                                    <span>Paypal</span>
                                    <span class="payment-desc">You can pay with your credit</span>
                                    <span class="payment-desc">card if you don't have a paypal account</span>
                                </label>
                                @error('paymentmode')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                               
                            </div>
                            @if(Session::has('checkout'))
                                <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">{{Session::get('checkout')['total']}}</span></p>
                            @endif
                            @if($errors->isEmpty())
                            <div wire:ignore id="processing" style="font-size:22px; margin-bottom:20px;padding-left:37px;color:green;display:none;">
                                <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                <span>Processing</span>
                            </div>
                            @endif
                            <button type="submit" class="btn btn-medium">Place order now</button>
                        </div>
                        <div class="summary-item shipping-method">
                            <h4 class="title-box f-title">Shipping method</h4>
                            <p class="summary-info"><span class="title">Flat Rate</span></p>
                            <p class="summary-info"><span class="title">Fixed $50.00</span></p>
                            
                        </div>
                    </div>

                    <div class="required" style="text-align: center;">
                        <button  type="submit" class="btn  btn-theme btn-theme-dark " > Add Driver</button>
                    </div>

                </form>

            </div>
        </section>
    </div>
</main>
