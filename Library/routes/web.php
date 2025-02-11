<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Books Routes
Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books/delete/{book}', [BookController::class, 'destroy'])->name('books.destroy');
Route::get('/new-book', [BookController::class, 'new'])->name('books.new');
Route::post('/store-book', [BookController::class, 'store'])->name('books.store');

// Authors Routes
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/delete/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');



