<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AddDriverComponent extends Component
{
    public $name;
    public $email;
    public $password;
    public $utype;

    public function mount(){
        $this->utype = 'DRV';
    }

    public function updated($fields)
    {   
        //the user will see the validation live before submit
        $this->validateOnly($fields,[
            'name' => ['required', 'unique:users,name', 'max:200', 'min:5'],
            'email'=> ['required', 'unique:users,email','max:200', 'min:5','email'],
            'password' => [ 'required', 'regex:/(?=.*[a-zA-Z])(?=.*[0-9])/', 'min:8', 'max:30'],
        ]);

        
    }

    public function storeDriver(){
        //the system will validate the data intered 
        $this->validate([
            'name' => ['required', 'unique:users,name', 'max:200', 'min:5'],
            'email'=> ['required', 'unique:users,email','max:200', 'min:5','email'],
            'password' => [ 'required', 'regex:/(?=.*[a-zA-Z])(?=.*[0-9])/', 'min:8', 'max:30'],
        ]);

        //send to database
        //create new object
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password =  Hash::make($this->password);
        $user->utype = $this->utype;
        $user->save();

        session()->flash('message', 'Driver is added successfully');


    }
    public function render()
    {
        return view('livewire.admin.add-driver-component');
    }
}
