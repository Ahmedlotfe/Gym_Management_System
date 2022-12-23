<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserSubscriptionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;

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

Route::get('/trainer', function () {
    return view('user.trainer');
});

Route::get('/admin_panel', function () {
    return view('admin.admin_panel');
});


Route::get('/', [UserSubscriptionController::class, 'home']);
Route::post('/create_sub/{subscription:id}', [UserSubscriptionController::class, 'create_subscription'])->middleware(['auth', 'verified']);
Route::get('/subscription_payment', [SubscriptionController::class, 'subscription_payment'])->middleware(['auth', 'verified']);
Route::get('/subscription_complete', [SubscriptionController::class, 'subscription_complete'])->middleware(['auth', 'verified']);
Route::get('/my_subscriptions', [UserSubscriptionController::class, 'my_subscriptions'])->middleware(['auth', 'verified']);


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/my_orders', [DashboardController::class, 'my_orders'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/order_detail', [DashboardController::class, 'order_detail'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('/welcome', [StoreController::class, 'welcome']);
Route::get('/store', [StoreController::class, 'store'])->middleware('auth');
Route::get('/cart', [CartItemController::class, 'cart'])->middleware('auth');
Route::post('/add_cart/{product:slug}', [CartItemController::class, 'add_cart'])->middleware('auth');
Route::post('/remove_cart/{product:slug}', [CartItemController::class, 'remove_cart'])->middleware('auth');
Route::post('/remove_cart_item/{product:slug}', [CartItemController::class, 'remove_cart_item'])->middleware('auth');

Route::get('/checkout', [CheckoutController::class, 'checkout'])->middleware('auth');
Route::post('/place_order', [CheckoutController::class, 'place_order'])->middleware('auth');
Route::get('/payment', [PaymentController::class, 'payment_view'])->middleware('auth');
Route::get('/order_complete', [OrderController::class, 'order_complete'])->middleware('auth');

Route::get('/add_product', [ProductController::class, 'create'])->middleware('auth')->middleware('admin');
Route::post('/add_product', [ProductController::class, 'store'])->middleware('admin');

Route::get('/{product:slug}', [ProductController::class, 'index'])->middleware('auth');
