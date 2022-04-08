<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use Cart;
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
    public $thankyou;

    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;

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
            'paymentmode' => 'required',

        ]);
       
        /*
        if($this->paymentmode == 'card')
        {
            $this->validateOnly($fields,[
                'card_no' =>'required|numeric',
                'exp_month' =>'required|numeric',
                'exp_year' =>'required|numeric',
                'cvc' =>'required|numeric',

            ]);
        }
        */
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
        $order->save();
        
        foreach(Cart::instance('cart')->content() as $item)
        {
            $orderitem = new OrderItem();
            $orderitem->product_id =$item->id;
            $orderitem->order_id =$order->id;
            $orderitem->price =$item->price;
            $orderitem->quantity =$item->qty;
            $orderitem->save();
        }

        if($this->paymentmode = 'cod')
        {
           // $this->makeTransaction($order->id, 'pending');
           // $this->resetCart();
        }

       
            /*
            elseif ($this->paymentmode = 'card'){
                $stripe =Stripe::make(env("STRIPE_KEY"));

                try{
                    $token =$stripe->tokens()->create([
                        'card' => [
                            'number' => $this->card_no,
                            'exp_month' => $this->exp_month,
                            'exp_year' => $this->exp_year,
                            'cvc' => $this->cvc,
                        ]
                    ]);

                    if(!isset($token['id'])){
                        session()->flash('stripe_error','The stripe token was not generated correctly!');
                        $this->thankyou =0;
                    }

                    $customer =$stripe->customers()->create([
                        'name' => $this->firstname .''. $this->lastname,
                        'email' => $this->email,
                        'phone' => $this->mobile,
                        'address' => [
                            'line' =>$this->line1,
                            'postal_code' => $this->zipcode,
                            'city' => $this->city,
                            'state' => $this->province,
                            'country' => $this->country
                        ],
                        'shipping' =>[
                            'name' =>$this->firstname.'', $this->lastname,
                            'address' => [
                                'line' =>$this->line1,
                                'postal_code' => $this->zipcode,
                                'city' => $this->city,
                                'state' => $this->province,
                                'country' => $this->country
                            ],
                        ],
                        'source' => $token['id']
                    ]);
                    $charge =$stripe->charges()->create([
                        'customer' => $customer['id'],
                        'currency' => 'USD',
                        'amount' => session()->get('checkout')['total'],
                        'description' =>'Payment for order no'. $order->id
                    ]);
                    if($charge['status'] == 'succeeded')
                    {
                        $this->makeTransaction($order->id,'approved');
                        $this->resetCart();
                    }
                    else
                    {
                        session()->flash('stripe_error','Error in Transaction!');
                        $this->thankyou =0;
                    }
                }catch(Exception $e){
                    session()->flash('stripe_error',$e->getMessage());
                    $this->thankyou =0;
                }
            }*/
            
           //$this->sendOrderConfirmationMail($order);    
             
    }
    public function verifyForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if ($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        else if (!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }

    }
    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
