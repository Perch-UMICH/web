@extends('layouts.splash')
@section('title', 'About')

@section('content')
    <br>
    <br>
    <div class="header container center-align white-text">
        <div style="letter-spacing: 2px"> - Our Mission - </div>
        <p class="white-text flow-text">Perch wants to make entering research easier and more accessible for everyone by connecting labs and students via an university-integrated online platform and offering a peer-taught lab fundamentals teaching curriculum.</p>
        <!-- <a href="#platform" class="waves-effect btn-flat btn-large white-btn js-trigger" data-mt-duration="300">The Perch Platform</a><br>
        <a href="#curriculum" class="waves-effect btn-flat btn-large white-btn js-trigger">The Perch Curriculum</a><br> -->
        <br>
    </div>

    <div id="platform" class="tab4s">
        <br>
        <div class="header container center-align white-text">
            <div style="letter-spacing: 2px">The Perch Platform</div>
            <p class="white-text flow-text">We are building an inuitive online platform to connect undergraduates to lab faculty. Undergraduates can create profiles, upload qualifications, and view and apply to labs. Lab faculty can post their lab pages and what qualifications they’d like applicants to have. </p>
            <br>
        </div>
    </div>

    <div id="curriculum">
        <br>
        <div class="header container center-align white-text">
            <div style="letter-spacing: 2px">The Perch Curriculum</div>
            <p class="white-text flow-text">We will simplify the process of training undergraduate researchers. Since most undergraduate students accepted into labs don’t have prior research experience, graduate students spend a lot of time training students in basic lab techniques. Instead we’d like to train students en masse, which would be much more efficient and encourage labs to take on more undergraduates.</p>
        </div>
    </div>
@endsection