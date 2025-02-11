<x-layouts.layout-index title="Biblioteca | Agregar Libro">
    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-primary py-4 px-6">
                <h1 class="text-2xl font-bold text-black">Agregar Nuevo Libro</h1>
            </div>
            <form class="p-6 space-y-6" method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="title">Título</label>
                    <input class="w-full px-3 py-2 border rounded-md" id="title" name="title" type="text" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="isbn">ISBN</label>
                    <input class="w-full px-3 py-2 border rounded-md" minlength="13" maxlength="13" id="isbn" name="isbn" type="text" required>
                    @error('isbn')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="year_publication">Año de Publicación</label>
                    <input class="w-full px-3 py-2 border rounded-md" id="year_publication" minlength="4" maxlength="4" name="year_publication" type="number" required>
                    @error('year_publication')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="status">Estado</label>
                    <select class="w-full px-3 py-2 border rounded-md" id="status" name="status" required>
                        <option value="disponible">Disponible</option>
                        <option value="prestado">Prestado</option>
                        <option value="extraviado">Extraviado</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="author_id">Autor</label>
                    <select class="w-full px-3 py-2 border rounded-md" id="author_id" name="author_id" required>
                        <option value="">Seleccione un autor</option>
                        @foreach(\App\Models\Author::all() as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="ubication_id">Ubicación</label>
                    <select class="w-full px-3 py-2 border rounded-md" id="ubication_id" name="ubication_id" required>
                        <option value="">Seleccione una ubicación</option>
                        @foreach(\App\Models\Ubication::all() as $ubication)
                            <option value="{{ $ubication->id }}">{{ $ubication->address }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="cover">Portada</label>
                    <input class="w-full px-3 py-2 border rounded-md" id="cover" name="cover" type="file">
                </div>
                <div class="flex justify-end mt-6 gap-2">
                    <button class="px-6 py-2 bg-blue-500 text-white rounded-md" type="submit">Agregar Libro</button>
                    <a href="/" class="px-6 py-2 bg-gray-500 text-white rounded-md">Cancelar</a>
                </div>
            </form>
        </div>
    </main>
</x-layouts.layout-index>
