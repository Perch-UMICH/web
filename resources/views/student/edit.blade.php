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
        <div class="row"><form action="/student/{{ $username }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
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

                        <div id="basic_info">
                            <h1 id="profile_name">{{ $student->first_name }} {{ $student->last_name }}</h1>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-graduation-cap fa-fw" aria-hidden="true"></i></span>
                                <input id="major" type="text" class="form-control" name="major" placeholder="Major" value="{{ $student->major }}">
                            </div>
                        </div>
                        <hr>
                        <div id="academics">
                            <h2 id="academics_title">Academics</h2>
                            <div class="form-group">
                                <label for="standing"><i class="fa fa-university fa-fw" aria-hidden="true"></i> Class Standing</label>
                                <select class="form-control" id="standing" name="standing">
                                    <option value="Freshman" {{ $student->year === 'Freshman' ? "selected" : "" }}>Freshman</option>
                                    <option value="Sophomore" {{ $student->year === 'Sophomore' ? "selected" : "" }}>Sophomore</option>
                                    <option value="Junior" {{ $student->year === 'Junior' ? "selected" : "" }}>Junior</option>
                                    <option value="Senior" {{ $student->year === 'Senior' ? "selected" : "" }}>Senior</option>
                                </select>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-balance-scale fa-fw" aria-hidden="true"></i> GPA: </span>
                                <input id="gpa" type="number" step="0.01" class="form-control" name="gpa" placeholder="0.00" value="{{ $student->gpa }}">
                            </div>
                        </div>
                        <hr>
                        <div>
                            <h2 id="links_title">Links</h2>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-linkedin-square fa-fw" aria-hidden="true"></i></span>
                                <input id="linkedin" type="url" step="0.01" class="form-control" name="linkedin" placeholder="https://linkedin.com/in/user" value="{{ $student->linkedin_user }}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- right column -->
            <div class="col-md-9">

                <!-- bio -->
                <div class="panel panel-default">
                    <div class="panel-heading">Bio</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="bio">Provide a short description of yourself</label>
                            <textarea class="form-control" rows="5" id="bio" name="bio" maxlength="400">{{ $student->bio }}</textarea>
                            <p class="pull-right" id="count_message"></p>
                        </div>
                    </div>
                </div>
                @include('layouts.errors')
                <p>
                    <input type="submit" class="btn btn-primary pull-right" value="Save Profile">
                </p>
            </div>
        </form></div>
    </div>


    <?php
    echo '<pre>';
    echo 'Debug Section<br><hr>';
    print_r ($student);
    echo '</pre>';
    ?>

@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.fittext.js') }}"></script>


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

        // bio character counter
        var text_max = 400;
        var text_length = $('#bio').val().length;
        var text_remaining = text_max - text_length;

        $('#count_message').html(text_remaining + ' characters remaining');
        $('#bio').keyup(function() {
            if (text_remaining > 1) {
                $('#count_message').html(text_remaining + ' characters remaining');
            } else {
                $('#count_message').html(text_remaining + ' character remaining');
            }
        });
    </script>
@endsection