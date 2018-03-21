@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>Welcome back,
                    @if (Auth::user()->hasRole('student'))
                        {{ Auth::user()->student->first_name }}.
                    </p><p>
                        You're a student!
                        Check out your <a href={{ url('/student') }}>Profile</a>
                    </p><p>
                        View all <a href="{{ url('/lab') }}">Labs</a>
                    </p>
                    @elseif (Auth::user()->hasRole('faculty'))
                        {{ Auth::user()->faculty->first_name }}.
                        </p><p>
                        You're a faculty member!
                        View your <a href={{ url('/faculty') }}>labs</a>.
                    </p>
                    @else
                        Your account hasn't been authorized yet.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
