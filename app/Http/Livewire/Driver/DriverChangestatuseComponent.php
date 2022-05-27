<?php

namespace App\Http\Livewire\Driver;

use Livewire\Component;

class DriverChangestatuseComponent extends Component
{
    public $order_id;
    public $status;

    public function mount($order_id)
    {
        $this->id=$order_id;
        $order =Order::where('id', $order_id)->first();
        $this->status = $order->status;
        
    }

    public function updateStatus(){
        
        $order =Order::find($this->id);
        $order->status = $this->status;
         $order->save();
        session()->flash('message','Order has been updated successfully!');
    }
    public function render()
    {
        return view('livewire.driver.driver-changestatuse-component')->layout('layouts.base');
    }
}
