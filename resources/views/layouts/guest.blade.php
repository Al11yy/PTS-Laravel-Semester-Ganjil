<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <!-- Updated fonts to Montserrat and Open Sans for modern glassy theme -->
        <link href="https://fonts.bunny.net/css?family=montserrat:400,500,600,700,800,900|open-sans:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <!-- Applied glassy dark theme with gradient background and backdrop blur -->
    <body class="font-sans antialiased bg-gradient-to-br from-gray-900 via-black to-gray-800 min-h-screen">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative">
            <!-- Added animated background elements for visual depth -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-40 -right-40 w-80 h-80 bg-silver-500/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-silver-400/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
            </div>
            
            <div class="relative z-10">
                <a href="/" class="group">
                    <!-- Modern logo design with glassy effect -->
                    <div class="w-20 h-20 bg-gradient-to-br from-silver-400 to-silver-600 rounded-3xl flex items-center justify-center shadow-2xl group-hover:shadow-silver-500/25 transition-all duration-300 transform group-hover:scale-105 backdrop-blur-sm border border-white/20">
                        <svg class="w-10 h-10 text-black" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                    </div>
                </a>
            </div>

            <!-- Glassy authentication form container with backdrop blur and modern styling -->
            <div class="w-full sm:max-w-md mt-8 px-8 py-8 bg-black/30 backdrop-blur-xl shadow-2xl overflow-hidden sm:rounded-3xl border border-white/10 relative z-10">
                <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent rounded-3xl"></div>
                <div class="relative">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
