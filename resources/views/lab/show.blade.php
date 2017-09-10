@extends('layouts.app')
@section('title', 'Lab')

@section('header')
    <link href="{{ asset('css/labs_show') }}" rel="stylesheet">
@endsection


@section('content')

    <div id="labs_show" class="container">
        <div class="col-md-10">
            <h1>{{ $lab->name }}
                <!-- Check if auth user is a faculty of the lab -->
                @php ($edit = false)
                @foreach ($facultyid as $id)
                    @if ($id == auth()->id())
                        @php ($edit = true)
                    @endif
                @endforeach
                @if ($edit)
                    <a href={{ url('/lab/' . $lab->id . '/edit') }} type="button" class="btn btn-sm btn-primary pull-right">Update lab page</a>
                @endif
            </h1>
            <h3>{{ $lab->department }}</h3>
            <hr/>
            <h3>Research</h3>
            <!-- HTML enabled -->
            <p>{!! nl2br($lab->description) !!}</p>
            <hr/>
            <h3>Publications</h3>
            <p>{!! nl2br($lab->publications) !!}</p>
        </div>
        <div class="col-md-2">
            <img src="{{ url('/photo/' . $username) }}" alt="Profile Picture" class="img-responsive hidden-sm hidden-xs">
            <h3 id="PI" style="text-align: center;">{{$PI->name}}</h3>
            <p><i class="fa fa-building-o fa-fw" aria-hidden="true"></i> {{ $lab->location }}</p>
            <p><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i>
                <a href="mailto:{{$PI->email}}">{{ $PI->email }}</a>
            </p>
            <p><i class="fa fa-external-link fa-fw" aria-hidden="true"></i>
            @if ($lab->url)
                <a href="{{ $lab->url }}" class="btn btn-xs btn-warning"
                   data-toggle="tooltip" title="{{ $lab->url }}">Lab Page</a>
            @else
                <button type="button" class="btn btn-xs btn-warning" disabled="disabled">Lab Page</button>
            @endif
            </p>
            <hr/>
            <h3>Research Area(s)</h3>
                <p>{!! nl2br($lab->researchAreas) !!}</p>
            <hr/>
            <h3>
                @if (count($faculty) == 1)
                    Faculty
                @else
                    Faculties
                @endif
            </h3>
            @foreach ($faculty as $faculty_member)
                <p>{{ $faculty_member->name . ', ' . $faculty_member->title }}</p>
            @endforeach
            <hr/>

            <h3>Current Students</h3>
            @foreach ($students as $student)
                <p>{{ $student->first_name }} {{ $student->last_name }}</p>
            @endforeach
            <hr/>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.fittext.js') }}"></script>
    <script type="text/javascript">
        $('[data-toggle="tooltip"]').tooltip();
        $(document).ready(function(){
            $("#PI").fitText();
        });
    </script>
@endsection