<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('clients.dashboard');
})->name('clients.dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('product-categories', ProductCategoryController::class);
    Route::resource('header-images', ProductCategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('product.product-images', ProductImageController::class);
});

Route::prefix('clients')->name('clients.')->group(function() {
    Route::prefix('products')->name('products.')->group(function() {
        Route::get('/', [App\Http\Controllers\Clients\Products\ProductController::class, 'index'])->name('index');
    });
});

require __DIR__.'/auth.php';
