<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Uploadfile;
use Illuminate\Support\Carbon;
use Cart;
use Illuminate\Support\Facades\Auth;
class UploadfileToPrintCommponent extends Component
{
    use WithFileUploads;
    public $name;
    public $file;
    public $from;
    public $to;
    public $printColor;
    public $printType;
    public $printWay;
    public $paperType;
    public $paperSize;
    public $coverType;
    public $note;
    public $coverPrice;
    public $papersPrice;
    public $regular_price;
    public $countpaper;

    public function updated($fields)
    {   
        $this->validateOnly($fields,[
            'name'=>'required',
            'file'=>'required |mimes:pdf',
            'from'=>'required |numeric',
            'to'=>'required |numeric',
            'printColor'=>'required',
            'printType'=>'required',
            'printWay'=>'required',
            'paperType'=>'required',
            'paperSize'=>'required',
            'coverType'=>'required',
            'note'=>'required',
        ]);

    }
   
    public function store(){

        $this->validate([
            'name'=>'required',
            'file'=>'required |mimes:pdf',
            'from'=>'required |numeric',
            'to'=>'required |numeric',
            'printColor'=>'required',
            'printType'=>'required',
            'printWay'=>'required',
            'paperType'=>'required',
            'paperSize'=>'required',
            'coverType'=>'required',
            'note'=>'required',
        ]);

        $Uploadfile = new  Uploadfile();
        $Uploadfile->note = $this->note;
        $Uploadfile->name = $this->name;

        $Uploadfile->from = $this->from;
        $Uploadfile->to = $this->to;
        $Uploadfile->printColor = $this->printColor;
        $Uploadfile->printType = $this->printType;

        $Uploadfile->printWay = $this->printWay;
        $Uploadfile->paperType = $this->paperType;
        $Uploadfile->paperSize = $this->paperSize;
        $Uploadfile->coverType = $this->coverType;
        $Uploadfile->note = $this->note;



        $this->countpaper = $this->to -  $this->from  + 1;
                                    
        $this->papersPrice= $this->countpaper * 0.10 ;

        if($this->coverType ==  "Lamination")
        {
            $this->coverPrice = 3;
        }
        elseif($this->coverType ==  "Plastic wire")
        {
            $this->coverPrice = 8;
        }
        elseif($this->coverType ==  "Iron wire")
        {
            $this->coverPrice = 9;
        }

        $this->regular_price = $this->papersPrice  +  $this->coverPrice ;

        $Uploadfile->coverPrice = $this->coverPrice;
        $Uploadfile->papersPrice = $this->papersPrice;
        $Uploadfile->regular_price = $this->regular_price;
        
        
        //change name 
        $fileName = Carbon::now()->timestamp.'.'.$this->file->extension();
        //store file in the folder
        $this->file->storeAs('files', $fileName , 'public');
        //store the  new file name in database 
        $Uploadfile->file = $fileName;  
        
        $Uploadfile->user_id = Auth::user()->id;  

        $Uploadfile->save();

        
        Cart::instance('cart')->add($this->id, $this->name ,1,  $this->regular_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Items added to the cart');
        return redirect()->route('product.cart');
        
    }
    public function render()
    {
        return view('livewire.user.uploadfile-to-print-commponent')->layout('layouts.base');
    }
}
