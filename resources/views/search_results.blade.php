@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Search</div>

                <div class="panel-body">
                    <form action="/search_lab" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                   placeholder="Search users"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                                </button>
                                </span>
                        </div>
                    </form>
                </div>

                <div class="panel-body">
                    <h3>Results:</h3>
                    @if (count($lab_results) > 0)
                        @foreach ($lab_results as $result)
                            <p>{{ $result->name }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


