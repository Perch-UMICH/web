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
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
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
                    <li><a href="{{ url('about') }}">About</a></li>
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

                <div class="timeline-content js--fadeInLeft">
                    <h2>Title</h2>
                    <div class="date">1 MAY 2016</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime ipsa ratione omnis alias cupiditate saepe atque totam aperiam sed nulla voluptatem recusandae dolor, nostrum excepturi amet in dolores. Alias, ullam.</p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInRight">
                    <div class="timeline-img-header">
                        <h2>Optimize Fellowship</h2>
                    </div>
                    <div class="date">25 MAY 2016</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime ipsa ratione omnis alias cupiditate saepe atque totam aperiam sed nulla voluptatem recusandae dolor, nostrum excepturi amet in dolores. Alias, ullam.</p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>

            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content js--fadeInLeft">
                    <div class="date">3 JUN 2016</div>
                    <h2>Quote</h2>
                    <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta explicabo debitis omnis dolor iste fugit totam quasi inventore!</blockquote>
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content js--fadeInRight">
                    <h2>Title</h2>
                    <div class="date">22 JUN 2016</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime ipsa ratione omnis alias cupiditate saepe atque totam aperiam sed nulla voluptatem recusandae dolor, nostrum excepturi amet in dolores. Alias, ullam.</p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInLeft">
                    <div class="timeline-img-header">
                        <h2>Card Title</h2>
                    </div>
                    <div class="date">10 JULY 2016</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime ipsa ratione omnis alias cupiditate saepe atque totam aperiam sed nulla voluptatem recusandae dolor, nostrum excepturi amet in dolores. Alias, ullam.</p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInRight">
                    <div class="timeline-img-header">
                        <h2>Card Title</h2>
                    </div>
                    <div class="date">30 JULY 2016</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime ipsa ratione omnis alias cupiditate saepe atque totam aperiam sed nulla voluptatem recusandae dolor, nostrum excepturi amet in dolores. Alias, ullam.</p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content js--fadeInLeft">
                    <div class="date">5 AUG 2016</div>
                    <h2>Quote</h2>
                    <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta explicabo debitis omnis dolor iste fugit totam quasi inventore!</blockquote>
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInRight">
                    <div class="timeline-img-header">
                        <h2>Card Title</h2>
                    </div>
                    <div class="date">19 AUG 2016</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime ipsa ratione omnis alias cupiditate saepe atque totam aperiam sed nulla voluptatem recusandae dolor, nostrum excepturi amet in dolores. Alias, ullam.</p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content js--fadeInLeft">
                    <div class="date">1 SEP 2016</div>
                    <h2>Title</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime ipsa ratione omnis alias cupiditate saepe atque totam aperiam sed nulla voluptatem recusandae dolor, nostrum excepturi amet in dolores. Alias, ullam.</p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
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