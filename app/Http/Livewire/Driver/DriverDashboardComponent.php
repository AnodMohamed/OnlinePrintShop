<?php

namespace App\Http\Livewire\Driver;

use Livewire\Component;

class DriverDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.driver.driver-dashboard-component')->layout('layouts.base');
    }
}
