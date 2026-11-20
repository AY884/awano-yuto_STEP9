<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/index', [ProductController::class, 'index'])->name('index');

Route::get('/', [ProductController::class, 'index'])->name('products.index');

Route::get('/mypage', [App\Http\Controllers\UserController::class, 'Mypage'])->name('mypage');
// お問い合わせページ
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Auth::routes();

Route::get('account/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('account.edit');
Auth::routes();

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{id}', [ProductController::class, 'detail'])->name('products.detail');

Route::get('/myproducts/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');

Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');