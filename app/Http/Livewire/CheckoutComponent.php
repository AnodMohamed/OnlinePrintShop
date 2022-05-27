<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Transaction;
use Cart;
use Darryldecode\Cart\Cart as CartCart;
use Exception;
use Illuminate\Auth\Events\Validated;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CheckoutComponent extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $province;
    public $zipcode;

    public $paymentmode;
    public $shippmode;
    public $thankyou;
    public $int_price;
    
    public $cvc;
    public $cardname;
    public $cardnumber;
    public $nonth;
    public $year;
    public function updated($fields)
    {
        $this->validateOnly($fields, [

            'firstname' =>'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'province' => 'required',
            'zipcode' => 'required',
            'shippmode' => 'required',
            'paymentmode' => 'required',

        ]);
       
        
        if($this->paymentmode == 'card')
        {
            $this->validateOnly($fields,[
                'cardname' => ['required','string'],
                'cardnumber'=> ['required', 'numeric' ,'digits:16'],
                'cvc' => [ 'required', 'numeric' ,'digits:3'],
                'nonth' => [ 'required', 'numeric' ,'digits:2', 'min:1', 'max:12'],
                'year' => [ 'required', 'numeric' ,'digits:4', 'min:'.(date('Y'))],

            ]);
        }
        
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname' =>'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'province' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required',
        ]);
    
        
    
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal =session()->get('checkout')['subtotal'];
        $order->tax =session()->get('checkout')['tax'];
        $order->total =session()->get('checkout')['total'];
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->province = $this->province;
        $order->zipcode = $this->zipcode;
        $order->status ='ordered';
        $order->shippmode = $this->shippmode;
        $order->paymentmode =$this->paymentmode;


        $order->save();
        
        foreach(Cart::instance('cart')->content() as $item)
        {

        
          $orderitem  = New OrderItem();
          $orderitem->product_id =$item->id;
          $orderitem->order_id = $order->id;
          $orderitem->price =$item->price;
          $orderitem->quantity = $item->qty;
          $orderitem->save();
                
        }

        if($this->paymentmode == 'cash')
        {
           $this->resetCart();
        }elseif ($this->paymentmode == 'card'){

            $this->int_price=(int)session()->get('checkout')['total'];;

            $this->validate([
                'cardname' => ['required','string'],
                'cardnumber'=> ['required', 'numeric' ,'digits:16'],
                'cvc' => [ 'required', 'numeric' ,'digits:3'],
                'nonth' => [ 'required', 'numeric' ,'digits:2', 'min:1', 'max:12'],
                'year' => [ 'required', 'numeric' ,'digits:4', 'min:'.(date('Y'))],
    
            ]);
            
             //add STRIPE_SECRET 
            $stripe = new  \Stripe\StripeClient(env('STRIPE_SECRET'));


            //add customer detials
            
            $customer = $stripe->customers->create([
                'source' => 'tok_mastercard',
                "email" => Auth::user()->email,
            ]);
            //add card detials
            $stripe->tokens->create([

                'card' => [
                'name'=>$this->cardname,
                'number' =>$this->cardnumber,
                'exp_month' =>$this->nonth,
                'exp_year' =>$this->year,
                'cvc' => $this->year,
                ],

            ]);

            //send data to stripe
            $intent =  $stripe->paymentIntents->create([
                    'amount'=> $this->int_price.'00',
                    'currency' => 'usd',
                    'payment_method_types' => ['card'],
                    'payment_method' => 'pm_card_visa',
                    'customer'=> $customer,
                    'confirm' => true,
                ]);

                        // check if status is success
            $paymentStatus = json_decode($this->generateResponse($intent),true);
    
            if ($paymentStatus['success'] === true) {

                if($customer) {
                    //add Transaction detials to database
                    $transaction = new Transaction();
                    $transaction->order_id = $order->id;
                    $transaction->amount =  $this->int_price;
                    $transaction->currency = 'usd';
                    $transaction->status ='payed';
                    $transaction->transaction_id = $customer->id;
                    $transaction->save();
            
                
        
                }
                $this->resetCart();             

        
            }
            }
    }
    public function resetCart(){
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout'); 
        session()->flash('message','Order has been added successfully!');  
        return redirect()->route('user.myOrders');

    }
    public function generateResponse($intent) {
        if ($intent->status == 'succeeded') {
          // Handle post-payment fulfillment
          return json_encode(['success' => true]);
        } else {
          // Any other status would be unexpected, so error
          return json_encode(['error' => 'Invalid PaymentIntent status']);
        }
    }



    public function render()
    {
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
