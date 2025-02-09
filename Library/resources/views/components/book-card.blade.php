@props(['title', 'isbn', 'cover', 'year_publication', 'status', 'author', 'ubication'])

@php
    $statusColors = [
        'disponible' => 'text-green-800 bg-green-100',
        'prestado' => 'text-yellow-800 bg-yellow-100',
        'extraviado' => 'text-red-800 bg-red-100'
    ];

    $statusColor = $statusColors[$status] ?? 'text-gray-600 bg-gray-100';
@endphp

<div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-300 hover:shadow-2xl">
    <img src="{{$cover}}" alt="Portada del libro" class="w-full h-56 object-cover">
    <div class="p-5">
        <h2 class="font-bold text-xl mb-2 text-primary truncate">{{$title}}</h2>
        <p class="text-gray-700 text-base mb-2">Autor: <span class="font-semibold">{{$author}}</span></p>
        <p class="text-sm text-gray-600 mb-2">ISBN: <span class="font-semibold">{{$isbn}}</span></p>
        <p class="text-sm text-gray-600 mb-2">Año de Publicación: <span class="font-semibold">{{$year_publication}}</span></p>
        <p class="text-sm text-gray-600 mb-2">Estantería: <span class="font-semibold">{{$ubication}}</span></p>
        <div class="flex justify-between items-center mb-4">
            <span class="text-sm font-semibold px-3 py-1 rounded-full {{ $statusColor }}">{{$status}}</span>        </div>
        <div class="flex justify-between gap-2">
            <button class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium py-1 px-3 rounded">
                <i class="fas fa-edit"></i> Editar
            </button>
            <button class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium py-2 px-4 rounded flex items-center gap-1">
                <i class="fas fa-eye"></i> Ver Libro
            </button>
            <button class="bg-red-500 hover:bg-red-700 text-white text-sm font-medium py-1 px-3 rounded">
                <i class="fas fa-trash"></i> Eliminar
            </button>
        </div>
    </div>
</div>
