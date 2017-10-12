<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - About Us</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/splash.css') }}" rel="stylesheet">

    {{--Jquery--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
    @extends('layouts.analytics')
    <!-- NAV BAR -->
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-activates="mobile-demo" class="right button-collapse show-on-large"><i id="hamburger" class="material-icons">menu</i></a>
                <a href="{{ url('/') }}">
                    <ul class="left">
                        <img class="nav-logo" src="{{ asset('images/LOGO.svg') }}">
                    </ul>
                </a>
                <ul class="center">
                    <span class="nav-option hide-on-small-only">The Team</span>
                    <!-- <span class="show-">The Team</span> -->
                </ul>
                <!-- <ul class="right"><li>Sign Up</li></ul> -->
                <ul class="side-nav light-blue lighten-4" id="mobile-demo">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
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
                </ul>
            </div>
        </nav>
    </div>
    <!-- NAV BAR END -->

    <div class="hide-on-small-only">
        <!-- <br> -->
        <img class="group-photo" src="{{ asset('images/headshots/group1.jpg') }}">
        <br>
    </div>

    <div class="">
        <br>
        <!-- <div class="team-header light-blue darken-2 white-text">
          <h1>The Team</h1>
        </div> -->
        <div class="sub-team-header-2 white-text">
            <br>
            <h3 class="center-align">CEO</h3>
            <div class="row ">
                <div class="col m4"></div>
                <div class="col s12 m4">
                    <div class="card grey lighten-4">
                        <div class="card-image">
                            <img class="member-pic" src="{{ asset('images/headshots/akira.jpg') }}">
                        </div>
                        <div class="card-content grey-text text-darken-2">
                            <span class="card-title">Akira Nishii</span>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="sub-team-header white-text">
            <h3 class="center-align">Software Developers</h3>
            <div class="row ">
                <div class="col s12 m4">
                    <div class="card grey lighten-4">
                        <div class="card-image">
                            <img class="member-pic" src="{{ asset('images/headshots/benji.jpg') }}">
                        </div>
                        <div class="card-content grey-text text-darken-2">
                            <span class="card-title">Benji Bear</span>
                            <p>Front End</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card grey lighten-4">
                        <div class="card-image">
                            <img class="member-pic" src="{{ asset('images/headshots/akshay.jpg') }}">
                        </div>
                        <div class="card-content grey-text text-darken-2">
                            <span class="card-title">Akshay Rao</span>
                            <p>Back End</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="card grey lighten-4">
                        <div class="card-image">
                            <img class="member-pic" src="{{ asset('images/headshots/han.jpg') }}">
                        </div>
                        <div class="card-content grey-text text-darken-2">
                            <span class="card-title">Han Wang</span>
                            <p>Back End</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sub-team-header-2 white-text">
            <h3 class="center-align">Chemistry Team</h3>
            <div class="row ">
                <div class="col s12 m6 l3">
                    <div class="card grey lighten-4">
                        <div class="card-image">
                            <img class="member-pic" src="{{ asset('images/headshots/sean.jpg') }}">
                        </div>
                        <div class="card-content grey-text text-darken-2">
                            <span class="card-title">Sean</span>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div class="card grey lighten-4">
                        <div class="card-image">
                            <img class="member-pic" src="{{ asset('images/headshots/nolan.jpg') }}">
                        </div>
                        <div class="card-content grey-text text-darken-2">
                            <span class="card-title">Nolan</span>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div class="card grey lighten-4">
                        <div class="card-image">
                            <img class="member-pic" src="{{ asset('images/headshots/sara.jpg') }}">
                        </div>
                        <div class="card-content grey-text text-darken-2">
                            <span class="card-title">Sara Alektiar</span>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div class="card grey lighten-4">
                        <div class="card-image">
                            <img class="member-pic" src="{{ asset('images/headshots/jessica.jpg') }}">
                        </div>
                        <div class="card-content grey-text text-darken-2">
                            <span class="card-title">Jessica Zhang</span>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>
</body>
</html>