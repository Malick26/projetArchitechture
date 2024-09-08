<?php
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

use App\Modules\Order\Controllers\OrderController;
use App\Modules\Order\Controllers\OrderAdminController;


Route::get('/orders/create', [OrderController::class,'create'])->middleware('web')->name('orders.create');
Route::post('/orders/store', [OrderController::class, 'store'])->middleware('web')->name('orders.store');
Route::get('/my-orders', [App\Modules\Order\Controllers\OrderController::class, 'myOrders'])->middleware('web')->name('myorders');
Route::get('/orders/{id}/download-pdf', [OrderController::class, 'downloadPdf'])->name('orders.downloadPdf');
// Route pour assigner un fournisseur à une commande
Route::post('/orders/{id}/assign-supplier', [OrderController::class, 'assignSupplier'])
    ->name('orders.assignSupplier');
    // Route::get('/admin/notifications', [App\Http\Controllers\AdminController::class, 'notifications'])->name('admin.notifications');
    // Route::get('/admin/notifications', [OrderAdminController::class, 'notifications'])->name('admin.notifications');
 //   Route::get('/admin/notifications', [OrderAdminController::class, 'notifications'])->name('admin.notifications');

   Route::get('/admin/notifications', [OrderAdminController::class, 'notifications'])->name('admin.notifications');
    Route::get('/orders/notifications', [OrderAdminController::class, 'index'])->name('orders.notifications');
    Route::post('/orders/OrderAdminController/{id}/markAsRead', [OrderAdminController::class, 'markAsRead'])->name('orders.markAsRead');
