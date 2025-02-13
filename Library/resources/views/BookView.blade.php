<x-layouts.layout-index title="Biblioteca | Libros">

    <main class="flex-grow container mx-auto px-4 py-8">
        <form action="{{route('books.search')}}" method="GET" class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 mt-8 mb-8">
            @csrf
            <div class="flex flex-wrap -mx-2">
                <div class="w-full md:w-1/3 px-2 mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                    <input type="text" id="title" name="title" placeholder="Buscar por título..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="w-full md:w-1/3 px-2 mb-4">
                    <label for="isbn" class="block text-sm font-medium text-gray-700 mb-1">ISBN</label>
                    <input type="text" id="isbn" name="isbn" placeholder="Buscar por ISBN..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="w-full md:w-1/3 px-2 mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                    <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        <option value="">Seleccionar estado</option>
                        <option value="disponible">Disponible</option>
                        <option value="prestado">Prestado</option>
                        <option value="extraviado">Extraviado</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Buscar
                </button>
            </div>
        </form>

    <div class="mb-6 flex justify-end">
        <a href="{{ route('books.new') }}" class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600">Añadir Libro</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($books as $book)
            <x-book-card
                     :book="$book"
                      />
        @endforeach

    </div>

    <div class="mt-6">
        <!-- Enlaces de paginación -->
        {{ $books->onEachSide(1)->links() }}
    </div>

    </main>
</x-layouts.layout-index>
