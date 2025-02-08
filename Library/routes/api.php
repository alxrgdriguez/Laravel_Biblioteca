<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// localhost/api/user
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    // GET localhost/api/v1/libros
    Route::get('/libros', [BookController::class, 'api_index']);
    // GET localhost/api/v1/libros/{isbn}
    Route::get('/libros/{isbn}', [BookController::class, 'api_show']);
    // GET localhost/api/v1/autores
    Route::get('/autores', [AuthorController::class, 'api_index']);
    // GET localhost/api/v1/libros/autor/{author_id}
    Route::get('/libros/autor/{author_id}', [BookController::class, 'api_author']);
    // DELETE localhost/api/v1/libros/{isbn}
    Route::delete('/libros/{isbn}', [BookController::class, 'api_delete']);
    // POST localhost/api/v1/libros
    Route::post('/libros', [BookController::class, 'api_store']);

});
