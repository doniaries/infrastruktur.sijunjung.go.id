<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Infrastruktur TI - Dinas Kominfo Sijunjung">
    <meta name="keywords"
        content="Dinas Kominfo Sijunjung, infrastruktur TI,Data Infrastruktur TI, laporan gangguan, sistem informasi, laravel, filament, admin panel">
    <meta name="author" content="Admin Panel">
    <meta name="robots" content="index, follow">
    <meta name="google-site-verification" content="4K5Ik2HmVn7IBgAeytIkqUr-ScWT7BdxcZZ-bKCyfJQ" />

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/kabupaten-sijunjung.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Flowbite CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    {{-- Scripts --}}
    <script src="https://www.google.com/recaptcha/api.js"></script>
    {{-- Alpine.js sudah dimuat di app.blade.php utama --}}

    @filamentStyles
    @vite(['resources/css/app.css', 'resources/css/filament.css', 'resources/js/app.js'])


</head>

<body class="antialiased bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen" id="body-element">

    @include('partials.header')

    <main>
        {{ $slot }}
    </main>

    @include('partials.footer')

    @livewire('notifications')
    {{-- @livewire('database-notifications') --}}

    @filamentScripts
    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- Tidak perlu mengimpor app.js lagi karena sudah diimpor di bagian head --}}



    <!-- Navigation Buttons -->
    <!-- Back to Top Button -->
    <button id="back-to-top"
        class="fixed bottom-6 right-6 z-50 w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 opacity-0 pointer-events-none transform hover:scale-110 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800"
        aria-label="Back to top">
        <i class="fas fa-chevron-up text-lg"></i>
    </button>





    <!-- Impersonate Banner -->
    <x-impersonate::banner />
</body>

</html>
