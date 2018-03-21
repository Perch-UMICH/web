@extends('layouts.app')
@section('title', 'Lab')

@section('header')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <!--div class="panel-heading">Lab Dashboard</div-->

                    <div class="panel-body">
                        <h1>Labs</h1>
                        <form action="/search_lab" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="q"
                                       placeholder="Search by tags"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                                </button>
                                </span>
                            </div>
                        </form>
                        <hr/>
                        <button type="button" class="btn btn-default btn-sm alert-danger">Filter
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
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
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
