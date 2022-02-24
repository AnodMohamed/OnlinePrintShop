<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\User\UserDashboardComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeComponent::class);


//admin 
Route::middleware(['auth:sanctum','verified','authAdmin'])->group(function(){
    Route::get('/admin/dashboarpd',AdminDashboardComponent::class)->name('hbadmin.dasoard');
});
//User
Route::middleware(['auth:sanctum','verified','authUser'])->group(function(){
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');

});
