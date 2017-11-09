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
                                @if ($labs !== null)
                                    @foreach ($labs as $lab)
                                        <div class="col-md-4"><div class="well well-md">
                                            <h3>{{ $lab->name }}</h3>
                                            <h4><a href='{{ url('/lab/' . $lab->id) }}'>View</a></h4>
                                            <h4><a href='{{ url('/lab/' . $lab->id . '/edit') }}'>Edit</a></h4>
                                        </div></div>
                                    @endforeach
                                @endif

                                <div class="col-md-4"><div class="well well-md" style="background: rgba(36, 212, 96, 0.3);">
                                    <h3>Create a lab</h3>
                                        <h4><a href="{{ url('/lab/create')}}">Create</a></h4>
                                    <h4><a href="#">Learn More</a></h4>
                                </div></div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


