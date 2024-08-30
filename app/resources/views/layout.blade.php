<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'game impression room') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-mb navbar-light bg-success shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    GAME IMPRESSION ROOM
                </a>
            </div>
            <div class="my-navbar-control">
    @if(Auth::check())
      <a class="my-navbar-item" href="{{ route('my.page') }}">{{ Auth::user()->name }}</a>
      /
      <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>
        <script>
           document.getElementById('logout').addEventListener('click', function(event) {
           event.preventDefault();
           document.getElementById('logout-form').submit();
           });
        </script>
        @else
            <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
            /
            <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
        @endif
           </div>
        </nav> 
        @yield('content')
    </div>
</body>
</html>