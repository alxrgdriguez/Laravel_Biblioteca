@props(['title'])

    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="flex flex-col min-h-screen bg-gray-100">

<!-- Encabezado -->
<header class="bg-blue-800 text-white shadow-lg">
    <div class="container mx-auto max-w-screen-lg px-4 py-3">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="{{route('books.index')}}" class="text-2xl md:text-3xl font-bold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-10 md:w-10 mr-3" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                </svg>
                La Biblioteca de Alejandro
            </a>

            <!-- Menú de navegación -->
            <nav class="hidden md:flex">
                <ul class="flex space-x-4 md:space-x-6 text-lg">
                    <li><a href="{{route('books.index')}}" class="hover:text-blue-200 transition duration-300">Biblioteca</a></li>
                    <li><a href="{{route('authors.index')}}" class="hover:text-blue-200 transition duration-300">Autores</a></li>
                    <li><a href="{{route('ubications.index')}}" class="hover:text-blue-200 transition duration-300">Ubicaciones</a></li>
                </ul>
            </nav>

            <!-- Botón de menú en móviles -->
            <button id="menu-toggle" class="md:hidden text-white text-2xl">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Menú móvil -->
        <div id="mobile-menu" class="hidden md:hidden flex flex-col space-y-2 mt-3 text-lg">
            <a href="{{route('books.index')}}" class="block py-2 px-4 bg-blue-700 rounded">Biblioteca</a>
            <a href="{{route('authors.index')}}" class="block py-2 px-4 bg-blue-700 rounded">Autores</a>
            <a href="{{route('ubications.index')}}" class="block py-2 px-4 bg-blue-700 rounded">Ubicaciones</a>
        </div>
    </div>
</header>

<!-- Contenido principal -->
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Lista de Libros</h1>

    <!-- Grid de cards -->
        {{$slot}}

<!-- Pie de página -->
<footer class="bg-gray-800 text-white py-6 mt-8 text-center px-4">
    <p class="text-sm md:text-base">&copy; 2025 La Biblioteca de Alejandro. Todos los derechos reservados.</p>
</footer>

<!-- Script para menú móvil -->
<script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>

</body>
</html>
