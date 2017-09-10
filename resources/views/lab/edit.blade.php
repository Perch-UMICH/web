@extends('layouts.app')
@section('title', 'Lab')

@section('header')
    <link href="{{ asset('css/labs_show.css') }}" rel="stylesheet">
@endsection


@section('content')

    <div id="labs_show" class="container">
        <form action="/lab/{{ $lab->id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="col-md-10">
                <h1>
                    <div class="form-group input-group">
                    <span class="input-group-addon">Lab Name</span>
                    <input id="labName" type="text" class="form-control" name="labName" placeholder="Name of the Lab" value="{{ $lab->name }}">
                    </div>
                </h1>
                <h3>
                    <div class="form-group input-group">
                    <span class="input-group-addon">Department</span>
                    <input id="department" type="text" class="form-control" name="department" placeholder="Department" value="{{ $lab->department }}">
                    </div>
                </h3>
                <hr/>
                <h3>Research</h3>
                <div class="form-group">
                    <label for="description">Provide a description of the lab (HTML supported)</label>
                    <textarea class="form-control" rows="1" id="description" placeholder="Description" name="description">{{ $lab->description }}</textarea>
                </div>
                <hr/>
                <h3>Publications</h3>
                <div class="form-group">
                    <label for="publications">List publications related to the lab here (HTML supported)</label>
                    <textarea class="form-control" rows="1" id="publications" placeholder="Publications" name="publications">{{ $lab->publications }}</textarea>
                </div>
                @include('layouts.errors')
                <div class="text-right btn-toolbar">
                    <input type="submit" class="btn btn-primary pull-right" value="Save Lab Page">
                    <a href="{{url('/lab/' . $lab->id)}}" class="btn btn-danger pull-right">Cancel</a>
                </div>
            </div>
            <div class="col-md-2">
                <img src="{{ url('/photo/' . $username) }}" alt="Profile Picture" class="img-responsive hidden-sm hidden-xs">
                <h3 id="PI" style="text-align: center;">{{$PI->name}}</h3>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-building-o fa-fw" aria-hidden="true"></i></span>
                    <input id="location" type="text" class="form-control" name="location" placeholder="Location" value="{{ $lab->location }}">
                </div>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-external-link fa-fw" aria-hidden="true"></i></span>
                    <input id="url" type="url" class="form-control" name="url" placeholder="website" value="{{ $lab->url }}">
                </div>
                <hr/>
                <h3>Research Area(s)</h3>
                <div class="form-group">
                    <label for="researchAreas">Research interests (HTML supported)</label>
                    <textarea class="form-control" rows="1" id="researchAreas" name="researchAreas">{{ $lab->researchAreas }}</textarea>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.fittext.js') }}"></script>
    <script src="{{ asset('js/autosize.js') }}"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $("#PI").fitText();
            autosize($('textarea'));
        });
    </script>
@endsection