@props(['library_name' => null, 'address' => null, 'num_shelves' => null])
<x-layouts.layout-index title="Biblioteca | Ubicaciones">
    <main class="flex-grow container mx-auto px-4 py-8">
        <form action="{{route('ubications.search')}}" method="GET" class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 mt-8 mb-8">
            @csrf
            <div class="flex flex-wrap items-center mx-2">
                <div class="w-full px-2 mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Nombre Biblioteca</label>
                    <input type="text" id="library_name" name="library_name" placeholder="Buscar por nombre..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="w-full px-2 mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Nº Estatería</label>
                    <input type="text" id="num_shelves" name="num_shelves" placeholder="Buscar por nº estatería..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="flex justify-center mt-2 w-full">
                    <button type="submit" class=" w-full px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Buscar
                    </button>
                </div>
            </div>
        </form>
        <div class="mb-6 flex justify-end">
            <a href="{{route('ubications.new')}}" class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600">Añadir Ubicación</a>
        </div>
        <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-300 hover:shadow-2xl p-5">
            <h2 class="text-2xl font-bold text-primary mb-4 text-center">Lista de Ubicaciones</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="py-3 px-6 text-left text-gray-700 font-bold">Biblioteca</th>
                        <th class="py-3 px-6 text-left text-gray-700 font-bold">Dirección</th>
                        <th class="py-3 px-6 text-left text-gray-700 font-bold">Nº Estatería</th>
                        <th class="py-3 px-6 text-left text-gray-700 font-bold text-center">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ubications as $ubication)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $ubication->library_name }}</td>
                            <td class="py-3 px-6">{{ $ubication->address }}</td>
                            <td class="py-3 px-6">{{ $ubication->num_shelves }}</td>
                            <td class="py-3 px-6 flex justify-center gap-2">
                                <a href="{{route('ubications.edit', $ubication->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-medium py-1 px-3 rounded">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <a href="{{route('ubications.destroy', $ubication->id)}}" class="bg-red-500 hover:bg-red-700 text-white text-sm font-medium py-1 px-3 rounded">
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
                    class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600 {{$ubications->previousPageUrl() ? "": "pointer-events-none bg-gray-500"}}"
                    @if(is_null($library_name) &&  is_null($address) && is_null($num_shelves))
                        href="{{ $ubications->previousPageUrl() }}"
                    @else
                        href="{{$ubications->previousPageUrl()}}?library_name={{$library_name}}&address={{$address}}&num_shelves={{$num_shelves}}"
                    @endif
                >
                    Anterior
                </a>

                <a
                    class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-600 {{$ubications->nextPageUrl() ? "": "pointer-events-none bg-gray-500"}}"
                    @if(is_null($library_name) && is_null($address) && is_null($num_shelves))
                        href="{{ $ubications->nextPageUrl() }}"
                    @else
                        href="{{$ubications->nextPageUrl()}}?library_name={{$library_name}}&address={{$address}}&num_shelves={{$num_shelves}}"
                    @endif
                >
                    Siguiente
                </a>
            </div>
        </div>
    </main>
</x-layouts.layout-index>
