<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChangeOrderStatus extends Component
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
        return view('livewire.admin.change-order-status')->layout('layouts.base');
    }
}
