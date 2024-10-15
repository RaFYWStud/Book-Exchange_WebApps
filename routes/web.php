<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/OfferBook', function () {
    return view('OfferBook');
});

Route::post('/books', [BookController::class, 'store'])->name('books.store');