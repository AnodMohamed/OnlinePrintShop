<?php

namespace App\Http\Livewire\AdminViewProduct;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminViewProduct extends Component
{

    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $images;
    public $category_id;
    
    public function mount($product_id)
    {
        $this->id=$product_id;
        $product =Product::where('id', $product_id)->first();
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;

        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;

        $this->featured = $product->featured;
        $this->quantity = $product->quantity;



        $this->image = $product->image;
        $this->images = $product->images;

        $this->category_id = $product->category_id;


    }

    public function render()
    {
        $imagex = explode(',' ,$this->images);

        return view('livewire.productmin.productmin-view-product',['imagex'=>$imagex])->layout('layouts.base');
    }
}
