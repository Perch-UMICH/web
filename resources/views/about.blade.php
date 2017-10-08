@extends('layouts.app')
@section('title', 'About')

@section('header')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/splash.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="header light-blue darken-2 white-text">
        <h1>About</h1>
    </div>

    <div class="header light-blue lighten-5 blue-text container">
        <h4>Info will go here</h4>
        <h4>Info will go here</h4>
        <h4>Info will go here</h4>
        <h4>Info will go here</h4>

    </div>

    <div class="header light-blue darken-2 white-text">
        <h1>The Team</h1>
    </div>

    <!-- Member Cards -->
    <div class="row light-blue darken-2">
        <div class="col s6 m4 l3">
            <div class="card grey lighten-4">
                <div class="card-image">
                    <img class="member-pic" src="{{ asset('images/headshots/photo1.jpg') }}">
                </div>
                <div class="card-content grey-text text-darken-2">
                    <span class="card-title">Name Here</span>
                    <p>This is person's bio</p>
                </div>
            </div>
        </div>

        <div class="col s6 m4 l3">
            <div class="card grey lighten-4">
                <div class="card-image">
                    <img class="member-pic" src="{{ asset('images/headshots/photo2.jpg') }}">
                </div>
                <div class="card-content grey-text text-darken-2">
                    <span class="card-title">Name Here</span>
                    <p>This is person's bio</p>
                </div>
            </div>
        </div>
        <div class="col s6 m4 l3">
            <div class="card grey lighten-4">
                <div class="card-image">
                    <img class="member-pic" src="{{ asset('images/headshots/photo3.jpg') }}">
                </div>
                <div class="card-content grey-text text-darken-2">
                    <span class="card-title">Name Here</span>
                    <p>This is person's bio</p>
                </div>
            </div>
        </div>
        <div class="col s6 m4 l3">
            <div class="card grey lighten-4">
                <div class="card-image">
                    <img class="member-pic" src="{{ asset('images/headshots/photo4.jpg') }}">
                </div>
                <div class="card-content grey-text text-darken-2">
                    <span class="card-title">Name Here</span>
                    <p>This is person's bio</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>
@endsection