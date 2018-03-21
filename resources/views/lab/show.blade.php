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
                @php ($labStudent = false)
                @foreach ($facultyid as $id)
                    @if ($id == auth()->id())
                        @php ($edit = true)
                    @endif
                @endforeach
                @if ($edit)
                    <a href={{ url('/lab/' . $lab->id . '/edit') }} type="button" class="btn btn-sm btn-primary pull-right">Update lab page</a>
                @elseif (Auth::user()->hasRole('student'))
                    @foreach ($students as $student)
                        @if ($student->user_id == auth()->id())
                            @php ($labStudent = true)
                        @endif
                    @endforeach
                    @if ($labStudent)
                        <a type="button" class="btn btn-sm btn-primary pull-right" disabled="disabled" data-toggle="tooltip" title="You're already part of this lab.">Apply</a>
                    @else
                        <a href={{ url('#') }} type="button" class="btn btn-sm btn-primary pull-right">Apply</a>
                    @endif
                @endif
            </h1>
            <h3>{{ $lab->department }}</h3>
            <hr/>

            {{--DESCRIPTION--}}
            <h3>Research</h3>
            <!-- HTML enabled -->
            <p>{!! nl2br($lab->description) !!}</p>
            <hr />

            {{--PUBLICATIONS--}}
            <h3>Publications</h3>
            <p>{!! nl2br($lab->publications) !!}</p>
            <hr />

            {{--QUALIFICATIONS--}}
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

            {{--POSITIONS--}}
            <hr />
            <h3>Open Positions</h3>
            @if ($edit)
                <a href={{ url('/lab/' . $lab->id . '/edit') }} type="button" class="btn btn-sm btn-primary pull-right">Add new position</a>
            @endif
            @if (count($labPositions) != 0)
                @foreach ($labPositions as $pos)
                    <h4>{{ $pos->name }}</h4>
                    @if ( $pos->open )
                        <p>This position is currently open</p>
                    @else
                        <p>This position has been recently filled</p>
                    @endif

                    <p>{{ $pos->description }}</p>
                @endforeach
            @else
                <p>No open positions at this time.</p>
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
                <button type="button" class="btn btn-xs btn-warning"
                    data-toggle="tooltip" title="No website listed">Lab Page</button>
            @endif
            </p>
            <hr/>
            <h3>Research Area(s)</h3>
                {{--<p>{!! nl2br($lab->researchAreas) !!}</p>--}}
                @foreach ($labTags as $tag)
                    <p>{{ $tag->tag }}</p>
                @endforeach
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