<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
class ProductDetiles extends Component
{
    use WithFileUploads;
    public $name;
    public $product;
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
    
    public function mount($product_slug)
    {
        $this->slug=$product_slug;
        $product =Product::where('slug', $product_slug)->first();
        $this->product = $product;
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

        return view('livewire.product-detiles',['imagex'=>$imagex] )->layout('layouts.base');
    }
}
