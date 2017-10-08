@extends('layouts.app')
@section('title', 'Welcome')

@section('header')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/splash.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Logo Section -->
    <div class="parallax-container center-align">
        <img class="logo" src="{{ asset('images/perch_round_blue.png') }}">
        <div class="white-text">
            <h3 class="logo-caption blue-text text-lighten-1">De-<span class="blue-text text-darken-3">awkwardizing</span> Research</h3>
        </div>
        <!--div class="parallax"><img class="parallax-image" src=" {{ asset('images/doctors.jpg') }} "></--div-->
    </div>

    <!-- Info Section 1 -->
    <div class="heading light-blue darken-2">
        <div class="row">
            <div class="col s12 m6 l6">
                <div class="light-blue darken-2 white-text">
                    <h4 class="">Finding a Lab Sucks</h4>
                    <span class="flow-text grey-text text-lighten-4">It's a pain in the ass. No one knows where to go or what labs do.
          </span>
                    <blockquote class="blue-text text-lighten-5">Its a pain!</blockquote>
                    <blockquote class="blue-text text-lighten-5">Its a pain!</blockquote>
                    <blockquote class="blue-text text-lighten-5">Its a pain!</blockquote>
                </div>
            </div>
            <div class="col s12 m6 l6">
                <div class="light-blue darken-2 white-text">
                    <h4 class="">Perch wants to fight back</h4>
                    <span class="flow-text grey-text text-lighten-4">We're strealining the process so everyone gets into their best fit lab. This is a super cool platform you should join
          </span>
                </div>
            </div>
            <div class="spacer col m1 show-on-medium"></div>
            <div class="spacer col l4 show-on-large"></div>
            <div class="spacer col m1 show-on-medium"></div>
        </div>
    </div>

    <!-- Popout Collabsable Section -->
    <div class="row light-blue accent-1 valign-wrapper more-info">
        <div class="col m2 hide-on-large-only"></div>
        <div class="col s12 m8 l8">
            <ul class="collapsible infographic popout" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header white lighten-2 grey-text text-darken-4 active"><i class="material-icons">language</i>Readable Lab Pages</div>
                    <div class="collapsible-body white lighten-2 grey-text text-darken-4 black-text"><span>Bacon ipsum dolor amet chicken bresaola boudin tri-tip cupim pork loin alcatra shank. Pancetta ball tip prosciutto </span></div>
                </li>

                <li>
                    <div class="collapsible-header white lighten-2 grey-text text-darken-4"><i class="material-icons">question_answer</i>Transparency</div>
                    <div class="collapsible-body white lighten-2 grey-text text-darken-4 black-text"><span>Bacon ipsum dolor amet chicken bresaola boudin tri-t</span></div>
                </li>

                <li>
                    <div class="collapsible-header white lighten-2 grey-text text-darken-4"><i class="material-icons">location_searching</i>All in one place</div>
                    <div class="collapsible-body white lighten-2 grey-text text-darken-4 black-text"><span>Bacon ipsum dolor amet chicken bresaola boudin tri-tip cupim pork loin alcatra shank. Pancetta ball tip prosciutto burgdoggen fatback bresaola swine. Rump flank doner </span></div>
                </li>

            </ul>
        </div>
        <div class="col m12 l3 valign-wrapper about-btn"><a href="{{ url('about') }}" class="waves-effect waves-light btn-large red">Click For More</a></div>

    </div>

    <!-- Form Section -->
    <div class="section-2 valign-wrapper">
        <div class="input-form container grey lighten-5 z-depth-3">
            <div class="container">
                <div class="form-header center-align grey-text text-darken-3">Interested?</div>
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="first_name" type="text" class="validate" required>
                                <label for="first">First Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="last_name" type="text" class="validate" required>
                                <label for="last_name">Last Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <input class="radio" name="user-type" type="radio" id="faculty" required/>
                        <label for="faculty">Faculty</label>
                        <input class="radio" name="user-type" type="radio" id="student" required/>
                        <label for="student">Student</label>
                        <div class="row center-align">
                            <button class="btn waves-effect waves-light blue pulse" type="submit" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section 2 -->
@endsection

@section('scripts')
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>
@endsection