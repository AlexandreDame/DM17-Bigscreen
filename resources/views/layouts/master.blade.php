<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Big Screen</title>
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    @if(Request::is('administration/*'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 sidebar">
                <nav class="nav flex-column text-center">
                 <div class="text-center">
                  <img src="{{ asset('img/bigscreen_logo.png') }}" alt="logo BigScreen" width=300>
                 </div>
                  <a class="btn btn-primary mb-2" href="{{ url('administration/accueil') }}" role="button">Accueil</a>
                  <a class="btn btn-primary mb-2" href="{{ url('administration/questionnaire') }}">Questionnaire</a>
                  <a class="btn btn-primary mb-2" href="{{ url('administration/reponses') }}">Reponses</a>
                  <a class="btn btn-primary mb-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}</a>
                </nav>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <div class="col-md-8 content">
                @yield('content')
            </div>
        </div>
    </div>

    @else

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('img/bigscreen_logo.png') }}" alt="logo BigScreen" width=300>
            </div>
        </div>

        <div class="row row-content mt-4">
            <div class="col-md-12">
                @yield('content')
            </div>
        </div>
    </div>
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>