<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shoppingcart;
use Illuminate\Support\Facades\Auth;

class CartHeaderComponent extends Component
{
    public function render()
    {

        //$carts =Shoppingcart::where('identifier', Auth::user()->email)->first();

        return view('livewire.cart-header-component');
    }
}
