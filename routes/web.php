<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/create/', [ProductController::class, 'create'])->name('products.create');
// Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
// Route::post('/products/', [ProductController::class, 'store'])->name('products.store');
// Route::put('/products/{pid}', [ProductController::class, 'update'])->name('products.update');
// Route::delete('/products/{pid}', [ProductController::class, 'delete'])->name('products.delete');

Route::resource('/products', ProductController::class);
Route::resource('/teachers', TeacherController::class);
