@props(['name' => null, 'nationality' => null])
<x-layouts.layout-index title="Biblioteca | Autores">
    <main class="flex-grow container mx-auto px-4 py-8">
        <form action="{{route('authors.search')}}" method="GET" class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 mt-8 mb-8">
            @csrf
            <div class="flex flex-wrap items-center mx-2">
                <div class="w-full md:w-1/3 px-2 mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Buscar por nombre..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="w-full md:w-1/3 px-2 mb-4">
                    <label for="isbn" class="block text-sm font-medium text-gray-700 mb-1">Nacionalidad</label>
                    <input type="text" id="nationality" name="nationality" placeholder="Buscar por nacionalidad..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex justify-end mt-2">
                    <button type="submit" class="h-fit px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Buscar
                    </button>
                </div>
            </div>
        </form>

        <div class="mb-6 flex justify-end">
            <a href="{{ route('authors.new') }}" class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600">Añadir Autor</a>
        </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-300 hover:shadow-2xl p-5">
        <h2 class="text-2xl font-bold text-primary mb-4 text-center">Lista de Autores</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-6 text-left text-gray-700 font-bold">Nombre</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-bold">Nacionalidad</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-bold">F.Nacimiento</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-bold">Código Autor</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-bold">Libros</th>
                    <th class="py-3 px-6 text-left text-gray-700 font-bold text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($authors as $author)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $author->name }}</td>
                        <td class="py-3 px-6">{{ $author->nationality }}</td>
                        <td class="py-3 px-6">{{ $author->date_of_birth }}</td>
                        <td class="py-3 px-6">{{ $author->dewey_code }}</td>
                        <td class="py-3 px-6">{{ $author->books->count() }}</td>
                        <td class="py-3 px-6 flex justify-center gap-2">
                            <a href="{{ route('authors.edit', $author->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium py-1 px-3 rounded">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="{{ route('authors.destroy', $author->id) }}" class="bg-red-500 hover:bg-red-700 text-white text-sm font-medium py-1 px-3 rounded">
                                <i class="fas fa-trash"></i> Eliminar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6 flex justify-between">
            <!-- Enlaces de paginación -->
            <a
                class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600 {{$authors->previousPageUrl() ? "": "pointer-events-none bg-gray-500"}}"
                @if(is_null($name) &&  is_null($nationality))
                    href="{{ $authors->previousPageUrl() }}"
                @else
                    href="{{$authors->previousPageUrl()}}?name={{$name}}&nationality={{$nationality}}"
                @endif
            >
                Anterior
            </a>

            <a
                class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600 {{$authors->nextPageUrl() ? "": "pointer-events-none bg-gray-500"}}"
                @if(is_null($name) && is_null($nationality))
                    href="{{ $authors->nextPageUrl() }}"
                @else
                    href="{{$authors->nextPageUrl()}}?name={{$name}}&nationality={{$nationality}}"
                @endif
            >
                Siguiente
            </a>
        </div>
    </div>
        </main>
</x-layouts.layout-index>
