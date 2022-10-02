<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => ['auth.shopify']], function () {
    // Index
    Route::get('/', [App\Http\Controllers\ProductController::class, 'Dashboard'])->name('home');
    Route::get('sync-products', [App\Http\Controllers\ProductController::class, 'ShopifyProducts'])->name('sync.products');
    Route::get('products-filter', [App\Http\Controllers\ProductController::class, 'ProductsFilter'])->name('products.filter');
    Route::get('product-view/{id}', [App\Http\Controllers\ProductController::class, 'ProductView'])->name('product.view');

});
//Stripe Payment
Route::get('stripe', [App\Http\Controllers\StripePaymentController::class, 'stripe'])->name('pay.stripe');
Route::post('stripe-post', [App\Http\Controllers\StripePaymentController::class, 'stripePost'])->name('stripe.post');
