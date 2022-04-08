<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
class CartComponent extends Component
{
    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component', 'refreshComponent'); //for auto refreshing cart count

    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        if($product->qty >1){
            $qty = $product->qty - 1;
            Cart::instance('cart')->update($rowId, $qty);
            $this->emitTo('cart-count-component', 'refreshComponent'); //for auto refreshing cart count
    
        }
    }

    public function remove($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component', 'refreshComponent'); //for auto refreshing cart count
        session()->flash('success_message', 'Item has been removed');
       
    }

    public function destroy_all_cart(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component', 'refreshComponent'); //for auto refreshing cart count
    } 

    

    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }else
        {
            return redirect()->route('login');
        }
    }

    public function setAmountForcheckout()
    {
        if(!Cart::instance('cart')->count() > 0)
        {
            session()->forget('checkout');
            return;
        }
         session()->put('checkout',[
            'subtotal'=> Cart::instance('cart')->subtotal() ,
            'tax'=>  Cart::instance('cart')->tax() ,
            'total'=> Cart::instance('cart')->total() ,

        ]);
    }
    
    public function render()
    {
       // dd(Cart::instance('cart')->count());
        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);

        }
        
        $this->setAmountForcheckout();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
