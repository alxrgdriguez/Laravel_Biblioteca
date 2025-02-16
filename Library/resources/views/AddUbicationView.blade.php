<x-layouts.layout-index title="Biblioteca | Agregar Ubicación">s
    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-primary py-4 px-6">
                <h1 class="text-2xl font-bold text-black">Agregar Nueva Ubicación</h1>
            </div>
            <form class="p-6 space-y-6" method="POST" action="{{route('ubications.store')}}" enctype="multipart/form-data">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="library_name">Nombre Biblioteca</label>
                    <input class="w-full px-3 py-2 border rounded-md" id="library_name" name="library_name" type="text" required>
                    @error('library_name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="address">Dirección</label>
                    <input class="w-full px-3 py-2 border rounded-md" id="address" name="address" type="text" required>
                    @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="num_shelves">Nº Estatería</label>
                    <input class="w-full px-3 py-2 border rounded-md " id="num_shelves" min="1" max="999"  name="num_shelves" type="number" required>
                    @error('num_shelves')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end mt-6 gap-2">
                    <button class="px-6 py-2 bg-blue-500 text-white rounded-md" type="submit">Agregar Ubicación</button>
                    <a href="{{route('ubications.index')}}" class="px-6 py-2 bg-gray-500 text-white rounded-md">Cancelar</a>
                </div>
            </form>
        </div>
    </main>
</x-layouts.layout-index>
