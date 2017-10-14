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
            <hr />
            <h3>Publications</h3>
            <p>{!! nl2br($lab->publications) !!}</p>
            <hr />
            <h3>Qualifications</h3>
            @if (count($requiredSkills) != 0 or count($prefSkills) != 0 or $lab->gpa !== null or $lab->weeklyCommitment !== null)
                @if (count($requiredSkills) != 0 or $lab->gpa !== null or $lab->weeklyCommitment !== null)
                    <h4>Required</h4>
                @endif
                @if ($lab->gpa !== null)
                    <p><i class="fa fa-chevron-right fa-fw" aria-hidden="true"></i>
                        Minimum GPA: {{ $lab->gpa }}</p>
                @endif
                @if ($lab->weeklyCommitment !== null)
                    <p><i class="fa fa-chevron-right fa-fw" aria-hidden="true"></i>
                        {{ $lab->weeklyCommitment . ' hours/week commitment.' }}</p>
                @endif
                @if (count($requiredSkills) != 0)
                    <p><i class="fa fa-chevron-right fa-fw" aria-hidden="true"></i>
                        Skills:
                        @for ($i = 0; $i < count($requiredSkills); $i++)
                            @if ($i < count($requiredSkills) - 1)
                                {{ $requiredSkills[$i]->name . ', ' }}
                            @else
                                {{ $requiredSkills[$i]->name }}
                            @endif
                        @endfor
                    </p>
                @endif
                @if (count($prefSkills) != 0)
                    <h4>Preferred</h4>
                    <p><i class="fa fa-chevron-right fa-fw" aria-hidden="true"></i>
                        Skills:
                        @for ($i = 0; $i < count($prefSkills); $i++)
                            @if ($i < count($prefSkills) - 1)
                                {{ $prefSkills[$i]->name . ', ' }}
                            @else
                                {{ $prefSkills[$i]->name }}
                            @endif
                        @endfor
                    </p>
                @endif
            @else
                <p>No qualifications listed.</p>
            @endif
        </div>
        <div class="col-md-2">
            <img src="{{ url('/photo/' . $username) }}" alt="Profile Picture" class="img-responsive hidden-sm hidden-xs">
            <h3 id="PI" style="text-align: center;">{{$PI->first_name . ' ' . $PI->last_name}}</h3>
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
                <p>{{ $faculty_member->first_name . ' ' . $faculty_member->last_name . ', ' . $faculty_member->title }}</p>
            @endforeach
            <hr/>

            <h3>Current Students</h3>
            @foreach ($students as $student)
                <p>{{ $student->first_name . ' ' . $student->last_name }}</p>
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