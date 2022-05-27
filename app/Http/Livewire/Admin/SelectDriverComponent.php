<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\OrderDriver;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SelectDriverComponent extends Component
{
    public $status;
    public $user_id;
    public $order_id;
    public function mount($order_id)
    {
        $this->id=$order_id;
        $order =Order::where('id', $order_id)->first();
        $this->order_id = $order->id;
        
    }


    public function updated($fields){
        $this->validateOnly($fields,[
            'user_id' => 'required',
        ]);
    }


    public function selectdriver(){

        $this->validate([
            'user_id' => 'required',
        ]);
        $orderdrive = new OrderDriver();
        $orderdrive->user_id = $this->user_id;
        $orderdrive->order_id = $this->order_id;
        $orderdrive->save();

        session()->flash('message','Order has been add to driversuccessfully!');
    }
    public function render()
    {
        $drivers =DB::table('users')->where('utype','DRV')->get();

        return view('livewire.admin.select-driver-component',['drivers' => $drivers])->layout('layouts.base');
    }
}
