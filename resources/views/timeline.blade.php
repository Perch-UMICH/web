<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Timeline</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet prefetch'>
    <link href="{{ asset('css/timeline.css') }}" rel="stylesheet">

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
                    <span class="nav-option hide-on-small-only">Timeline</span>
                    <!-- <span class="show-">The Team</span> -->
                </ul>
                <!-- <ul class="right"><li>Sign Up</li></ul> -->
                <ul class="side-nav light-blue lighten-4" id="mobile-demo">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('about') }}">The Team</a></li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
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
                </ul>
            </div>
        </nav>
    </div>
    <!-- NAV BAR END -->

    <!-- CONTENT BEGIN -->
    <header>
        <div class="container text-center">
            <div id="countdown"></div>
        </div>
    </header>

    <section class="timeline">
        <div class="container">
            <div class="timeline-item">
                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInLeft">
                    <div class="timeline-img-header">
                        <h2>Jo Angela Oehrli</h2>
                    </div>
                    <div class="date">19 NOV 2017</div>
                    <p>Jo Angela Oehrli, published UM librarian, joins the team as a primary advisor<br><br></p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInRight">
                    <div class="timeline-img-header">
                        <h2>U of M Library Minigrant</h2>
                    </div>
                    <div class="date">27 OCT 2017</div>
                    <p>Perch wins the University of Michigan library Student Mini-Grant Award<br><br></p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>

            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>
                <div class="timeline-content js--fadeInLeft">
                    <div class="date">24 SEP 2017</div>
                    <h2>Slash Page Deployed</h2>
                    <p>Splash page goes online, including basic platform functionality<br></p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInLeft">
                    <div class="timeline-img-header">
                        <h2>Mascot Designed</h2>
                    </div>
                    <div class="date">29 OCT 2017</div>
                    <p>Perch mascot, Rodriguez, developed by graphic design team</p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInLeft">
                    <div class="timeline-img-header">
                        <h2>Jim Bennett</h2>
                    </div>
                    <div class="date">23 AUG 2017</div>
                    <p>Jim Bennett, Microsoft Product lead, joins the team at a primary advisor<br><br></p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content js--fadeInLeft">
                    <div class="date">1 SEP 2016</div>
                    <h2>Wireframe</h2>
                    <p>Perch wireframe prototype showcased at Optimize prototype night</p>
                    <a class="bnt-more time-a" href="https://xd.adobe.com/view/7b2ab11b-723d-4340-af58-ae50727bb6ad/">WIREFRAME</a>
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInLeft">
                    <div class="timeline-img-header">
                        <h2>Optimize Challenge</h2>
                    </div>
                    <div class="date">24 FEB 2017</div>
                    <p>Perch receives Optimize Social Innovation Challenge grant, with our own Akira and Hyejin becoming Optimize fellows</p>
                    <a class="bnt-more time-a" href="https://www.optimizemi.org/">OPTIMIZE</a>
                    <br><br>
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInRight">
                    <div class="timeline-img-header">
                        <h2>John Wolfe</h2>
                    </div>
                    <div class="date">19 AUG 2016</div>
                    <p>Professor John Wolfe, Arthur F. Thurnau Professor of Chemistry, joins the team as a primary advisor</p>
                    <a class="bnt-more time-a" href="http://www.umich.edu/~wolfelab/wolfe.html">JOHN WOLFE</a><br><br>
                </div>
            </div>



        </div>
    </section>
    <!-- CONTENT END -->

    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/timeline.js') }}"></script>
    <script src='https://cdn.jsdelivr.net/scrollreveal.js/3.3.1/scrollreveal.min.js'></script>
</body>
</html>