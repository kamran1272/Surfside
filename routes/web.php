<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ContactController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
    Route::post('/generate-slug', [ProductController::class, 'generateSlug'])->name('generate.slug');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/add-product', [ProductController::class, 'create'])->name('products.create');

    Route::resource('categories', CategoryController::class);
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    Route::resource('brands', BrandController::class);
    Route::get('/brands', [BrandController::class, 'index'])->name('brands');

     Route::resource('orders', OrderController::class)->except(['create']);

});

Route::view('/index', 'Admin.index');
Route::view('/admin', 'Admin.index');
Route::view('/add-brand', 'Admin.add-brand');
Route::view('/add-category', 'Admin.add-category');
Route::view('/add-coupon', 'Admin.add-coupon');
Route::view('/coupons', 'Admin.coupons');
Route::view('/users', 'Admin.users');
Route::view('/settings', 'Admin.settings');
Route::view('/add-slide', 'Admin.add-slide');
Route::view('/slider', 'Admin.slider');
Route::view('/order-details', 'Admin.order-details');
Route::view('/order-tracking', 'Admin.order-tracking');
Route::get('/add-product', [ProductController::class, 'create'])->name('products.add');


Route::get('/brands', [BrandController::class, 'index'])->name('brands.list');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.list');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.form');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact.submit');


Route::view('/', 'Website.index');
Route::view('/shop', 'Website.shop');
Route::view('/cart', 'Website.cart');
Route::view('/about', 'Website.about');
Route::view('/contact', 'Website.contact');
Route::view('/account-address-add', 'Website.account-address-add');
Route::view('/account-address', 'Website.account-address');
Route::view('/account-details', 'Website.account-details');
Route::view('/account-orders-details', 'Website.account-orders-details');
Route::view('/account-orders', 'Website.account-orders');
Route::view('/account-review', 'Website.account-review');
Route::view('/account-wishlist', 'Website.account-wishlist');
Route::view('/checkout', 'Website.checkout');
Route::view('/details', 'Website.details');
Route::view('/login', 'Website.login');
Route::view('/my-account', 'Website.my-account');
Route::view('/order-confirmation', 'Website.order-confirmation');
Route::view('/privacy-policy', 'Website.privacy-policy');
Route::view('/register', 'Website.register');
Route::view('/terms-conditions', 'Website.terms-conditions');
Route::view('/wishlist', 'Website.wishlist');  