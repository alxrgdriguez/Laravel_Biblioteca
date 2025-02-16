<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UbicationController;
use Illuminate\Support\Facades\Route;

// Books Routes
Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books/delete/{book}', [BookController::class, 'destroy'])->name('books.destroy');
Route::get('/new-book', [BookController::class, 'create'])->name('books.new');
Route::post('/store-book', [BookController::class, 'store'])->name('books.store');
Route::get('/search', [BookController::class, 'search'])->name('books.search');
Route::get('/books/edit/{book}', [BookController::class, 'edit'])->name('books.edit');
Route::post('/books/update', [BookController::class, 'update'])->name('books.update');

// Authors Routes
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/delete/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');
Route::get('/new-author', [AuthorController::class, 'create'])->name('authors.new');
Route::post('/store-author', [AuthorController::class, 'store'])->name('authors.store');
Route::get('/authors/search', [AuthorController::class, 'search'])->name('authors.search');
Route::get('/authors/edit/{author}', [AuthorController::class, 'edit'])->name('authors.edit');
Route::post('/authors/update', [AuthorController::class, 'update'])->name('authors.update');


// Ubications Routes
Route::get('/ubications', [UbicationController::class, 'index'])->name('ubications.index');
Route::get('/new-ubication', [UbicationController::class, 'create'])->name('ubications.new');
Route::post('/store-ubication', [UbicationController::class, 'store'])->name('ubications.store');
Route::get('/ubications/edit/{ubication}', [UbicationController::class, 'edit'])->name('ubications.edit');
Route::post('/ubications/update', [UbicationController::class, 'update'])->name('ubications.update');
Route::get('/ubications/search', [UbicationController::class, 'search'])->name('ubications.search');
Route::get('/ubications/delete/{ubication}', [UbicationController::class, 'destroy'])->name('ubications.destroy');


