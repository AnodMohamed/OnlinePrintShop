<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
class ManageCategoryComponent extends Component
{
    public $searchTerm;

    public function deleteCategory($id)
    {
        $category =Category::find($id);
        $category->delete();
        
        //send message to user
        session()->flash('message','Category has been deleted successfully!');
    }
    public function render()
    {
        $search ='%'.$this->searchTerm. '%';

        $categories =Category::where('name','LIKE', $search)
                    ->orWhere('slug','LIKE',$search)
                    ->orWhere('id','DESC',$search)-> paginate();
                    
        return view('livewire.admin.manage-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
