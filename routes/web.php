<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\BorrowController;

Route::get('/', function () {
    return view('library.layouts.app');  // Adjust based on your actual layout location
});

Route::resource('books', BookController::class);
Route::resource('readers', ReaderController::class);
Route::resource('borrows', BorrowController::class);
