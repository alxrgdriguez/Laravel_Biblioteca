<x-layouts.layout-index title="Biblioteca | Libros">

    <main class="flex-grow container mx-auto px-4 py-8">
        <form action="#" method="GET" class="flex items-center rounded-lg shadow-sm px-3 py-2 mt-8 mb-8 w-full">
            <input type="text" name="search" placeholder="Buscar..." class="px-3 py-2 outline-none w-64 text-gray-700">
            <button type="submit" class="ml-2 text-primary hover:text-blue-600">
                <i class="fas fa-search"></i>
            </button>
        </form>
    <div class="mb-6 flex justify-end">
        <button class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600">Añadir Libro</button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($books as $book)
            <x-book-card :title="$book->title"
                         :isbn="$book->isbn"
                         :cover="$book->cover"
                         :year_publication="$book->year_publication"
                         :status="$book->status"
                         :author="$book->author->name"
                         :ubication="$book->ubication->num_shelves" />
        @endforeach
    </div>

</x-layouts.layout-index>
