@extends('layouts.app')
@section('title', 'Profile')

@section('header')
    <link href="{{ asset('css/perch.css') }}" rel="stylesheet">
@endsection

@section('status')
    @if (session('status'))
        <div class="container" id="status">
            <p> {{ session('status') }} </p>
        </div>
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">

                <!-- user info -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <!-- profile picture -->
                        <img src="{{ url('/photo/' . $username) }}" alt="Profile Picture" class="img-responsive"
                             onclick="updateProfilePic()"
                             @if($student->user_id == auth()->id())
                                data-toggle="tooltip" title="Click to change profile picture"
                             @endif
                        >
                        <form method="post" action="{{ url('/photo') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="file" name="profile_picture" id="profile_upload" class="invisible"
                                   onchange="this.form.submit()"/>
                        </form>

                        <div id="basic_info">
                            <h1 id="profile_name">{{ $student->first_name }} {{ $student->last_name }}</h1>
                            <p>
                                <i class="fa fa-graduation-cap fa-fw" aria-hidden="true"></i> {{ $student->major }}
                            </p>
                            <p>
                                <i class="fa fa-file-pdf-o fa-fw" aria-hidden="true"></i>
                                Resume:
                                @if($student->user_id == auth()->id())
                                    <button type="button" class="btn btn-xs btn-primary" onclick="uploadResume()">Upload</button>
                                @endif
                                @if($resume)
                                    <a href="{{url('/resume/' . $username)}}" class="btn btn-xs btn-primary" data-toggle="tooltip" title="{{ $resume->resume_name }}">Download</a>
                                @else
                                    <button type="button" class="btn btn-xs btn-primary" disabled="disabled">Download</button>
                                @endif
                            </p>
                            <form method="post" action="{{ url('/resume') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" name="resume" id="resume_upload" class="invisible"
                                       onchange="this.form.submit()"/>
                            </form>
                            @include('layouts.errors')
                        </div>
                        <hr>
                        <div id="academics">
                            <h2 id="academics_title">Academics</h2>
                            <p><i class="fa fa-university fa-fw" aria-hidden="true"></i>
                                Class Standing: {{ $student->year }} </p>
                            @if ($student->gpa)
                                <p><i class="fa fa-balance-scale fa-fw" aria-hidden="true"></i>
                                    GPA:  {{ number_format($student->gpa, 2) }} </p>
                            @endif
                        </div>
                        <hr>
                        <div>
                            <h2 id="links_title">Links</h2>
                            <p>
                                <i class="fa fa-linkedin-square fa-fw" aria-hidden="true"></i>
                                Linkedin:
                                @if ($student->linkedin_user)
                                    <a href="{{ $student->linkedin_user }}" class="btn btn-xs btn-warning"
                                       data-toggle="tooltip" title="{{ $student->linkedin_user }}">External link</a>
                                @else
                                    <button type="button" class="btn btn-xs btn-warning" disabled="disabled">External link</button>
                                @endif
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <!-- right column -->
            <div class="col-md-9">

                <!-- bio -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Bio
                        @if($student->user_id == auth()->id())
                            <a href={{ url('/student/' . $username . '/edit') }} type="button" class="btn btn-xs btn-primary pull-right">Update profile</a>
                        @endif
                    </div>
                    <div class="panel-body">
                        @if ($student->bio)
                            <p>{{ $student->bio }}</p>
                        @else
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget lacinia orci. Vivamus luctus ante
                                quis tortor porta, sit amet facilisis eros pretium. Donec vehicula venenatis nulla, nec malesuada neque.
                                Duis mollis ligula turpis, vel aliquet nibh dapibus sit amet. Proin ultricies lobortis sem, eu lobortis
                                velit egestas et. Duis lobortis at orci nec venenatis. Vestibulum ultricies urna eu nisi vehicula, et
                                dapibus dolor laoreet.</p>
                        @endif

                    </div>
                </div>

                <!-- skills and interest -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Skills
                        @if($student->user_id == auth()->id())
                            <a href="{{ url('/studentskills/' . $username . '/edit') }}" type="button" class="btn btn-xs btn-primary pull-right">Update skills</a>
                        @endif
                    </div>
                    <div class="panel-body">
                        @if (count($skills) != 0)
                            @foreach ($skills as $skill)
                                <p><i class="fa fa-chevron-right fa-fw" aria-hidden="true"></i> {{ $skill }}</p>
                            @endforeach
                        @else
                            <p>No skill listed.</p>
                        @endif
                    </div>
                    <div class="panel-heading">
                        Research interests
                        @if($student->user_id == auth()->id())
                            <a href="{{ url('/studenttags/' . $username . '/edit') }}" type="button" class="btn btn-xs btn-primary pull-right">Update interests</a>
                        @endif
                    </div>
                    <div class="panel-body">
                        @if (count($interests) != 0)
                            @foreach ($interests as $interest)
                                <p><i class="fa fa-chevron-right fa-fw" aria-hidden="true"></i> {{ $interest->tag }}</p>
                            @endforeach
                        @else
                            <p>No research interests listed.</p>
                        @endif
                    </div>
                </div>
            </div>



        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.fittext.js') }}"></script>

    @if($student->user_id == auth()->id())
    <script>
        function updateProfilePic(){
            document.getElementById("profile_upload").click();
        }
        function uploadResume(){
            document.getElementById("resume_upload").click();
        }
    </script>
    @endif

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $("#status").show().delay(3000).slideUp("slow");
            $("#profile_name").fitText();
            $('#academics_title').fitText(1.4);
            $('#links_title').fitText(1.4);
            $('.pull-right').onclick = function() {
                console.log('clicked');
            };
        });
    </script>
@endsection