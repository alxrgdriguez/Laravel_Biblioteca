<x-layouts.layout-index title="Biblioteca | Editar Autor">
    <main class="flex-grow container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-primary py-4 px-6">
                <h1 class="text-2xl font-bold text-black">Editar Autor</h1>
            </div>
            <form class="p-6 space-y-6" method="POST" action="{{route("authors.update")}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $author->id }}">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="name">Nombre Completo</label>
                    <input class="w-full px-3 py-2 border rounded-md" value="{{ $author->name }}" id="name" name="name" type="text" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="nationality">Nacionalidad</label>
                    <input class="w-full px-3 py-2 border rounded-md" value="{{ $author->nationality }}" id="nationality" name="nationality" type="text" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="date_of_birth">Fecha Nacimiento</label>
                    <input class="w-full px-3 py-2 border rounded-md " value="{{ $author->date_of_birth }}" id="date_of_birth"  name="date_of_birth" type="date" required>
                    @error('date_of_birth')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="dewey_code">Código Autor</label>
                    <input class="w-full px-3 py-2 border rounded-md" value="{{ $author->dewey_code }}" min="100" max="999" id="dewey_code" name="dewey_code" type="number" required>
                    @error('dewey_code')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2" for="biography">Biografía</label>
                    <textarea
                        class="w-full px-3 py-2 border rounded-md"
                        id="biography"
                        rows="5"
                        cols="2"
                        name="biography"
                        required>{{ old('biography', $author->biography) }}</textarea>
                </div>
                <div class="flex justify-end mt-6 gap-2">
                    <button class="px-6 py-2 bg-blue-500 text-white rounded-md" type="submit">Editar Autor</button>
                    <a href="{{route('authors.index')}}" class="px-6 py-2 bg-gray-500 text-white rounded-md">Cancelar</a>
                </div>
            </form>
        </div>
    </main>
</x-layouts.layout-index>
