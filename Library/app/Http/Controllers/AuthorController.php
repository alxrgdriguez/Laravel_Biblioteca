<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController
{
    public function api_index()
    {
        $authors = Author::simplePaginate(12);
        return (\view('AuthorView', ['authors' => $authors]));
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Autor eliminado correctamente.');
    }

}
