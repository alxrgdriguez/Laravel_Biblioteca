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

<style>

</style>

<body class="flex flex-col min-h-screen bg-gray-100">
<!-- Encabezado -->
<header class="bg-blue-800 text-white shadow-lg">
    <div class="container mx-auto px-4 py-3">
        <div class="flex justify-between items-center">
            <a href="/" class="text-3xl font-bold flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-3" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                </svg>
                Laravel Library
            </a>

            <nav>
                <ul class="flex space-x-6 text-lg">
                    <li><a href="/" class="hover:text-blue-200 transition duration-300">Biblioteca</a></li>
                    <li><a href="/authors" class="hover:text-blue-200 transition duration-300">Autores</a></li>
                    <li><a href="#" class="hover:text-blue-200 transition duration-300">Ubicaciones</a></li>
                    <li><a href="#" class="hover:text-blue-200 transition duration-300">Reportar</a></li>
                </ul>
            </nav>

        </div>
    </div>
</header>


<!-- Contenido principal -->
<main class="flex-grow container mx-auto px-4 py-8">
    {{$slot}}
</main>

<!-- Pie de página -->
<footer class="bg-gray-800 text-white py-8 mt-8">
    <div class="border-gray-700 mt-2 pt-2 text-center font-bold">
        <p>&copy; 2025 Laravel Library. Todos los derechos reservados.</p>
    </div>
</footer>
</body>
</html>
