<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookIdAuthorResource;
use App\Http\Resources\BookIsbnResource;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController
{

    // RESPONSES API
    public function api_index()
    {
        return BookResource::collection(Book::paginate(8));
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

    // RESPONSES WEB

    public function index(){
        $books = Book::paginate(8);
        return (\view('BookView', ['books' => $books]));
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Libro eliminado correctamente.');
    }

    public function create(){
        return \view('AddBookView');
    }

    public function store(Request $request){

        if (Book::where('isbn', $request->isbn)->exists()) {
            return back()->withErrors(['isbn' => 'El ISBN ya está en uso.']);
        }

        if ($request->year_publication < 1920 || $request->year_publication > date('Y')) {
            return back()->withErrors(['year_publication' => 'El año de publicación debe ser mayor a 1900 y menor del actual.']);
        }

        // Validar que se suba la imagen antes de guardar


        // Validar todos los campos, incluyendo la imagen
        $request->validate([
            'title' => 'required|string|max:255',
            'isbn' => 'required|string|max:13|unique:books,isbn',
            'year_publication' => 'required|integer|min:1920|max:' . date('Y'),
            'status' => 'required|string|in:disponible,prestado,extraviado',
            'author_id' => 'required|exists:authors,id',
            'ubication_id' => 'required|exists:ubications,id',
            'cover' => '|image|max:2048', // Asegura que sea imagen y máximo 2MB
        ]);

        // Crear el libro
        $book = new Book();
        $book->fill($request->all());

        // Guardar la imagen si se subió
        if ($request->hasFile('cover')) {
            $book->cover = $request->file('cover')->store('covers', 'public');
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Libro creado correctamente.');
    }

    public function search(Request $request)
    {

        $status = is_null($request->status) ? '%%' : $request->status;
        $books = Book::with('author')->where('title', 'like', "%".$request->title. "%")
        ->where('isbn', 'like', "%".$request->isbn. "%")
        ->where('status', 'like', $status)->paginate(8);

        return view('BookView', ['books' => $books, 'status' => $request->status, 'title' => $request->title, 'isbn' => $request->isbn]);

    }

    public function edit(Book $book)
    {
        return view('EditBookView', ['book' => $book]);
    }

    public function update(Request $request)
    {
        // Buscar el libro por ID
        $book = Book::findOrFail($request->id);

        // Actualizar los campos del libro
        $book->update([
            'title' => $request->title,
            'isbn' => $request->isbn,
            'year_publication' => $request->year_publication,
            'status' => $request->status,
            'author_id' => $request->author_id,
            'ubication_id' => $request->ubication_id,
        ]);

        // Si el usuario subió una nueva portada, actualizarla
        if ($request->hasFile('cover')) {
            // Eliminar la portada anterior si existe
            if ($book->cover) {
                Storage::delete($book->cover);
            }

            // Guardar la nueva portada y actualizar el registro
            $path = $request->file('cover')->store('covers', 'public');
            $book->update(['cover' => $path]);
        }

        return redirect()->route('books.index')->with('success', 'Libro actualizado correctamente.');
    }

}
