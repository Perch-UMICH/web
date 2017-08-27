@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are {{Auth::user()->name}}.
                    @if (Auth::user()->hasRole('student'))
                        You're a student!
                        Check out your <a href={{ url('/student') }}>Profile</a>
                    @elseif (Auth::user()->hasRole('professor'))
                        You're a professor!

                        <h1>Your Labs</h1>
                        <hr/>

                    @else
                        You're account hasn't been authorized yet.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
