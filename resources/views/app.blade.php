<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" href="../../favicon.ico">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!--JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>

    <div class="my-container">
        <header class="my-header clearfix">
            <div class="my-logo float-left">
                <img src="{{ asset('images/nav.png') }}" alt="Lapsas Māja" />
            </div>
            <nav>
                <ul class="nav nav-pills float-right">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Sakumlapa</a></li>
                    <li class="nav-item"><a class="nav-link" href="/products">Produkti</a></li>
                    <li><a class="nav-link" href="/cart">Grozs</a></li>
                    @guest
                    <li><a class="nav-link" href="{{ route('login') }}">Ieiet</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">Registracija</a></li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/orders">Pasutijumi</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Iziet
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </nav>
            <h3 class="text-muted">Lapsas Māja</h3>
        </header>
        <main>
            @yield('content')
        </main>

        <footer class="my-footer"><p>&copy; Ludmila 2018</p></footer>

    </div>

</html>
