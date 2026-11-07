<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('buyer_product.index');
});

Route::get('/mypage', [App\Http\Controllers\UserController::class, 'Mypage'])->name('mypage');
// お問い合わせページ
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Auth::routes();

Route::get('account/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('account.edit');
Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');