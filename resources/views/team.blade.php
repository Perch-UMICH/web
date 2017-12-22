@extends('layouts.splash')
@section('title', 'Team')

@section('content')
    <div class="hide-on-small-only">
        <!-- <br> -->
        <img class="group-photo" src="{{ asset('images/headshots/group1.jpg') }}">
        <br>
    </div>

    <div class="">
        <br><br><br><br>
        <div class="container center-align">
            <hr>
            <div class="meet-team">Meet the Perch Team</div>
            <hr>
        </div>

        <div class="sub-team-header-gen-2 white-text">
            <br>
            <!-- <h4 class="center-align">Admin</h4> -->
            <div class="container row">
                <!-- <div class="col m4"></div> -->
                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ asset('images/headshots/akira.jpg') }}">
                        </div>
                        <div class="card-content">
                            <span class="activator grey-text text-darken-4 flow-text">Akira<i class="material-icons right">expand_less</i></span>
                            <p class="grey-text">Executive Director</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title white-text text-darken-4">Akira Nishii<i class="material-icons right">close</i></span>
                            <p style="opacity: 1.0"></p>

                        </div>
                    </div>
                </div>

                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ asset('images/headshots/nolan.jpg') }}">
                        </div>
                        <div class="card-content">
                            <span class="activator grey-text text-darken-4 flow-text">Nolan<i class="material-icons right">expand_less</i></span>
                            <p class="grey-text">Head of Marketing</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title white-text text-darken-4">Nolan Kataoka<i class="material-icons right">close</i></span>
                            <p style="opacity: 1.0"></p>
                        </div>
                    </div>
                </div>
                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ asset('images/headshots/akshay.jpg') }}">
                        </div>
                        <div class="card-content">
                            <span class="activator grey-text text-darken-4 flow-text">Akshay<i class="material-icons right">expand_less</i></span>
                            <p class="grey-text">Head of Back End Dev</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title white-text text-darken-4">Akshay Rao<i class="material-icons right">close</i></span>
                            <p style="opacity: 1.0">placehoder</p>
                        </div>
                    </div>
                </div>

                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ asset('images/headshots/benji.jpg') }}">
                        </div>
                        <div class="card-content">
                            <span class="activator grey-text text-darken-4 flow-text">Benji<i class="material-icons right">expand_less</i></span>
                            <p class="grey-text">Head of Front End Dev</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title white-text text-darken-4">Benji Bear<i class="material-icons right">close</i></span>
                            <p style="opacity: 1.0">placehodler</p>
                        </div>
                    </div>
                </div>

                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ asset('images/headshots/meha.jpg') }}">
                        </div>
                        <div class="card-content">
                            <span class="activator grey-text text-darken-4 flow-text">Meha<i class="material-icons right">expand_less</i></span>
                            <p class="grey-text">Head of Administration</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title white-text text-darken-4">Meha Patel<i class="material-icons right">close</i></span>
                            <p style="opacity: 1.0">Meha is a Junior studying Cellular and Molecular Biology</p>
                            <p style="opacity: 1.0">She lives by the saying: if you want to save a life become a doctor, but if you want to save lives become a scientist</p>
                        </div>
                    </div>
                </div>

                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ asset('images/headshots/sara.jpg') }}">
                        </div>
                        <div class="card-content">
                            <span class="activator grey-text text-darken-4 flow-text">Sara<i class="material-icons right">expand_less</i></span>
                            <p class="grey-text">Head of Chem Team</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title">Sara Alektiar<i class="material-icons right">close</i></span>
                            <p style="opacity: 1.0"></p>
                        </div>
                    </div>
                </div>

                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ asset('images/headshots/sanjay.jpg') }}">
                        </div>
                        <div class="card-content">
                            <span class="activator grey-text text-darken-4 flow-text">Sanjay<i class="material-icons right">expand_less</i></span>
                            <p class="grey-text">Head of Bio Team</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title">Sanyja Balijepalli<i class="material-icons right">close</i></span>
                            <p style="opacity: 1.0"></p>
                        </div>
                    </div>
                </div>

                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ asset('images/headshots/han.jpg') }}">
                        </div>
                        <div class="card-content">
                            <span class="activator grey-text text-darken-4 flow-text">Han<i class="material-icons right">expand_less</i></span>
                            <p class="grey-text">Back End Dev</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title">Han Wang<i class="material-icons right">close</i></span>
                            <p style="opacity: 1.0"></p>
                        </div>
                    </div>
                </div>

                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ asset('images/headshots/sean.jpg') }}">
                        </div>
                        <div class="card-content">
                            <span class="activator grey-text text-darken-4 flow-text">Sean<i class="material-icons right">expand_less</i></span>
                            <p class="grey-text">Chem Team</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title">Sean Mccarthy<i class="material-icons right">close</i></span>
                            <p style="opacity: 1.0"></p>
                        </div>
                    </div>
                </div>

                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ asset('images/headshots/jessica.jpg') }}">
                        </div>
                        <div class="card-content">
                            <span class="activator grey-text text-darken-4 flow-text">Jessica<i class="material-icons right">expand_less</i></span>
                            <p class="grey-text">Chem Team</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title">Jessica Zhang<i class="material-icons right">close</i></span>
                            <p style="opacity: 1.0"></p>
                        </div>
                    </div>
                </div>

                <div class="col s6 m4 l3">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ asset('images/headshots/alex.jpg') }}">
                        </div>
                        <div class="card-content">
                            <span class="activator grey-text text-darken-4 flow-text">Alex<i class="material-icons right">expand_less</i></span>
                            <p class="grey-text">Bio Team</p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title">Alex Girgis<i class="material-icons right">close</i></span>
                            <p style="opacity: 1.0"></p>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div>
@endsection