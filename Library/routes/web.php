<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'api_index'])->name('books.index');
Route::get('/authors', [AuthorController::class, 'api_index'])->name('authors.index');
