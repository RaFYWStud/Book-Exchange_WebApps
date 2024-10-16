<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
})->name('home');

Route::get('/OfferBook', function () {
    return view('OfferBook');
})->name('offerbook');

Route::post('/books', [BookController::class, 'store'])->name('books.store');