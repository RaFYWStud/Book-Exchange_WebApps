<?php
// routes/web.php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/search', [BookController::class, 'search'])->name('books.search');

Route::middleware('auth.custom')->group(function () {
    Route::get('/offer-book', function () {
        return view('OfferBook');
    })->name('offerbook');

    Route::post('/books', [BookController::class, 'store'])->name('books.store');

    Route::get('/your-offer', [BookController::class, 'yourOffer'])->name('youroffer');

    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

    Route::get('/books/{book}/offers', [BookController::class, 'viewOffers'])->name('books.offers');
    Route::post('/books/{book}/offer', [BookController::class, 'storeOffer'])->name('books.offer.store');
    Route::post('/books/{book}/offers/{offer}/accept', [BookController::class, 'acceptOffer'])->name('books.offers.accept');
    Route::post('/books/{book}/offers/{offer}/complete', [BookController::class, 'completeTransaction'])->name('books.offers.complete');

    Route::get('/all-offers', [BookController::class, 'viewAllOffers'])->name('alloffers');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register/submit', [AuthController::class, 'submitRegister'])->name('register.submit');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
