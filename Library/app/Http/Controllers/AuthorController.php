<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController
{

    // RESPONSES API
    public function api_index()
    {
        return AuthorResource::collection(Author::paginate(6));
    }


    // RESPONSES WEB

    public function index(){

        $authors = Author::simplePaginate(12);
        return (\view('AuthorView', ['authors' => $authors]));

    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Autor eliminado correctamente.');
    }


}
