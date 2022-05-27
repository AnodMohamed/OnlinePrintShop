<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class ManageUsersComponent extends Component
{
    public function deleteUser($id)
    {
        $user =User::find($id);
        $user->delete();
        
        //send message to user
        session()->flash('message','User has been deleted successfully!');
    }
    public function render()
    {
        $users =DB::table('users')->where('utype','USER')->get();
        return view('livewire.admin.manage-users-component',['users' => $users])->layout('layouts.base');
    }
}
