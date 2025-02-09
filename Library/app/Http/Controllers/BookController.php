<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookIdAuthorResource;
use App\Http\Resources\BookIsbnResource;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController
{
    public function api_index()
    {
        $books = Book::simplePaginate(8);
        return (\view('BookView', ['books' => $books]));
    }

    public function api_show(string $isbn)
    {
        return BookIsbnResource::make(Book::where('isbn', $isbn)->first());
    }

    public function api_author(int $author_id)
    {
        return BookIdAuthorResource::collection(Book::where('author_id' , $author_id)->get());
    }

    public function api_delete(string $isbn)
    {
        $book = Book::where('isbn', $isbn)->first();
        $book->delete();
        return response()->json(['message' => 'Libro eliminado correctamente'], 200);
    }

    public function api_store(Request $request){
        $book = new Book();
        $book->fill($request->all());
        $book->save();
        return response()->json(['message' => 'Libro creado correctamente'], 201);
    }
}
