<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('buyer_product.index');
});

// マイページ
Route::get('/mypage', function () {
    return view('user.mypage');
})->name('mypage');

// お問い合わせページ
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
