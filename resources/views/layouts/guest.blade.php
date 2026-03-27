<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-poppins text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-cyan-50 to-blue-50 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-96 h-96 bg-cyan-400 rounded-full filter blur-3xl"></div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-cyan-300 rounded-full filter blur-3xl"></div>
            </div>

            <div class="relative z-10">
                <div class="flex flex-col items-center group">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-cyan-500 to-cyan-600 rounded-full mb-4 shadow-lg transform transition-all duration-300 group-hover:scale-110">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800 tracking-wide text-center bg-clip-text text-transparent bg-gradient-to-r from-cyan-600 to-cyan-700">
                        LOGIN ADMIN
                    </h1>
                    <p class="text-sm text-gray-600 mt-2 text-center">Masuk ke dashboard sistem</p>
                </div>
            </div>

            <div class="w-full sm:max-w-md mt-8 px-6 py-8 bg-white/90 backdrop-blur-sm shadow-2xl overflow-hidden sm:rounded-2xl border border-white/20 relative z-10">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <div class="relative z-10 mt-8 text-center">
                <p class="text-xs text-gray-600">
                    &copy; 2026 Savare'4 Solution
                </p>
            </div>
        </div>
    </body>
</html>
