<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

// Display all products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Show form to create a new product
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Store a new product
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Display a specific product's details
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Show form to edit an existing product
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Update an existing product
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Delete a product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
