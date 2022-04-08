<?php

namespace App\Http\Livewire;
/*
use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;*/
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Models\Product;

class HomeComponent extends Component
{

    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');
        
        session()->flash('success_message', 'Item added to the cart');
        return redirect()->route('product.cart');
    }


    public function render()
    {
        $products =Product::where('featured', '1')
                           ->where('category_id',  1)->get();
        
        $accessories  =Product::where('featured', '1')
                           ->where('category_id',  2)->get();
        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);

        }
                           
       return view('livewire.home-component',['products'=> $products, 'accessories' => $accessories])->layout('layouts.base');
    }
}