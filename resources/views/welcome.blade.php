<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Welcome</title>

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
                    <span class="nav-option hide-on-small-only">Perch</span>
                    <!-- <span class="show-">The Team</span> -->
                </ul>
                <!-- <ul class="right"><li>Sign Up</li></ul> -->
                <ul class="side-nav light-blue lighten-4" id="mobile-demo">
                    <li><a href="{{ url('about') }}">The Team</a></li>
                    <li><a href="{{ url('timeline') }}">Timeline</a></li>
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
    <div class="tab3 valign-wrapper">
        <div class="container center-align">
            <img class="logo" src="{{ asset('images/PERCH_MASCOT.svg') }}">
            <h1 class="white-text perch">Perch</h1>
            <span class="catchphrase hide-on-small-only"><span class="awkward-top">De-awkwardizing</span><br><span class="awkward-bottom">Research</span></span>
            <div class="awkward-mobile container hide-on-med-and-up white-text">De-awkwardizing<div id="research-mobile" class="white">Research</div></div>
        </div>
    </div>

    <div class="tab4 white-text valign-wrapper">
        <div>
            <div class="header center-align">Finding a lab is Awkward</div>
            <div class="container">
                <ul>
                    <blockquote class="flow-text">Most research labs on campus aren’t organized to accommodate for undergrads</blockquote>
                    <blockquote class="flow-text">Information about labs is often hard to find, and it’s hard to tell if they’re looking for assistants </blockquote>
                    <blockquote class="flow-text">Contacting research faculty take a lot of work, since there are few opportunities for professors to connect with students on their research</blockquote>
                </ul>
            </div>
        </div>

    </div>

    <!-- TAB -->
    <div class="tab2 hide-on-med-and-down valign-wrapper">
        <div class="container">
            <br>
            <h1 class="white-text center-align">Why Perch?</h1>
            <blockquote id="block-solution" class="flow-text white">We streamline the way students and university labs communicate, so that students can find the best fit for their academic passion.</blockquote>
            <div class="row">
                <div class="col s6 l4 center-align infoitem">
                    <i class="large material-icons white-text">thumb_up</i>
                    <div>
                        <h5 class="white-text">Simplified Lab Pages</h5>
                        <span class="flow-text white-text">Find out exactly which labs are looking for assistants, what fields of study they focus on, and how an undergrad could fit right in</span>
                    </div>
                </div>
                <div class="col s6 l4 center-align infoitem">
                    <i class="large material-icons white-text">lightbulb_outline</i>
                    <div>
                        <h5 class="white-text">Skills Matching</h5>
                        <span class="flow-text white-text">Create a profile of your academic interests and research skills, and receive updates about labs that are looking for your specific skillset</span>
                    </div>
                </div>
                <div class="col s6 l4 center-align infoitem">
                    <i class="large material-icons white-text">people</i>
                    <div>
                        <h5 class="white-text">Application System</h5>
                        <span class="flow-text white-text">Browse open positions from labs that align with your skills and send applications directly through our site. No more cold, awkward emails.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END TAB -->
    <!-- TAB -->
    <div class="tab2L hide-on-large-only valign-wrapper">
        <div class="container">
            <br>
            <h1 class="white-text center">Why Perch?</h1>
            <blockquote id="block-solution" class="flow-text white">We streamline the way students and university labs communicate, so that students can find the best fit for their academic passion. </blockquote>
            <div class="row">
                <div class="col s12 m6 center-align infoitem">
                    <i class="large material-icons white-text">thumb_up</i>
                    <div>
                        <h5 class="white-text">Simplified Lab Pages</h5>
                        <span class="infodescriptor flow-text white-text">Find out exactly which labs are looking for assistants, what fields of study they focus on, and how an undergrad could fit right in</span>
                    </div>
                </div>
                <div class="col s12 m6 center-align infoitem">
                    <i class="large material-icons white-text">lightbulb_outline</i>
                    <div>
                        <h5 class="white-text">Skills Matching</h5>
                        <span class="flow-text white-text">Create a profile of your academic interests and research skills, and receive updates about labs that are looking for your specific skillset</span>
                    </div>
                </div>
                <div class="col s12 m6 center-align infoitem">
                    <i class="large material-icons white-text">people</i>
                    <div>
                        <h5 class="white-text">Application System</h5>
                        <span class="flow-text white-text">Browse open positions from labs that align with your skills, and send applications directly through our site. No more cold, awkward emails.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END TAB -->

    <div class="tab5 white-text center-align">
        <div >
            <div class="header center-align">Advisors</div>
            <br>
            <div class=" center-align">
                <!--   <div class="row">
                    <div class="col s4"></div>
                    <div class="col s4">Header</div>
                    <div class="col s4"></div>
                  </div> -->
                <div class="row">
                    <div class="col s12 m4">
                        <img class="circle responsive-img advisor-img" src="images/advisors/example.jpg">
                        <div class="flow-text white-text">Advisor num 1</div>
                        <div class="flow-text white-text">Microsoft Hiring Manager</div>
                    </div>
                    <div class="col s12 m4">
                        <img class="circle responsive-img advisor-img" src="images/advisors/example.jpg">
                        <div class="flow-text white-text">Advisor num 1</div>
                        <div class="flow-text white-text">Microsoft Hiring Manager</div>
                    </div>
                    <div class="col s12 m4">
                        <img class="circle responsive-img advisor-img" src="images/advisors/example.jpg">
                        <div class="flow-text white-text">Advisor num 1</div>
                        <div class="flow-text white-text">Microsoft Hiring Manager</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="tab3"></div> -->
    <div class="sub-team-header-2">
        <!-- Form Section -->
        <div class="form-container">
            <div class="input-form container grey lighten-5 z-depth-3">
                <div class="container">
                    <div class="form-header center-align grey-text text-darken-3">Interested?</div>
                    <div class="row">
                        <form class="col s12" method="POST" action="{{ url('interested') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="first_name" name="first_name" type="text" class="validate" required>
                                    <label for="first_name">First Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="last_name" name="last_name" type="text" class="validate" required>
                                    <label for="last_name">Last Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" name="email" type="email" class="validate" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <input class="radio" name="user_type" type="radio" id="faculty" value="faculty" required/>
                            <label for="faculty">Faculty</label>
                            <input class="radio" name="user_type" type="radio" id="student" value="student" required/>
                            <label for="student">Student</label>
                            <div class="submit-container row center-align">
                                <button class="btn waves-effect waves-light green pulse" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Section 2 -->
    </div>

    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>
</body>

</html>