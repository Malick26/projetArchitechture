<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Product\Controllers\ProductController;

Route::get('/products/create', [ProductController::class, 'create'])->middleware('web')->name('products.create');
Route::post('/prudcts/store', [ProductController::class,'store'])->middleware('web')->name('products.store');
Route::get('/products', [ProductController::class,'index'])->middleware('web')->name('products.index');
Route::get('/products/{product}/edit', [ProductController::class,'edit'])->middleware('web')->name('products.edit');
Route::put('/products/{product}', [ProductController::class,'update'])->middleware('web')->name('products.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/supplier/{userId}/products', [ProductController::class, 'productBySupplier'])->middleware('web')->name('products.bySupplier');
Route::get('/cart-list', [ProductController::class, 'productCart']);
Route::post('add-to-cart', [ProductController::class, 'addToCart'])->name('add-movie-to-shopping-cart');
Route::delete('/delete-cart-item', [ProductController::class, 'deleteItem'])->name('delete.cart.item');


