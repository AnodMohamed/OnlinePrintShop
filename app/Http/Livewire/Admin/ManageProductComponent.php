<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

class ManageProductComponent extends Component
{

    public $searchTerm;
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('message','Product has been deleted successfully');
    }

    public function render()
    {
        $search ='%'.$this->searchTerm. '%';
        $products =Product::where('name','LIKE', $search)
                    ->orWhere('stock_status','LIKE',$search)
                    ->orWhere('regular_price','LIKE',$search)
                    ->orWhere('sale_price','LIKE',$search)
                    ->orWhere('id','DESC',$search)-> paginate(10);

        return view('livewire.admin.manage-product-component',['products'=> $products])->layout('layouts.base');
    }
}
