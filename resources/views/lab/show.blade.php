@extends('layouts.app')
@section('title', 'Lab')

@section('header')
    <link href="{{ asset('css/labs_show') }}" rel="stylesheet">
@endsection


@section('content')

    <div id="labs_show" class="container">
        <div class="col-sm-8">
            <h1>{{ $lab->name }}</h1>
            <h3>{{ $lab->department }}</h3>
            <hr/>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget lacinia orci. Vivamus luctus ante
                quis tortor porta, sit amet facilisis eros pretium. Donec vehicula venenatis nulla, nec malesuada neque.
                Duis mollis ligula turpis, vel aliquet nibh dapibus sit amet. Proin ultricies lobortis sem, eu lobortis
                velit egestas et. Duis lobortis at orci nec venenatis. Vestibulum ultricies urna eu nisi vehicula, et
                dapibus dolor laoreet.
            </p>
        </div>
        <div class="col-sm-3">
            <h2>Faculty</h2>
            @foreach ($faculty as $faculty_member)
                <p>{{ $faculty_member->title }}</p>
            @endforeach
            <hr/>

            <h2>Students</h2>
            @foreach ($students as $student)
                <p>{{ $student->first_name }} {{ $student->last_name }}</p>
            @endforeach
            <hr/>
        </div>
    </div>

@endsection

