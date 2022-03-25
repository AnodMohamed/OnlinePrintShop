<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminDashboardComponent extends Component
{
    //delete user
    /*
    public function deleteUser($id)
    {
        $user =User::find($id);
        $user->delete();
        
        //send message to user
        session()->flash('message','User has been deleted successfully!');
    }
    */

    public function render()
    {
        //$users =DB::table('users')->where('company_id', Auth::user()->id)->get();
        return view('livewire.admin.admin-dashboard-component')->layout('layouts.base');
    }
}
