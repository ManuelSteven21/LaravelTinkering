<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Films Management')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        html, body {
            height: 100%; /* Garantiza que el body ocupe el 100% de la altura */
            margin: 0; /* Elimina márgenes adicionales que pueden aparecer */
        }

        body {
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            max-width: 100%; /* Previene desbordamientos horizontales */
            overflow-x: hidden;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('assets/wallpaper.jpg') }}');">
<!-- Header -->
@include('partials.header')

<!-- Main Content -->
<main class="flex-grow bg-black bg-opacity-50 px-4 sm:px-6 lg:px-8">
    @yield('content')
</main>

<!-- Footer -->
@include('partials.footer')
</body>
</html>
