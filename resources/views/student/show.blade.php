@extends('layouts.app')
@section('title', 'Profile')

@section('header')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/students_show.css') }}" rel="stylesheet">
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
                        @if ($student->profile_pic_link)
                            <img src="/{{ $student->profile_pic_link }}" alt="Profile Picture"
                                 class="img-responsive" onclick="updateProfilePic()">
                        @else
                            <img src="{{ asset('storage/profile_pic/default_avatar.svg') }}" alt="Profile Picture"
                                 class="img-responsive" onclick="updateProfilePic()">
                        @endif
                        <form method="post" action="{{ url('/change_profile_picture') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="file" name="profile" id="profile_upload" class="invisible"
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
                                <button type="button" class="btn btn-xs btn-primary" onclick="uploadResume()">Upload</button>
                                @if($resume)
                                    <button type="button" class="btn btn-xs btn-primary" data-toggle="tooltip" title="{{ $resume->resume_name }}">Download</button>
                                @else
                                    <button type="button" class="btn btn-xs btn-primary" disabled="disabled">Download</button>
                                @endif
                            </p>
                            <form method="post" action="{{ url('/upload') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" name="resume" id="resume_upload" class="invisible"
                                       onchange="this.form.submit()"/>
                            </form>
                            <p>
                                <i class="fa fa-linkedin-square fa-fw" aria-hidden="true"></i>
                                Linkedin:
                                <button type="button" class="btn btn-xs btn-primary">Update</button>
                            </p>
                        </div>
                        <hr>
                        <div id="academics">
                            <h2 id="academics_title">Academics <button type="button" class="btn btn-xs btn-primary pull-right">Edit</button></h2>
                            <p><i class="fa fa-university fa-fw" aria-hidden="true"></i>
                                Class Standing: {{ $student->year }} </p>
                            @if ($student->gpa)
                                <p><i class="fa fa-balance-scale fa-fw" aria-hidden="true"></i>
                                    GPA:  {{ number_format($student->gpa, 2) }} </p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <!-- right column -->
            <div class="col-md-9">

                <!-- bio -->
                <div class="panel panel-default">
                    <div class="panel-heading">Bio <button type="button" class="btn btn-xs btn-primary pull-right">Edit</button></div>
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
                    <div class="panel-heading">Skills and Interest <button type="button" class="btn btn-xs btn-primary pull-right">Edit</button></div>
                    <div class="panel-body">
                        @if (count($skills) != 0)
                            @foreach ($skills as $skill)
                                <p><i class="fa fa-chevron-right fa-fw" aria-hidden="true"></i> {{ $skill }}</p>
                            @endforeach
                        @else
                            <p>No skill listed.</p>
                        @endif
                    </div>
                </div>
            </div>



        </div>
    </div>

    <?php
    echo '<pre>';
    echo 'Debug Section<br><hr>';
    print_r ($skills);
    echo '</pre>';
    ?>

@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.fittext.js') }}"></script>

    <script>
        function updateProfilePic(){
            document.getElementById("profile_upload").click();
        }
        function uploadResume(){
            document.getElementById("resume_upload").click();
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $("#status").show().delay(3000).slideUp("slow");
            $("#profile_name").fitText();
            $('#academics_title').fitText(1.4);
            $('.pull-right').onclick = function() {
                console.log('clicked');
            };
        });
    </script>
@endsection