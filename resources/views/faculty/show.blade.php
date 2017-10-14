@extends('layouts.app')
@section('title', 'Profile')

@section('header')

@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Faculty Dashboard</div>

                    <div class="panel-body">
                        <h1>Your Labs</h1>
                        <hr/>

                            <div class="row">
                            <div class="col-md-4">
                                @if ($lab !== null)
                                <div class="well well-lg">
                                    <h3>{{ $lab->name }}</h3>
                                    <h4><a href='{{ url('/lab/' . $lab->id) }}'>View</a></h4>
                                    <h4><a href='{{ url('/lab/' . $lab->id . '/edit') }}'>Edit</a></h4>
                                </div>
                                @endif
                                <div class="well well-lg">
                                    <h3><a href="#">Create a lab</a></h3>
                                </div>

                            </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection