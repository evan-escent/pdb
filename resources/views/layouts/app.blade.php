<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/home">
                    <i class="fas fa-hat-wizard fa-2x"></i>
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <button type="button" id="sidebarCollapse" class="btn btn-dark">
                            <i class="fas fa-bars"></i>
                        </button>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i>
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <p class="account-card-text">
                                        {{auth::user()->name}}
                                    </p>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-address-card"></i>
                                        Account
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content Container -->
        <div class="content-container">
            <!-- Sidebar -->
            @auth
                <nav id="sidebar">
                    <div class="sidebar-header">
                        <h3>Sidebar Header</h3>
                    </div>

                    <ul class="navbar-nav">
                        <p>Dummy</p>
                        <li>
                            <a href="#todoSub" data-toggle="collapse" class="dropdown-toggle"><i class="fas fa-clipboard-list fa-lg"></i> Todo</a>
                            <ul class="collapse list-unstyled" id="todoSub">
                                <li>
                                    <a href="/todos" class="sub-item"><i class="fas fa-list fa-lg"></i> Current</a>
                                </li>
                                <li>
                                    <a href="/todos_finsh" class="sub-item"><i class="fas fa-check fa-lg"></i> Complete</a>
                                </li>
                            </ul>                    
                        </li>
                        <li>
                            <a href="/notes"><i class="fas fa-sticky-note fa-lg"></i> Note</a>
                        </li>
                    </ul>
                </nav>
            @endauth

            <main class="main-content">
                @yield('content')
            </main>
        </div>

        <footer class="page-footer">
            <div class="container">
                <form></form>
                <a href="#">Eng</a>
                <a href="#">中文</a>
            </div>
        </footer>
    </div>
</body>
</html>
