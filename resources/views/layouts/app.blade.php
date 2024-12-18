<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Your application description here">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>


</head>

<body class="font-sans antialiased">
    <div x-data="{ loading: false }" x-show="loading" x-transition:enter="transition ease-out duration-500"
        x-transition:leave="transition ease-out duration-1000"
        class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-75 z-50"
        @click="loading = true; setTimeout(() => loading = false, 1000)">
        <!-- Loading Spinner -->
        <div class="text-white text-xl">
            <div class="loader border-t-4 border-b-4 border-white w-16 h-16 rounded-full animate-spin"></div>
            <p class="mt-4">Loading...</p>
        </div>
    </div>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
        @include('layouts.sidenav') <!-- Side Navigation -->

        <div class="px-4 flex-1 flex flex-col">
            @include('layouts.navigation') <!-- Top Navigation -->

            <!-- Page Heading -->
            <div class="flex-1 p-6 overflow-y-auto">
                @isset($header)
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main>
                    <div class="container-fluid">
                        <div class="column">

                            <!-- Main Content -->
                            <div class="col-md-9 col-lg-10 ms-sm-auto px-md-4 py-4">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </main>

                <!-- Footer -->
                <footer class="bg-gray-200 dark:bg-gray-800 py-4">
                    <div class="max-w-7xl mx-auto text-center text-sm text-gray-600 dark:text-gray-400">
                        © {{ now()->year }} {{ 'HRStreameline' }}. All rights reserved.
                    </div>
                </footer>
            </div>
</body>

</html>
