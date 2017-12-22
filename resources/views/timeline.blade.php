@extends('layouts.splash')
@section('title', 'Timeline')

@section('head')
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/timeline.css') }}">
@endsection

@section('content')
    <header>
        <div class="container text-center">
            <div id="countdown"></div>
        </div>
    </header>



    <section class="timeline">
        <div class="container">
            <div class="timeline-item">
                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInLeft">
                    <div class="timeline-img-header">
                        <h2>Jo Angela Oehrli</h2>
                    </div>
                    <div class="date">19 NOV 2017</div>
                    <p>Jo Angela Oehrli, published UM librarian, joins the team as a primary advisor<br><br></p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInRight">
                    <div class="timeline-img-header">
                        <h2>U of M Library Minigrant</h2>
                    </div>
                    <div class="date">27 OCT 2017</div>
                    <p>Perch wins the University of Michigan library Student Mini-Grant Award<br><br></p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>

            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>
                <div class="timeline-content js--fadeInLeft">
                    <div class="date">24 SEP 2017</div>
                    <h2>Slash Page Deployed</h2>
                    <p>Splash page goes online, including basic platform functionality<br></p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInLeft">
                    <div class="timeline-img-header">
                        <h2>Mascot Designed</h2>
                    </div>
                    <div class="date">29 OCT 2017</div>
                    <p>Perch mascot, Rodriguez, developed by graphic design team</p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInLeft">
                    <div class="timeline-img-header">
                        <h2>Jim Bennett</h2>
                    </div>
                    <div class="date">23 AUG 2017</div>
                    <p>Jim Bennett, Microsoft Product lead, joins the team at a primary advisor<br><br></p>
                    <!-- <a class="bnt-more time-a" href="javascript:void(0)">More</a> -->
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content js--fadeInLeft">
                    <div class="date">1 SEP 2016</div>
                    <h2>Wireframe</h2>
                    <p>Perch wireframe prototype showcased at Optimize prototype night</p>
                    <a class="bnt-more time-a" href="https://xd.adobe.com/view/7b2ab11b-723d-4340-af58-ae50727bb6ad/">WIREFRAME</a>
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInLeft">
                    <div class="timeline-img-header">
                        <h2>Optimize Challenge</h2>
                    </div>
                    <div class="date">24 FEB 2017</div>
                    <p>Perch receives Optimize Social Innovation Challenge grant, with our own Akira and Hyejin becoming Optimize fellows</p>
                    <a class="bnt-more time-a" href="https://www.optimizemi.org/">OPTIMIZE</a>
                    <br><br>
                </div>
            </div>

            <div class="timeline-item">

                <div class="timeline-img"></div>

                <div class="timeline-content timeline-card js--fadeInRight">
                    <div class="timeline-img-header">
                        <h2>John Wolfe</h2>
                    </div>
                    <div class="date">19 AUG 2016</div>
                    <p>Professor John Wolfe, Arthur F. Thurnau Professor of Chemistry, joins the team as a primary advisor</p>
                    <a class="bnt-more time-a" href="http://www.umich.edu/~wolfelab/wolfe.html">JOHN WOLFE</a><br><br>
                </div>
            </div>



        </div>
    </section>
@endsection

@section('scripts')
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src='https://cdn.jsdelivr.net/scrollreveal.js/3.3.1/scrollreveal.min.js'></script>
    <script src="{{ asset('js/materialize.js') }}"></script>
    <script src="{{ asset('js/timeline.js') }}"></script>
@endsection