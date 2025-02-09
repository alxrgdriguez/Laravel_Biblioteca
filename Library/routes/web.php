<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Books Routes
Route::get('/', [BookController::class, 'api_index'])->name('books.index');
Route::get('/book/delete/{book}', [BookController::class, 'destroy'])->name('books.destroy');

// Authors Routes
Route::get('/authors', [AuthorController::class, 'api_index'])->name('authors.index');
Route::get('/authors/delete/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');



