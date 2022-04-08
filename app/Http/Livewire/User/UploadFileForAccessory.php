<?php

namespace App\Http\Livewire\User;

use App\Models\Product;
use App\Models\UploadAccessory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Cart ;
class UploadFileForAccessory extends Component
{

    use WithFileUploads;
    public $note;
    public $regular_price;
    public $name;
    public $printType;
    public $image;
    public $product_id;

    public function mount($product_slug)
    {
        $this->slug=$product_slug;
        $product = Product::where('slug', $product_slug)->first();
        $this->regular_price = $product->regular_price;
        $this->name = $product->name;
        $this->product_id = $product->id;

    }

    public function updated($fields)
    {   
        $this->validateOnly($fields,[
            'note'=>'required',
            'printType'=>'required',
            'image'=>'required |mimes:jpg,jpeg,png',
        ]);

    }
    public function storeImage(){

        $this->validate([
            'note'=>'required',
            'printType'=>'required',
            'image'=>'required |mimes:jpg,jpeg,png',
        ]);

        $uploadAccessory = new UploadAccessory();
        $uploadAccessory->note = $this->note;
        $uploadAccessory->name = $this->name;
        $uploadAccessory->printType = $this->printType;
        $uploadAccessory->regular_price = $this->regular_price;
        $uploadAccessory->product_id = $this->product_id;
        $uploadAccessory->user_id = Auth::user()->id;

        
        //change the name of the image 
        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        //store image in the folder
        $this->image->storeAs('products', $imageName , 'public');
        //save the new name in the database
        $uploadAccessory->image = $imageName;  
        
        $uploadAccessory->save();

        Cart::instance('cart')->add($this->product_id, $this->name ,1,  $this->regular_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Items added to the cart');
        return redirect()->route('product.cart');
    }
    public function render()
    {
        return view('livewire.user.upload-file-for-accessory')->layout('layouts.base');
    }
}
