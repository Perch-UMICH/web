@extends('layouts.app')

@section('header')
    <link href="{{ asset('css/students_show.css') }}" rel="stylesheet">
@endsection


@section('content')

    <div id="students_show" class="container">
        <div id="students_show_pic" class="col-sm-3">
            {{--Profile picture--}}
            @if ($student->profile_pic_link)
                <img src="/{{ $student->profile_pic_link }}" style="width:100%" alt="Avatar" onclick="upload()">
            @else
                <img src="https://www.w3schools.com/w3css/img_avatar3.png" style="width:100%" alt="Avatar" onclick="upload()">
            @endif

            {{--Name--}}
            <h3>{{ $student->first_name }} {{ $student->last_name }}</h3>
            <h4>{{ $student->major }}</h4>
        </div>
        <div id="students_show_info" class="col-sm-8">
            <h2>Profile</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget lacinia orci. Vivamus luctus ante
                quis tortor porta, sit amet facilisis eros pretium. Donec vehicula venenatis nulla, nec malesuada neque.
                Duis mollis ligula turpis, vel aliquet nibh dapibus sit amet. Proin ultricies lobortis sem, eu lobortis
                velit egestas et. Duis lobortis at orci nec venenatis. Vestibulum ultricies urna eu nisi vehicula, et
                dapibus dolor laoreet.
            </p>

            <hr/>

            <h2>Skills</h2>
            <h3>
                Perch skills:
                <span class="label label-info">Skill</span>
                <span class="label label-info">Skill</span>
            </h3>
            <h3>
                Other skills:
                <span class="label label-default">Skill</span>
                <span class="label label-default">Skill</span>
                <span class="label label-default">Skill</span>
            </h3>

            <hr/>

        </div>
    </div>

@endsection

