<?php

use App\Http\Livewire\Admin\AddCategoryComponent;
use App\Http\Livewire\Admin\AddDriverComponent;
use App\Http\Livewire\Admin\AddProductComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminViewProduct;
use App\Http\Livewire\Admin\AdminViewProductComponent;
use App\Http\Livewire\Admin\ChangeOrderStatus;
use App\Http\Livewire\Admin\ManageCategoryComponent;
use App\Http\Livewire\Admin\ManageDriversComponent;
use App\Http\Livewire\Admin\ManageOrdersComponent;
use App\Http\Livewire\Admin\ManageProductComponent;
use App\Http\Livewire\Admin\ManageUsersComponent;
use App\Http\Livewire\Admin\SelectDriverComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\Driver\DriverChangestatuseComponent;
use App\Http\Livewire\Driver\DriverDashboardComponent;
use App\Http\Livewire\Driver\OrderDriveComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ProductDetiles;
use App\Http\Livewire\productmin\AdminViewProduct as ProductminAdminViewProduct;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UploadFileForAccessory;
use App\Http\Livewire\User\UploadfileToPrintCommponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UsersOrdersComponent;

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
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/productDetiles/{product_slug:slug}',ProductDetiles::class)->name('productDetiles');
Route::get('/think-you', ThankyouComponent::class)->name('thankyou');


//admin 
Route::middleware(['auth:sanctum','verified','authAdmin'])->group(function(){
    Route::get('/admin/users',ManageUsersComponent::class)->name('admin.users');
    Route::get('/admin/drivers',ManageDriversComponent::class)->name('admin.drivers');
    Route::get('/admin/addDriver',AddDriverComponent::class)->name('admin.AddDriver');
    Route::get('/admin/categories',ManageCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/addCategory',AddCategoryComponent::class)->name('admin.AddCategory');
    Route::get('/admin/products',ManageProductComponent::class)->name('admin.products');
    Route::get('/admin/addProduct',AddProductComponent::class)->name('admin.addProduct');
    Route::get('/admin/viewProduct/{product_slug:slug}',AdminViewProductComponent::class)->name('admin.viewProduct');
    Route::get('/admin/orders',ManageOrdersComponent::class)->name('admin.orders');
    Route::get('/admin/orders/changestatus/{order_id:id}',ChangeOrderStatus::class)->name('admin.orders.changestatus');
    Route::get('/admin/orders/selectdriver/{order_id:id}',SelectDriverComponent::class)->name('admin.orders.selectdriver');


});
//User
Route::middleware(['auth:sanctum','verified','authUser'])->group(function(){
    Route::get('/user/uploadFileForAccessory/{product_slug:slug}',UploadFileForAccessory::class)->name('user.uploadFileForAccessory');
    Route::get('/user/uploadfileToPrint',UploadfileToPrintCommponent::class)->name('user.uploadfileToPrint');
    Route::get('/user/myOrders',UsersOrdersComponent::class)->name('user.myOrders');

});
//driver
Route::middleware(['auth:sanctum','verified','authDriver'])->group(function(){
    Route::get('/driver/orders',OrderDriveComponent::class)->name('driver.orders');
    Route::get('/driver/orders/changestatus/{order_id:id}',DriverChangestatuseComponent::class)->name('driver.orders.changestatus');

});
