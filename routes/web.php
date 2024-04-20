<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Getways\PaypalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\SubcribeController;
use App\Http\Controllers\LiveSearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('subcribe',[SubcribeController::class,'subcribe'])->name('mail.subcribe');

Route::get('/',[HomeController::class,'index'])->name('main');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth','isadmin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/Admin_advance',[AdminController::class,'advance'])->name('admin.advance');
Route::get('/admin_delete',[AdminController::class,'admin_delete'])->name('admin.Account_del');
Route::delete('/admin_destroy',[AdminController::class,'destroy'])->name('admin.destroy');

Route::get('/admin_profile',[AdminController::class,'profile'])->name('admin.profile');
Route::put('/admin_Profile_update',[AdminController::class,'Profile_update'])->name('admin.profile.update');
Route::get('/admin_update_password',[AdminController::class,'update_password'])->name('admin.update_password');
Route::put('/admin_password_reset',[AdminController::class,'password_reset'])->name('admin.password_reset');

Route::get('/advance',[VendorController::class,'advance'])->name('vendor.advance');
Route::get('/Account_del',[VendorController::class,'Account_del'])->name('vendor.Account_del');
Route::delete('/destroy',[VendorController::class,'destroy'])->name('vendor.destroy');

Route::get('/vendor.profile',[VendorController::class,'profile'])->name('vendor.profile');
Route::put('/vendor.Profile_update',[VendorController::class,'Profile_update'])->name('vendor.profile.update');
Route::get('/vendor.update_password',[VendorController::class,'update_password'])->name('vendor.update_password');
Route::put('/vendor.password_reset',[VendorController::class,'password_reset'])->name('vendor.password_reset');


});
Route::middleware('auth')->group(function () {
Route::get('/profile',[HomeController::class,'profile'])->name('user.profile');
Route::get('/product_des/{id}',[HomeController::class,'product_details'])->name('product.desc');
Route::get('/all_product',[HomeController::class,'all_product'])->name('all_product');
Route::get('/product_search',[HomeController::class,'product_search'])->name('product_search');
Route::post('/add_cart/{id}',[HomeController::class,'add_cart'])->name('product.add_cart');
Route::get('/show_cart',[HomeController::class,'show_cart'])->name('product.show_cart');
Route::get('/cart_delete/{id}',[HomeController::class,'delete'])->name('product.cart_delete');
Route::get('/cart_update/{id}',[HomeController::class,'update_cart'])->name('product.update_cart');
Route::put('/cart_update_done/{id}',[HomeController::class,'update']);
Route::get('/order',[HomeController::class,'order'])->name('cart.order');
Route::get('/wishlists',[HomeController::class,'wishlists'])->name('home.wishlists');
Route::get('/wishlist/{id}',[HomeController::class,'add_wislists'])->name('wishlists.add_wislists');
Route::get('/wishlist_remove/{id}',[HomeController::class,'remove_wislists'])->name('remove_wislists');
Route::get('/adress',[HomeController::class,'adress'])->name('user.adress');   
Route::post('/store_address',[HomeController::class,'store_address'])->name('user.store_address');    
Route::get('/my_order',[HomeController::class,'my_order'])->name('user.my_order'); 
Route::get('/cancel_order/{id}',[HomeController::class,'cancel_order'])->name('user.cancel_order'); 
});
require __DIR__.'/auth.php';

Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/category',[AdminController::class,'category'])->name('admin.category');
Route::post('/store',[AdminController::class,'store'])->name('admin.category.store');
Route::get('/delete/{id}',[AdminController::class,'delete'])->name('admin.category.delete');
Route::get('/product_view',[AdminController::class,'product_view'])->name('admin.product.show');





Route::get('/order_view',[AdminController::class,'order'])->name('admin.order.show');
Route::get('/searchorder',[AdminController::class,'searchorder'])->name('admin.searchorder');
Route::get('/delivered/{id}',[AdminController::class,'order_action'])->name('admin.order.action');
Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf'])->name('admin.print_pdf');
Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');



Route::get('/product',[VendorController::class,'product'])->name('vendor.product');
Route::post('/pstore',[VendorController::class,'store'])->name('vendor.store');
Route::get('/list',[VendorController::class,'list'])->name('vendor.product.list');
Route::get('/pdelete/{id}',[VendorController::class,'delete'])->name('vendor.product.delete');
Route::get('/edit/{id}',[VendorController::class,'edit'])->name('vendor.product.edit');
Route::put('/update/{id}',[VendorController::class,'update'])->name('vendor.product.update');


Route::get('/paidorder',[HomeController::class,'paidorder'])->name('paidorder.user');
Route::post('/stripe',[HomeController::class,'stripe'])->name('payment.stripe');
Route::get('/stripeSuccsee',[HomeController::class,'stripeSuccsee'])->name('stripe.success');
Route::get('/stripeCancel',[HomeController::class,'stripeCancel'])->name('stripe.cancel');
// Route::post('/stripe',[HomeController::class,'stripePost'])->name('stripe.post');


Route::post('paypal/payment',[PaypalController::class,'paypal'])->name('paypal.payment');
Route::get('paypal/success',[PaypalController::class,'success'])->name('paypal.success');
Route::get('paypal/cancel',[PaypalController::class,'cancel'])->name('paypal.cancel');



Route::get('/action', [LiveSearchController::class, 'action'])->name('action');