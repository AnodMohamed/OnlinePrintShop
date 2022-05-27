<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ManageOrdersComponent extends Component
{
    public function render()
    {
        $Orders =DB::table('orders')->get();
        return view('livewire.admin.manage-orders-component',['Orders'=>$Orders])->layout('layouts.base');
    }
}
