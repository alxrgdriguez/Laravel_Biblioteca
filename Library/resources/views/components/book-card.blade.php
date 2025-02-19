@props(['book'])

@php
    $statusColors = [
        'disponible' => 'text-green-800 bg-green-100',
        'prestado' => 'text-yellow-800 bg-yellow-100',
        'extraviado' => 'text-red-800 bg-red-100'
    ];

    $statusColor = $statusColors[$book->status] ?? 'text-gray-600 bg-gray-100';
@endphp

<div class="bg-white rounded-lg shadow-md border border-gray-300 hover:shadow-2xl w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg mx-auto flex flex-col">
    <img src="{{ asset('storage/' . $book->cover) }}" alt="Portada del libro" class="w-full h-60 object-cover rounded-t-lg">
    <div class="p-5 flex flex-col flex-grow">
        <h2 class="font-bold text-xl mb-2 text-primary truncate">{{$book->title}}</h2>
        <p class="text-gray-700 text-base mb-2">Autor: <span class="font-semibold">{{$book->author->name}}</span></p>
        <p class="text-sm text-gray-600 mb-2">ISBN: <span class="font-semibold">{{$book->isbn}}</span></p>
        <p class="text-sm text-gray-600 mb-2">Año de Publicación: <span class="font-semibold">{{$book->year_publication}}</span></p>
        <p class="text-sm text-gray-600 mb-2">Estantería: <span class="font-semibold">{{$book->ubication->num_shelves}}</span></p>

        <div class="mt-auto">
            <div class="flex justify-between items-center">
                <span class="text-sm font-semibold px-3 py-1 rounded-full {{ $statusColor }}">{{$book->status}}</span>
            </div>

            <div class="flex justify-between items-center gap-2 mt-4">
                <button class="bg-green-500 hover:bg-green-800 text-white text-sm font-medium py-1 px-3 rounded">
                    <i class="fas fa-eye"></i> Detalles
                </button>
                <a href="{{route('books.edit', $book->id)}}" class="bg-blue-500 hover:bg-blue-800 text-white text-sm font-medium py-1 px-3 rounded">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a href="{{ route('books.destroy', $book->id) }}" class="bg-red-500 hover:bg-red-700 text-white text-sm font-medium py-1 px-3 rounded">
                    <i class="fas fa-trash"></i> Eliminar
                </a>
            </div>
        </div>
    </div>
</div>
