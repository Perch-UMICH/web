@extends('layouts.app')
@section('title', 'Register')

@section('header')
    <script>
        $( document ).ready(function() {
            page = 0;
            max_page = 2;


            for (var i = 1; i < max_page; ++i) {
                $('#register_page_' + i).hide();
            }
            $('#register_submit_btn').hide();
            $('#register_prev_btn').hide();


            // Next button
            $('#register_next_btn').click( next_page );

            // Prev button
            $('#register_prev_btn').click( prev_page );

            $('#register_prof_check').click( function () {
                $('#register_next_btn').hide();
                $('#register_submit_btn').show();
            });

            $('#register_student_check').click( function () {
                $('#register_next_btn').show();
                $('#register_submit_btn').hide();
            })
        });

        next_page = function () {
            $('#register_prev_btn').show();

            var to_close = '#register_page_' + page;
            var to_open = '#register_page_' + (page + 1);
            $(to_close).slideUp();
            ++page;

            if (page === max_page - 1) {
                $('#register_next_btn').hide();
                $('#register_submit_btn').show();
            }
            $(to_open).slideDown();

        };

        prev_page = function () {
            if (page === max_page - 1) {
                $('#register_submit_btn').hide();

            }
            $('#register_next_btn').show();

            var to_close = '#register_page_' + page;
            var to_open = '#register_page_' + (page - 1);
            $(to_close).slideUp();
            --page;

            if (page === 0) {
                $('#register_prev_btn').hide();
                $('#register_submit_btn').hide();

            }
            $(to_open).slideDown();
        };

    </script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div id="register_page_0">
                            {{--first name--}}
                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name"
                                           value="{{ old('first_name') }}" required autofocus>

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--last name--}}
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name"
                                           value="{{ old('last_name') }}" required autofocus>

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="user-type" class="col-md-4 control-label">User Type</label>

                                <div class="col-md-6 btn-group" data-toggle="buttons">
                                    <label id="register_student_check" class="btn btn-default active" >
                                        <input type="radio" class="form-control-static" name="user-type" value="student" checked required> Student
                                    </label>
                                    <label id="register_prof_check" class="btn btn-default">
                                        <input type="radio" class="form-control-static" name="user-type" value="professor"> Professor
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div id="register_page_1">
                            <div class="form-group">
                                <label for="year" class="col-md-4 control-label">Year</label>

                                <div class="col-md-6">
                                    <input id="year" type="text" class="form-control" name="year"
                                           value="{{ old('year') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="major" class="col-md-4 control-label">Major</label>

                                <div class="col-md-6">
                                    <input id="major" type="text" class="form-control" name="major"
                                           value="{{ old('major') }}" required autofocus>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-1 col-md-offset-1">
                                <div id="register_prev_btn" class="btn btn-primary">Previous</div>
                            </div>
                            <div class="col-md-1 col-md-offset-7">
                                <div id="register_next_btn" class="btn btn-primary">Next</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
