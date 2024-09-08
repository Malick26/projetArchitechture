<?php
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

use App\Modules\Users\Controllers\UserController;


Route::get('/users', [UserController::class,'index'])->middleware('web')->name('users.index');
Route::get('/users/create', [UserController::class,'create'])->middleware('web')->name('users.create');
Route::post('/users/store', [UserController::class,'store'])->middleware('web')->name('users.store');
Route::get('/users/{user}/edit', [UserController::class,'edit'])->middleware('web')->name('users.edit');
Route::put('/users/{user}', [UserController::class,'update'])->middleware('web')->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/supplier', [UserController::class,'getSuppplier'])->middleware('web')->name('users.supplier');



