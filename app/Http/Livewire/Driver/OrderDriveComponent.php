<?php

namespace App\Http\Livewire\Driver;

use App\Models\OrderDriver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderDriveComponent extends Component
{
    public function render()
    {
        $order_driver =OrderDriver::where('user_id',Auth::user()->id)->get();

        return view('livewire.driver.order-drive-component',['order_driver'=> $order_driver])->layout('layouts.base');
    }
}
