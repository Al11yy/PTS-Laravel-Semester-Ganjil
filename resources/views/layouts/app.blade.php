<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=montserrat:400,500,600,700,800,900|open-sans:400,500,600&display=swap" rel=\"stylesheet\" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <!-- Changed to vertical sidebar layout with fixed sidebar and main content area -->
    <body class="font-sans antialiased bg-gradient-to-br from-gray-900 via-black to-gray-800 min-h-screen">
        <div class="flex min-h-screen">
            <!-- Sidebar Navigation -->
            @include('layouts.navigation')

            <!-- Main Content Area -->
            <div class="flex-1 ml-64">
                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-black/20 backdrop-blur-md border-b border-white/10 shadow-lg">
                        <div class="py-6 px-6">
                            <div class="text-white font-montserrat font-bold text-xl">
                                {{ $header }}
                            </div>
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="p-6">
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>
