<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BigScreen') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md bg-dark shadow-sm">
            <div class="container headerLogin">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/bigscreen_logo.png') }}" alt="logo BigScreen" width=300>
                </a>
                
            </div>
        </nav>

        <main class="py-4 bg-white">
            @yield('content')
        </main>
    </div>
</body>
</html>
