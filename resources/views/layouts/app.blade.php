<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') BrightF</title>

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
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                @guest
                @if (Route::has('register'))
                <a class="navbar-brand" href="{{ route('login') }}">
                    BrightF
                </a>
                @endif
                @else
                <a class="navbar-brand" href="{{ url('/home') }}">
                    BrightF
                </a>
                @endguest

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse links" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto nav-pills">

                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) === 'home' ? 'active text-white' : null }}" href="{{ url('home') }}">{{ __('Home') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) === 'about' ? 'active text-white' : null }}" href="{{ url('about') }}">{{ __('About') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) === 'contact' ? 'active text-white' : null }}" href="{{ url('contact') }}">{{ __('Contacts') }}</a>
                        </li>

                        <!-- Authentication Links -->
                        @guest

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) === 'login' ? 'active text-white' : null }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) === 'register' ? 'active text-white' : null }}" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                        </li>
                        @endif

                        @else
                        <li class="nav-item dropdown" id="list-tab" role="tablist">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="caret">My account</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('profile.show', auth()->user()->id)}}">{{ __('My profile') }}</a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> {{ __('Log out') }}
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

        <main role="main" class="py-4 flex-grow">
            <div class="container">
                @if(Session::has('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ Session::get('success') }}
                    <script>
                        setTimeout(function() {
                            $(".alert.alert-success").slideUp(1000);
                        }, 4000);
                    </script>
                </div>
                @endif

                @if(Session::has('error'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ Session::get('error') }}
                </div>
                @endif
            </div>

            @yield('content')
        </main>

        <!-- Footer -->

        <footer class="footer fixed-bottom mt-auto py-3 bg-dark font-small">
            <!-- Copyright -->
            <div class="container">
                <div class="footer-copyright text-center">© 2020 Copyright:
                    <a href="{{ url('/home') }}">BrightFuture.com</a>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>