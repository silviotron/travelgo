<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @session('message')
                <div id="alertMessage" class="bg-green-600 rounded absolute top-4 right-4 p-2">
                    <div class="flex justify-between items-center">
                        <span>{{ session('message') }}</span>
                        <button id="closeButton" class="text-white hover:text-gray-300">
                            ✖
                        </button>
                    </div>
                </div>
                @endsession
                {{ $slot }}
            </main>
        </div>
    </body>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var alertMessage = document.getElementById('alertMessage');
            var closeButton = document.getElementById('closeButton');
    
            // Función para cerrar el mensaje
            function closeMessage() {
                alertMessage.classList.add('hidden');
            }
    
            // Cerrar mensaje al hacer clic en el botón de cerrar
            closeButton.addEventListener('click', function () {
                closeMessage();
            });
    
            // Cerrar automáticamente después de 5 segundos
            setTimeout(function () {
                closeMessage();
            }, 5000);
        });
    </script>
</html>
