<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    @section('head')
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/scrollanim.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/splash.css') }}" rel="stylesheet">

    {{--Jquery--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @show

</head>

<body>
    @extends('layouts.analytics')
    <!-- NAV BAR -->
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-activates="mobile-demo" class="right button-collapse hide-on-large-only"><i id="hamburger" class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="nav-item" href="{{ url('/') }}">HOME</a></li>
                    <li><a class="nav-item" href="{{ url('about') }}">ABOUT US</a></li>
                    <li><a class="nav-item" href="{{ url('team') }}">TEAM</a></li>
                    <li><a class="nav-item" href="{{ url('timeline') }}">TIMELINE</a></li>
                    @if (Auth::guest())
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Get Involved</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item dropdown" >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href={{ url('/home') }}>Dashboard</a>
                                </li>
                                <li>
                                    @if (Auth::user()->hasRole('student'))
                                        <a href={{ url('/student') }}>Profile</a>
                                    @elseif (Auth::user()->hasRole('faculty'))
                                        <a href={{ url('/faculty') }}>Lab Dashboard</a>
                                    @endif
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @section('contact')
                    <li><a class="nav-item contact-nav js-trigger" href="/#form">STAY IN TOUCH</a></li>
                    @show

                </ul>

                <ul class="left">
                    <img class="nav-logo" src="{{ asset('images/LOGO.svg') }}">
                </ul>

                <ul class="center hide-on-med-and-up">
                    <span class="nav-option grey-text text-lighten-3" style="letter-spacing: 2px">PERCH</span>
                </ul>

                <ul class="left">
                    <span class="nav-option hide-on-small-only grey-text text-lighten-3" style="letter-spacing: 2px">PERCH</span>
                </ul>

                <ul class="side-nav light-blue lighten-4" id="mobile-demo">
                    <li><a class="nav-item" href="{{ url('/') }}">HOME</a></li>
                    <li><a class="nav-item" href="{{ url('about') }}">ABOUT US</a></li>
                    <li><a class="nav-item" href="{{ url('team') }}">TEAM</a></li>
                    <li><a class="nav-item" href="{{ url('timeline') }}">TIMELINE</a></li>
                    @if (Auth::guest())
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Get Involved</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item dropdown" >
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href={{ url('/home') }}>Dashboard</a>
                                </li>
                                <li>
                                    @if (Auth::user()->hasRole('student'))
                                        <a href={{ url('/student') }}>Profile</a>
                                    @elseif (Auth::user()->hasRole('faculty'))
                                        <a href={{ url('/faculty') }}>Lab Dashboard</a>
                                    @endif
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @section('contact_mobile')
                        <li><a class="nav-item contact-nav js-trigger" href="/#form">STAY IN TOUCH</a></li>
                    @show
                </ul>
            </div>
        </nav>
    </div>
    <!-- NAV BAR END -->

    @yield('content')

    @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
    <script src="{{ asset('js/moveTo.js') }}"></script>
    <script src="{{ asset('js/scrollanim.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/typed.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>
    @show

</body>
</html>
