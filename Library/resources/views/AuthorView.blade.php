<x-layouts.layout-index title="Biblioteca | Autores">
    <main class="flex-grow container mx-auto px-4 py-8">
        <form action="#" method="GET" class="flex items-center rounded-lg shadow-sm px-3 py-2 mt-8 mb-8 w-full">
            <input type="text" name="search" placeholder="Buscar por nombre..." class="px-3 py-2 outline-none w-64 text-gray-700">
            <button type="submit" class="ml-2 text-primary hover:text-blue-600">
                <i class="fas fa-search"></i>
            </button>
        </form>

        <div class="mb-6 flex justify-end">
            <button class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600">Añadir Autor</button>
        </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-300 hover:shadow-2xl p-5">
        <h2 class="text-2xl font-bold text-primary mb-4 text-center">Lista de Autores</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-6 text-left text-gray-700 font-bold">#</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-bold">Nombre</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-bold">Nacionalidad</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-bold">F.Nacimiento</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-bold">Libros</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-bold text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($authors as $author)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $author->id }}</td>
                        <td class="py-3 px-6">{{ $author->name }}</td>
                        <td class="py-3 px-6">{{ $author->nationality }}</td>
                        <td class="py-3 px-6">{{ $author->date_of_birth }}</td>
                        <td class="py-3 px-6">{{ $author->books->count() }}</td>
                        <td class="py-3 px-6 flex justify-center gap-2">
                            <a href="{{ route('authors.destroy', $author->id) }}" class="bg-red-500 hover:bg-red-700 text-white text-sm font-medium py-1 px-3 rounded">
                                <i class="fas fa-trash"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            <!-- Enlaces de paginación -->
            {{ $authors->onEachSide(1)->links() }}
        </div>
    </div>
        </main>
</x-layouts.layout-index>
