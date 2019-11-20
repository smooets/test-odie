<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>{{ @$title }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/2757d31103.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> -->
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div> -->
                @if (Request::segment(1) == 'filter')
                    <button type="button" class="close" onclick="window.location='{{ route("home") }}'" aria-label="Close" style="position: absolute; z-index: 1; padding-left: 4px;">
                        <span aria-hidden="true">&larr;</span>
                    </button>
                    <form class="form-inline col-12 pr-0 pl-5">
                        <input id="filter" class="form-control" style="width: 100%; border-radius: 50px;" type="search" placeholder="Search" aria-label="Search">
                    </form>
                @else
                    <span class="pl-2" style="position: absolute;"><i class="fa fa-heart-o" aria-hidden="true" ></i> </span>
                    <form class="form-inline col-12 pr-0 pl-5" onclick="window.location='{{ route("filter.index") }}'">
                        <input id="filter" class="form-control" style="width: 100%; border-radius: 50px;" type="search" placeholder="Search" aria-label="Search">
                    </form>
                @endif
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        @auth
        <nav class="navbar fixed-bottom navbar-expand-lg navbar-dark bg-dark">
            <!-- <ul class="navbar-nav list-inline mx-auto" style="flex-direction: row;">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Feed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
            </ul> -->
            <div class="col-3 pl-0 pr-0">
                <button class="btn btn-block text-white font-weight-bold pl-0 pr-0">Home</button>
            </div>
            <div class="col-3 pl-0 pr-0">
                <button class="btn btn-block text-white pl-0 pr-0">Feed</button>
            </div>
            <div class="col-3 pl-0 pr-0">
                <button class="btn btn-block text-white pl-0 pr-0">Cart</button>
            </div>
            <div class="col-3 pl-0 pr-0">
                <button class="btn btn-block text-white pl-0 pr-0">Profile</button>
            </div>
        </nav>
        @endauth
    </div>
</body>
@stack('modal')
@stack('scripts')

<script type="text/javascript">
$(document).ready(function(){
    $("#filter").keyup(function(){
        var filter = $(this).val();

        $(".product-list").each(function(){
            if ($(this).attr('product-name').search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
            } else {
                $(this).fadeIn();
            }
        });
    });
});

</script>
</html>
