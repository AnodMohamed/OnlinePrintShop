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
                <form name="contact-form"   wire:submit.prevent="placeOrder" class="contact-form" id="contact-form"    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">

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
                            @if ($paymentmode == 'card')
                            {{-----Name on Card-----}}
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                <label for="validationTooltip01">Name on Card</label>
                                <input type="text" class="form-control" id="cardname" placeholder="Name on Card" wire:model="cardname" required>
                                @error('cardname')
                                    <div class=" text-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                                </div>         
                            </div>
         
  
  
                            {{-----Card Number-----}}
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    4242424242424242
                                    <label for="validationTooltip01">Card Number</label>
                                    <input type="text"  class="form-control" id="cardnumber" placeholder="Card Number" wire:model="cardnumber" required>
                                    @error('cardnumber')
                                        <div class=" text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>         
                            </div>
                            
                                {{-----Card CVC-----}}
                                <div class="row">
                                <div class="col-md-12 mb-3">
                                <label for="validationTooltip01">CVC</label>
                                    <input type="text"  class="form-control" placeholder='ex. 311'  id="cvc"  wire:model="cvc" required>
                                    @error('cvc')
                                        <div class=" text-danger">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>         
                                </div>
  
                            {{----Expiration Month-----}}
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationTooltip01">Expiration Month</label>
                                <input type="text" class="form-control" id="nonth" placeholder="MM" wire:model="nonth" required>
                                @error('nonth')
                                    <div class=" text-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                                </div>         
                            </div>


                            {{-----Expiration Year -----}}
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationTooltip01">Expiration Yer</label>
                                <input type="text" size='4' class="form-control" id="year" placeholder="YYYY" wire:model="year" required>
                                @error('year')
                                    <div class=" text-danger">
                                        {{$message}}
                                    </div>
                                @enderror
                                </div>         
                            </div>


                            @endif
                            <p class="summary-info grand-total"><span>Payment</span> <span class="grand-total-price">{{Session::get('checkout')['total']}}</span></p>

                            <div class="choose-payment-methods">
                                <label class="payment-method">
                                    <input name="payment-method" id="payment-method-bank" value="cash" type="radio" wire:model="paymentmode">
                                    @error('paymentmode')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                    <span>Cash </span>
                                   
                                </label>
                                <label class="payment-method">
                                    <input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
                                   
                                    <span>Debit / Credit Card  </span>                                    
                                </label>

                                @error('paymentmode')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                        </div>

                     

                       
                       
                    </div>
                    <div class="choose-Shippe-methods">
                        <p class="summary-info grand-total"><span>Shippe</span> <span class="grand-total-price">{{Session::get('checkout')['total']}}</span></p>

                        <label class="payment-method">
                            <input name="Shippe-method" id="Shippe-method-visa" value="On store" type="radio" wire:model="shippmode">
                           
                            <span>On store </span>                                    
                        </label>

                        <label class="payment-method">
                            <input name="Shippe-method" id="Shippe-method-visa" value="Delivery" type="radio" wire:model="shippmode">
                           
                            <span>Delivery  </span>                                    
                        </label>
                        @error('shippmode')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      
                    </div>

                    @if ($shippmode == 'Delivery')
                    <div class="summary-item shipping-method">
                        <p class="summary-info"><span class="title">{{Session::get('checkout')['total']+10}}</span></p>
                        
                    </div>
                    @else

                        <div class="summary-item shipping-method">
                            <p class="summary-info"><span class="title">{{Session::get('checkout')['total']}}</span></p>
                            
                        </div>
                    @endif

                    <button class="msg_send_btn" type="submit">send</button>

                </form>

            </div>
        </section>
    </div>
</main>
