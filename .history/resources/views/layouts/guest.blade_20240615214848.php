<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Rota de Estágios') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/css/login-styles.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{ asset('assets/js/jquery.easing.1.3.js')}} "></script>
        <script src="{{ asset('assets/js/jquery.min.js')}} "></script>
        <script src="{{ asset('assets/js/jquery.easing.1.3.js')}} "></script>
        <!-- Bootstrap -->
        <script src="{{ asset('assets/js/bootstrap.min.js')}} "></script>
        <!-- Waypoints -->
        <script src="{{ asset('assets/js/jquery.waypoints.min.js')}} "></script>
        <!-- Stellar Parallax -->
        <script src="{{ asset('assets/js/jquery.stellar.min.js')}} "></script>
        <!-- Counters -->
        <script src="{{ asset('assets/js/jquery.countTo.js')}} "></script>
        <!-- Main JS (Do not remove) -->
        <script src="{{ asset('assets/js/main.js')}} "></script>
        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
