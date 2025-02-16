<?php

namespace App\Http\Controllers;

use App\Models\Ubication;
use Illuminate\Http\Request;

class UbicationController extends Controller
{
    public function index(){

        $ubications = Ubication::paginate(12);
        return view('UbicationView', ['ubications' => $ubications]);
    }

    public function create(){
        return view('AddUbicationView');
    }

    public function store(Request $request){

      $request->validate([
          'library_name' => 'required|string|max:150',
          'address' => 'required|string|max:255',
          'num_shelves' => 'required|integer|min:1|max:999',
      ]);
      $ubication = new Ubication();
      $ubication->fill($request->all());
      $ubication->save();
      return redirect()->route('ubications.index')->with('success', 'Ubicación creada correctamente.');
    }

    public function edit(Ubication $ubication)
    {
        return view('EditUbicationView', ['ubication' => $ubication]);
    }

    public function update(Request $request){
        // Validar los datos antes de actualizar
        $request->validate([
            'library_name' => 'required|string|max:150',
            'address' => 'required|string|max:255',
            'num_shelves' => 'required|integer|min:1|max:999',
        ]);

        // Buscar el libro por ID
        $ubication = Ubication::findOrFail($request->id);

        // Actualizar los campos del libro
        $ubication->update([
            'library_name' => $request->library_name,
            'address' => $request->address,
            'num_shelves' => $request->num_shelves,
        ]);

        return redirect()->route('ubications.index')->with('success', 'Ubicación actualizada correctamente.');
    }

    public function search(Request $request){

        $library_name = is_null($request->library_name) ? '%%' : $request->library_name;
        $num_shelves = is_null($request->num_shelves) ? '%%' : $request->num_shelves;
        $ubications = Ubication::with('books')->where('library_name', 'like', "%".$library_name. "%")
        ->where('num_shelves', 'like', "%".$num_shelves. "%")
        ->paginate(12);
        return view('UbicationView', ['ubications' => $ubications, 'library_name' => $request->library_name, 'num_shelves' => $request->num_shelves]);
    }

    public function destroy(Ubication $ubication)
    {
        $ubication->delete();
        return back()->with('success', 'Ubicación eliminada correctamente.');
    }
}
