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

    public function create(){
        return \view('AddAuthorView');
    }

    public function store(Request $request)
    {

        if (Author::where('dewey_code', $request->dewey_code)->exists()) {
            return back()->withErrors(['dewey_code' => 'El código ya está en uso.']);
        }

        if ($request->date_of_birth > today()) {
            return back()->withErrors(['date_of_birth' => 'La fecha no puede ser mayor a la actual.']);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before_or_equal:now',
            'biography' => 'required|string|max:255',
            'dewey_code' => 'required|string|max:255|unique:authors,dewey_code',
        ]);


        $author = new Author();
        $author->fill($request->all());
        $author->save();
        return redirect()->route('authors.index')->with('success', 'Autor creado correctamente.');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Autor eliminado correctamente.');
    }


}
