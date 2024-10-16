<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/offer-book', function () {
    return view('OfferBook');
})->name('offerbook');

Route::get('/', [BookController::class, 'index'])->name('home');

Route::post('/books', [BookController::class, 'store'])->name('books.store');
