<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIEJ</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-image: url('url_de_tu_imagen.jpg'); /* Cambia 'url_de_tu_imagen.jpg' por la URL de tu imagen */
            background-size: cover; /* Ajusta el tamaño de la imagen para cubrir todo el fondo */
            background-position: center center; /* Centra la imagen en el fondo */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        /* ... (resto del código) ... */

        @media (max-width: 640px) {
            /* Ajustes específicos para pantallas pequeñas */
            body {
                background-size: contain; /* Ajusta el tamaño de la imagen para que quepa completamente en pantallas pequeñas */
            }
            h1 {
                text-align: center; /* Alinea el texto al centro en pantallas pequeñas */
                font-size: 3xl; /* Tamaño de fuente para pantallas pequeñas */
            }
        }
    </style>
</head>
<body class="antialiased">

    @if (Route::has('login'))
        <div class="hidden fixed top-0 center px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class=" text-gray-700 dark:text-gray-500 underline">Iniciar Sesion</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-gray-700 dark:text-gray-500 underline">Registrarse</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="text-center">
        <div class="pt-8">
            <h1 class="m-0 text-dark text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl">SISTEMA DE INFORMACION DE EXPEDIENTES JUDICIALES</h1>
        </div>
    </div>

</body>
</html>
