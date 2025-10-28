<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/process', [OrderController::class, 'processCheckout'])->name('checkout.process');

Route::get('/track-order', [TrackingController::class, 'index'])->name('tracking.index');
Route::post('/track-order', [TrackingController::class, 'track'])->name('tracking.search');

Route::get('/logo_mie_jawara.jpeg', function () {
    return response()->file(public_path('logo_mie_jawara.jpeg'));
});

Route::get('/invoice/{orderId}/download', [OrderController::class, 'downloadInvoice'])->name('invoice.download');
Route::get('/invoice/{orderId}', [OrderController::class, 'viewInvoice'])->name('invoice.view');

// Public product routes
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

Route::post('/order', [OrderController::class, 'store'])->name('order.store');


// Admin routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    Route::resource('admin/produk', AdminProdukController::class)->except(['show'])->names([
        'index' => 'admin.produk.index',
        'create' => 'admin.produk.create',
        'store' => 'admin.produk.store',
        'edit' => 'admin.produk.edit',
        'update' => 'admin.produk.update',
        'destroy' => 'admin.produk.destroy',
    ]);
    
    Route::get('admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::put('admin/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::put('admin/orders/{id}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
    Route::get('admin/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

});

require __DIR__.'/auth.php';
