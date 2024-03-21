<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('login');
})->name('login-page');

Route::get('/sign-up', function () {
    return view('sign_up');
})->name('sign-up');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/user-sign-up', [LoginController::class, 'signUp'])->name('user-sign-up');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/manage-products', [ProductController::class, 'list'])->name('products-list');
    Route::get('/view-product/{id}', [ProductController::class, 'view'])->name('products-view');
    Route::get('/add-product', [ProductController::class, 'add'])->name('products-add');
    Route::post('/create-product', [ProductController::class, 'create'])->name('products-create');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('products-edit');
    Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('products-update');
    Route::get('/delete-product/{id}', [ProductController::class, 'delete'])->name('products-delete');

    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
});