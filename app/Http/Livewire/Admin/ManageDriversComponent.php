<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class ManageDriversComponent extends Component
{
    public function deleteUser($id)
    {
        $user =User::find($id);
        $user->delete();
        
        //send message to user
        session()->flash('message','Driver has been deleted successfully!');
    }
    public function render()
    {
        $users =DB::table('users')->where('utype','DRV')->get();
        return view('livewire.admin.manage-drivers-component',['users' => $users]);
    }
}
