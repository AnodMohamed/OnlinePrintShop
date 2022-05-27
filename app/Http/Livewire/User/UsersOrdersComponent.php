<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UsersOrdersComponent extends Component
{
    public function render()
    {
        $Orders =DB::table('orders')->where('user_id',Auth::user()->id)->get();
        return view('livewire.user.users-orders-component',['Orders'=>$Orders])->layout('layouts.base');
    }
}
