<?php

use App\Http\Livewire\Admin\AddCategoryComponent;
use App\Http\Livewire\Admin\AddDriverComponent;
use App\Http\Livewire\Admin\AddProductComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminViewProduct;
use App\Http\Livewire\Admin\AdminViewProductComponent;
use App\Http\Livewire\Admin\ManageCategoryComponent;
use App\Http\Livewire\Admin\ManageDriversComponent;
use App\Http\Livewire\Admin\ManageProductComponent;
use App\Http\Livewire\Admin\ManageUsersComponent;
use App\Http\Livewire\Driver\DriverDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\productmin\AdminViewProduct as ProductminAdminViewProduct;
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

Route::get('/', HomeComponent::class)->name('home');


//admin 
Route::middleware(['auth:sanctum','verified','authAdmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/users',ManageUsersComponent::class)->name('admin.users');
    Route::get('/admin/drivers',ManageDriversComponent::class)->name('admin.drivers');
    Route::get('/admin/addDriver',AddDriverComponent::class)->name('admin.AddDriver');
    Route::get('/admin/categories',ManageCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/addCategory',AddCategoryComponent::class)->name('admin.AddCategory');
    Route::get('/admin/products',ManageProductComponent::class)->name('admin.products');
    Route::get('/admin/addProduct',AddProductComponent::class)->name('admin.addProduct');
    Route::get('/admin/viewProduct/{product_slug:slug}',AdminViewProductComponent::class)->name('admin.viewProduct');


});
//User
Route::middleware(['auth:sanctum','verified','authUser'])->group(function(){
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');

});
//driver
Route::middleware(['auth:sanctum','verified','authDriver'])->group(function(){
    Route::get('/driver/dashboard',DriverDashboardComponent::class)->name('driver.dashboard');

});
